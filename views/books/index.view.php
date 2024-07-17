<?php require(base_path('views/partials/header.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>

<!-- Main Content -->
<main class="flex-grow">
    <!-- Book List Section -->
    <section class="py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-12">Your Books</h2>
            <div class="grid grid-cols-1 md:grid-cols-6 gap-5">
                <!-- Add New Book Item -->
                <div class="bg-white w-80 p-6 m-5 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 flex flex-col items-center justify-center">
                    <div class="flex flex-col items-center justify-center">
                        <a href="/books/create" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">+ Add New Book</a>
                    </div>
                </div>

                <?php foreach ($books as $book) : ?>
                    <!-- Book Item -->
                    <div class="bg-white w-80 p-6 m-5 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="flex flex-col items-center">
                            <img src="<?= valid_path($book['cover_image']) ? $book['cover_image'] : "https://via.placeholder.com/50x75" ?>" alt="Book Cover" class="w-60 h-48 object-cover rounded">
                            <h3 class="text-2xl font-semibold mt-4 mb-2 text-gray-800"><?= $book['title'] ?></h3>
                            <p class="text-gray-600 mb-1"><?= $book['author'] ?></p>
                            <p class="text-gray-500 text-sm mb-5"><?= $book['publishing_date'] ?></p>
                            <div style="display: flex; gap: 10px; align-items: center; justify-content: center;">
                                <a href=<?= "/book?id={$book['id']}" ?> class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show more</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>


<?php require(base_path('views/partials/footer.php')); ?>