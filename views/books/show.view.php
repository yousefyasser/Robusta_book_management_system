<?php require(base_path('views/partials/header.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>

<!-- Main Content -->
<main class="flex-grow">
    <!-- Book Detail Section -->
    <section class="py-12 bg-gray-100">
        <div class="container mx-auto">
            <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg m-4 md:m-8">
                <div class="flex flex-col md:flex-row md:space-x-10">
                    <img src="<?= valid_path($book['cover_image']) ? $book['cover_image'] : 'https://via.placeholder.com/300x150' ?>" alt="Book Cover" class="w-full md:w-1/3 h-auto object-cover rounded-md mb-6 md:mb-0">
                    <div class="flex-1">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                            <div class="flex-1">
                                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2"><?= $book['title'] ?></h1>
                                <p class="text-gray-600 mb-1"><span class="font-semibold">Author:</span> <?= $book['author'] ?></p>
                                <p class="text-gray-600 mb-4"><span class="font-semibold">Publishing Date:</span> <?= $book['publishing_date'] ?></p>
                            </div>
                            <div class="flex space-x-2 mb-4 md:mb-0">
                                <a href="/book/edit?id=<?= $book['id'] ?>" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition-colors">Edit</a>
                                <form action="/book" method="POST">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <input type="hidden" name="id" value="<?= $book['id'] ?>" />
                                    <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            </div>
                        </div>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-3">Summary</h2>
                        <p class="text-gray-700 leading-relaxed"><?= empty($book['summary']) ? "No Summary Provided" : $book['summary'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require(base_path('views/partials/footer.php')); ?>