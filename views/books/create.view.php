<?php require(base_path('views/partials/header.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>

<main class="flex-grow">
    <section class="py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-12">Add New Book</h2>
            <form action="/books" method="POST" enctype="multipart/form-data" class="bg-white w-full max-w-lg mx-auto p-8 rounded-lg shadow-lg">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Author:</label>
                    <input type="text" name="author" id="author" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="publishing_date" class="block text-gray-700 text-sm font-bold mb-2">Publishing Date:</label>
                    <input type="date" name="publishing_date" id="publishing_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="cover_image" class="block text-gray-700 text-sm font-bold mb-2">Cover Image:</label>
                    <input type="file" name="cover_image" id="cover_image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="summary" class="block text-gray-700 text-sm font-bold mb-2">Summary:</label>
                    <textarea name="summary" id="summary" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="flex items-center justify-center mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Book</button>
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

<?php require(base_path('views/partials/footer.php')); ?>