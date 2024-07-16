<?php require(base_path('views/partials/header.php')); ?>
<?php require(base_path('views/partials/nav.php')); ?>

<!-- Main Content -->
<main class="flex-grow">
    <!-- 404 Section -->
    <section class="py-20">
        <div class="container mx-auto text-center">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h1 class="text-6xl font-bold text-gray-800 mb-4">404</h1>
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Page Not Found</h2>
                <p class="text-gray-600 mb-6">Sorry, the page you are looking for does not exist.</p>
                <a href="/" class="bg-blue-600 text-white px-8 py-3 rounded-full font-semibold">Go to Homepage</a>
            </div>
        </div>
    </section>
</main>

<?php require(base_path('views/partials/footer.php')); ?>