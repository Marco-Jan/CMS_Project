<?php

class Article
{
  protected Database $db;

  public function __construct(Database $db)
  {
    $this->db = $db;
  }

  public function fetch(int $id, bool $published = true): array
  {
    $sql = "SELECT a.id, a.title, a.summary, a.content, a.created, a.category_id, a.user_id, a.published, c.name AS category,
        CONCAT(u.forename, ' ', u.surname) as author,
        i.id as image_id, i.filename as image_file, i.alttext as alttext
        FROM articles as a
        JOIN category as c ON a.category_id = c.id
        JOIN user as u ON a.user_id = u.id
        LEFT JOIN images as i ON a.images_id = i.id
        WHERE a.id = :id;";

    if ($published) {
      $sql .= "AND a.published = 1";
    }
    $sql .= ";";

    return $this->db->sql_execute($sql, ['id' => $id])->fetch();
  }

  public function getAll(int $cat_id = null, bool $published = true, int $user_id = null, int $limit = 1000): array
  {
    $sql = "SELECT a.id, a.title, a.created, a.category_id, a.user_id, a.published, c.name AS category,
        CONCAT(u.forename, ' ', u.surname) AS author,
        i.filename as image_file, i.alttext as alttext
        FROM articles as a
        JOIN category as c ON a.category_id = c.id
        JOIN user as u ON a.user_id = u.id
        LEFT JOIN images as i ON a.images_id = i.id
        WHERE (a.category_id = :cat_id OR :cat_id IS NULL)
        AND (a.user_id = :user_id OR :user_id IS NULL)";

    if ($published) {
      $sql .= "AND a.published = 1";
    }
    $sql .= " ORDER BY a.id DESC LIMIT $limit;";

    return $this->db->sql_execute($sql, ['cat_id' => $cat_id, 'user_id' => $user_id, 'limit' => $limit])->fetchAll();
  }

  public function getArticleCount(string $searchTerm): int
  {
    $sql = "SELECT COUNT(*) FROM articles
            WHERE published = 1 AND (title LIKE :search OR summary = :search OR content LIKE :search)";

    return $this->db->sql_execute($sql, ["search" => "%$searchTerm%"])->fetchColumn();
  }

  public function getSearchedArticles(string $searchTerm, int $per_page, int $offset): array
  {
    $sql = "SELECT a.id, a.title, a.summary, a.category_id, a.user_id, a.seo_title, c.name AS category,
            CONCAT(u.forename, ' ', u.surname) AS author,
            i.filename AS image_file,
            i.alttext AS alttext
            FROM articles AS a 
            JOIN category AS c ON a.category_id = c.id 
            JOIN user AS u ON a.user_id = u.id
            LEFT JOIN images AS i ON a.images_id = i.id
            WHERE a.published = 1 AND (a.title LIKE :search OR a.summary LIKE :search OR a.content LIKE :search)
            ORDER BY a.id DESC 
            LIMIT :per_page
            OFFSET :offset";

    return $this->db->sql_execute($sql, ["search" => "%$searchTerm%", "per_page" => $per_page, "offset" => $offset])->fetchAll();
  }

  public function setImageIdNull(int $id): bool
  {
    try {
      $sql = "UPDATE articles SET images_id = NULL WHERE id = :id";
      $this->db->sql_execute($sql, ["id" => $id]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }


  public function getLastInsertId(): ?int
  {
    return $this->db->lastInsertId();
  }




  public function push(array $data): bool
  {
    try {
      $sql = "INSERT INTO articles (title, summary, content, category_id, user_id, images_id, published)
                VALUES (:title, :summary, :content, :category_id, :user_id, :images_id, :published)";
      $this->db->sql_execute($sql, $data);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }



  public function deleteArt(int $id): bool
  {

    try {
      $sql = "DELETE FROM articles WHERE id = :id";
      $this->db->sql_execute($sql, ["id" => $id]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

  public function deleteImg(int $id): bool
  { 
    try {
      $sql = "DELETE FROM images WHERE id = :id";
      $this->db->sql_execute($sql, ["id" => $id]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  
  }

  public function update(array $data): bool
  {

    try {
      $sql = "UPDATE articles SET title = :title, summary = :summary, content = :content, published = :published, category_id = :category_id,
      user_id = :user_id WHERE id = :id;";

      $this->db->sql_execute($sql, $data);

      return true;
    } catch (PDOException $e) {

      return false;
    }
  }
  public function count(string $search = ""): int
  {
    $sql = "SELECT COUNT(id) FROM articles WHERE published = 1";

    if ($search) {
      $sql = "SELECT COUNT(id) FROM articles WHERE published = 1 AND (title LIKE :search OR summary LIKE :search OR content LIKE :search);";
      return $this->db->sql_execute($sql, ["search" => "%$search%"])->fetchColumn();
    }
    return $this->db->sql_execute($sql)->fetchColumn();
  }

  public function insertImage($data)
  {
    $sql = "INSERT INTO images(filename, alttext) VALUES (:filename, :alttext)";

    return $this->db->sql_execute($sql, $data);
  }
}
