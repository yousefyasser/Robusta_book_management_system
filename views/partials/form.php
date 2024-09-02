<?php
if ($formType === 'create') {
    $heading = 'Create';
    $uri = '/books/create';
} else {
    $heading = 'Edit';
    $uri = '/book';
}
?>

<main class="flex-grow">
    <section class="py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-12"><?= $heading ?> Book</h2>
            <form action="<?= $uri ?>" method="POST" enctype="multipart/form-data" class="bg-white w-full max-w-lg mx-auto p-8 rounded-lg shadow-lg">
                <?php if ($heading === 'Edit') : ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="<?= $book['id'] ?>">
                <?php endif; ?>

                <?php foreach (['title', 'author', 'publishing_date', 'cover_image'] as $field) : ?>
                    <div class="mb-4">
                        <label for="<?= $field ?>" class="block text-gray-700 text-sm font-bold mb-2"><?= $field ?></label>
                        <input type="<?= ($field === 'publishing_date') ? 'date' : ($field === 'cover_image' ? 'file' : 'text') ?>" name="<?= $field ?>" id="<?= $field ?>" value="<?= $_POST[$field] ?? $book[$field] ?? '' ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                <?php endforeach; ?>

                <div class="mb-4">
                    <label for="summary" class="block text-gray-700 text-sm font-bold mb-2">Summary:</label>
                    <textarea name="summary" id="summary" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"><?= $_POST['summary'] ?? $book['summary'] ?? '' ?></textarea>
                </div>
                <div class="flex items-center justify-center mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"><?= $heading ?> Book</button>
                </div>

                <?php if (!empty($errors)) : ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block"><?= implode('<br>', $errors) ?></span>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </section>
</main>