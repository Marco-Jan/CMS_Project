<?php

require '../../src/bootstrap.php';



$articles = $cms->getArticle()->getAll();

$navigation = [
    [
        'name' => 'Articles',
        'link' => './articles.php',

    ],
    [
        'name' => 'Categories',
        'link' => './categories.php'
    ]
];

$error = filter_input(INPUT_GET, 'error') ?? '';
$success = filter_input(INPUT_GET, 'success') ?? '';

?>

<?php include '../includes/header-admin.php'; ?>

<main class="container mx-auto flex justify-center flex-col items-center">
    <header class="p-10">
        <?php if ($error): ?>
            <p class="error text-red-500 bg-red-200 p-5 rounded-md"><?= $error ?></p>
        <?php endif ?>
        <?php if ($success): ?>
            <p class="success text-green-500 bg-green-200 p-5 rounded-md"><?= $success ?></p>
        <?php endif ?>

        <h1 class="text-4xl text-blue-500 mb-8">Articles</h1>
        <button class="text-white bg-blue-500 p-4 rounded hover:bg-pink-600"><a href="article.php">Add a new
                Article</a></button>
    </header>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 max-w-xl mb-10">
        <thead class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-blue-500">Image</th>
                <th class="px-6 py-3 text-blue-500">Title</th>
                <th class="px-6 py-3 text-blue-500">Created</th>
                <th class="px-6 py-3 text-blue-500">Published</th>
                <th class="px-6 py-3 text-blue-500">Edit</th>
                <th class="px-6 py-3 text-blue-500">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
                <tr class="bg-white border-b dark:bg-gray-800">
                    <td> <img src="/public/uploads/<?= e($article['image_file'] ?? 'blank.png') ?>"
                            alt="<?= e($article['alttext']) ?>"></td>
                    <td href="article.php?id=<?= $article['id'] ?>">

                    <h2 class="text-blue-500 text-2xl pt-3 pb-1.5"><?= e($article['title']) ?></h2>
                    </td>
                    <td><?= date('Y-m-d', strtotime(e($article['created']))) ?> </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?= e($article['title']) ?></td>
                    <td class="px-6 py-4 font-medium text-pink-600 whitespace-nowrap"><a
                            href="article.php?id=<?= $article['id'] ?>">Edit</a></td>
                    <td class="px-6 py-4 font-medium text-blue-600 whitespace-nowrap"><a
                            href="article-delete.php?id=<?= $article['id'] ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>

<?php include '../includes/footer-admin.php'; ?>