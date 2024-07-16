<?php require(base_path('views/partials/header.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>

<!-- Main Content -->
<main class="flex-grow">
    <!-- Book Detail Section -->
    <section class="py-20">
        <div class="container mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <div class="flex flex-col md:flex-row md:space-x-8">
                    <img src="<?= $book['cover_image'] ?? "https://via.placeholder.com/300" ?>" alt="Book Cover" class="w-[300px] h-96 object-cover rounded-md mb-6 md:mb-0">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-800 mb-4"><?= $book['title'] ?></h1>
                        <p class="text-gray-600 mb-2"><span class="font-semibold">Author:</span> <?= $book['author'] ?></p>
                        <p class="text-gray-600 mb-6"><span class="font-semibold">Publishing Date:</span> <?= $book['publishing_date'] ?></p>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Summary</h2>
                        <p class="text-gray-700 leading-relaxed"><?= $book['summary'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require(base_path('views/partials/footer.php')); ?>