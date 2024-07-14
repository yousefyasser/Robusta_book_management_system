<?php require('partials/header.php'); ?>
<?php require('partials/nav.php'); ?>

<!-- Hero Section -->
<section class="bg-blue-600 text-white py-20">
    <div class="container mx-auto text-center">
        <h1 class="text-5xl font-bold mb-6">Manage Your Book Collection with Ease</h1>
        <p class="text-lg mb-8">Our book management system helps you to track and organize your personal or professional book collection efficiently.</p>
        <a href="#" class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold">Get Started</a>
    </div>
</section>

<!-- Features Section -->
<section class="py-20">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-12">Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="bg-white p-8 rounded-lg shadow">
                <h3 class="text-2xl font-semibold mb-4">Library Overview</h3>
                <p class="text-gray-600">See all your available books in your library.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow">
                <h3 class="text-2xl font-semibold mb-4">Easy Organization</h3>
                <p class="text-gray-600">Add a new book to your collection.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow">
                <h3 class="text-2xl font-semibold mb-4">Cleanup</h3>
                <p class="text-gray-600">Delete books from your library.</p>
            </div>
            <div class="bg-white p-8 rounded-lg shadow">
                <h3 class="text-2xl font-semibold mb-4">Updates</h3>
                <p class="text-gray-600">Edit any book's info.</p>
            </div>
        </div>
    </div>
</section>

<!-- Book List Section -->
<section class="bg-gray-50 py-20">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-12">Popular Books</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <img src="https://via.placeholder.com/150" alt="Book Cover" class="w-full h-48 object-cover rounded">
                <h3 class="text-2xl font-semibold mt-4">Book Title 1</h3>
                <p class="text-gray-600">by Author Name</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <img src="https://via.placeholder.com/150" alt="Book Cover" class="w-full h-48 object-cover rounded">
                <h3 class="text-2xl font-semibold mt-4">Book Title 2</h3>
                <p class="text-gray-600">by Author Name</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <img src="https://via.placeholder.com/150" alt="Book Cover" class="w-full h-48 object-cover rounded">
                <h3 class="text-2xl font-semibold mt-4">Book Title 3</h3>
                <p class="text-gray-600">by Author Name</p>
            </div>
        </div>
    </div>
</section>

<?php require('partials/footer.php'); ?>