<?php

function e($string): string
{
 return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
}

function pdo_execute(PDO $pdo, string $sql, array $bindings = null): false|PDOStatement
{
  if (!$bindings) {

    
    return $pdo->query($sql);
  }


  $statement = $pdo->prepare($sql);

  foreach ($bindings as $key => $value) {

    if (is_int($value)) {
      $statement->bindValue($key, $value, PDO::PARAM_INT);
    } else {
      $statement->bindValue($key, $value);
    }
    ;
  }

  $statement->execute();

  return $statement;
}

function format_date(string $string): string
{
  $date = date_create_from_format('Y-m-d H:i:s', $string);

  return $date->format('d M. Y');
}

// $query = http_build_query(['id' => 3, 'isActive' => 1]);

function redirect(string $url, array $params = [], $status_code = 302): void
{
  $query = $params ? '?' . http_build_query($params) : '';
  header("Location: $url$query", $status_code);
  exit;
}


function get_file_path(string $filename, string $path, bool $admin = false): string
{
  $basename = pathinfo($filename, PATHINFO_FILENAME);
  $extension = pathinfo($filename, PATHINFO_EXTENSION);
  $basename = preg_replace("/[^A-z0-9]/", "-", $basename);
  $i = 0;
  while (file_exists($path . $filename)) {
    $extra = "(" . $i++ . ")";
    $filename = $basename . $extra . "." . $extension;
  }
  if ($admin) {
    return dirname(__DIR__, 1) . "/public/uploads/" . $filename;
  }
  return dirname(__DIR__, 1) . "/public/uploads/" . $filename;
}

function scale_and_copy(string $filename, string $save_to, $max_width = 300, $max_height = 300): bool
{
  $width = $max_width;
  $height = $max_height;

  // Get original sizes
  [$orig_width, $orig_height, $mime_type] = getimagesize($filename);
  if ($orig_width === null || $orig_height === null) {
    return false;
  }

  //Calculate new sizes
  $ratio = $orig_width / $orig_height;
  if ($width / $height > $ratio) {
    $width = (int) round($height * $ratio);
  } else {
    $height = (int) round($width / $ratio);
  }

  $source = match ($mime_type) {
    IMAGETYPE_JPEG => imagecreatefromjpeg($filename),
    IMAGETYPE_PNG => imagecreatefrompng($filename),
    default => false
  };
  $thumb = imagecreatetruecolor($width, $height);

  imagecopyresampled($thumb, $source, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);

  match ($mime_type) {
    IMAGETYPE_JPEG => imagejpeg($thumb, $save_to),
    IMAGETYPE_PNG => imagepng($thumb, $save_to)
  };
  imagedestroy($thumb);
  imagedestroy($source);

  return true;
}