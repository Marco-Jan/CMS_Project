<?php
require '../src/bootstrap.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    include APP_ROOT . '/public/page_not_found.php';
    
}

$article = $cms->getArticle()->getAll($cat_id);

if( ! $article) {
    include APP_ROOT . '/public/page_not_found.php';
}

$navigation = $cms->getCategory()->fetchNavigation();
$title = $article['title'];
$description = $article['summary'];
$section = $article['category_id'];
?>


<?php include './includes/header.php'; ?>

<main class="flex flex-wrap container mx-auto">
    <section>
        <img src="uploads/<?= $article['image_file'] ?? 'placeholder.png' ?>" alt="<?= e($article['alttext']) ?>">
    </section>

    <section>
        <h1 class="text-4xl text-blue-500 mb-4 mt-8"><?= e($article['title']) ?></h1>
        <div class="text-gray-500 mb-3"><?= e(format_date(($article['created']))) ?></div>
        <div class="text-gray-500"><?= e(($article['content'])) ?></div>
        <p class="credit text-xs mt-5 mb-5">
            Posted in <a class="text-pink-400" href="category.php?id=<?= $article['category_id'] ?>">
                <?= e($article['category']) ?> </a>
            by <a class="text-pink-400" href="user.php?id=<?= $article['user_id'] ?>">
                <?= e($article['author'])?>
            </a>
        </p>
    </section>
</main>
<?php include './includes/footer.php'; ?>