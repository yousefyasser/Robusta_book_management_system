<?php require(base_path('views/partials/header.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>

<!-- Main Content -->
<main class="flex-grow">
    <!-- Book List Section -->
    <section class="py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-12">All Books</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Book Item -->
                <div class="bg-white p-6 rounded-lg shadow">
                    <img src="https://via.placeholder.com/150" alt="Book Cover" class="w-full h-48 object-cover rounded">
                    <h3 class="text-2xl font-semibold mt-4">Book Title 1</h3>
                    <p class="text-gray-600">by Author Name</p>
                </div>
            </div>
        </div>
    </section>
</main>


<?php require(base_path('views/partials/footer.php')); ?>