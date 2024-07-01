<?php
require '../../src/bootstrap.php';
require '../../src/classes/Validate.php';

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


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$errors = [
    'issue' => ''
];

$article = $cms->getArticle()->fetch($id);





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] === 'Yes') {
        if ($id) {

            try {
                $article = $cms->getArticle()->fetch($id);
                $imageId = $article['image_id'] ?? null;
                $cms->getArticle()->setImageIdNull($id);
                $cms->getArticle()->deleteImg($imageId);
                $cms->getArticle()->deleteArt($id);

                
                $imagePath = '/uploads/';

                // Bilddatei vom Server löschen
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                redirect('articles.php',['success' => 'Article succesfully delete']);

            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1451) {
                    $errors['issue'] = 'Article cannot be deleted because it has articles assigned.';
                } else {
                    $errors['issue'] = 'An error occurred while deleting the Article: ' . $e->getMessage();
                }
            }
        } else {
            $errors['issue'] = 'invalid Article ID.';
        }
    } else {
        redirect('articles.php', ['success' => 'Article doesn`t delete']);
    }
}


?>

<?php include '../includes/header-admin.php'; ?>


<main class="container w-auto mx-auto md:w-1/2 flex justify-center flex-col items-center p-5">
    <h2 class="text-3xl text-blue-500 mb-8">Delete article</h2>
    <?php if ($errors['issue']): ?>
        <p class="error text-red-500 bg-red-200 p-5 rounded-md"><?= $errors['issue'] ?></p>
    <?php else: ?>
        <p>Are you sure you want to delete this article?</p>
        <form method="POST">
            <button name="confirm_delete" value="Yes" class="text-white bg-pink-500 p-3 rounded-md hover:bg-sky-600"
                type="submit">Yes</button>
            <button name="confirm_delete" value="No" class="text-white bg-red-500 p-3 rounded-md hover:bg-sky-600"
                type="submit">No</button>
        </form>
    <?php endif; ?>
</main>

<?php include '../includes/footer-admin.php'; ?>