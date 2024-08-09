<?php

namespace controllers;

use models\Database;
use core\Router;
use core\Validator;

class BookController
{
    public function index()
    {
        $books = Database::get_book_repository()->get_books();

        require(base_path('views/books/index.view.php'));
    }

    public function create()
    {
        $uri = '/books/create';
        $heading = 'Add New';
        require(base_path('views/books/create.view.php'));
    }

    public function show()
    {
        $book = Database::get_book_repository()->find($_GET['id'] ?? INF);

        $showHistory = isset($_GET['showHistory']) && $_GET['showHistory'] === 'True';

        if ($showHistory) {
            $historyData = Database::get_book_history_repository()->get_book_history($_GET['id']);
            require(base_path('views/books/show_history.view.php'));
        }

        require(base_path('views/books/show.view.php'));
    }

    public function store()
    {
        $errors = Validator::get_validation_errors();
        if (!empty($errors)) {
            $heading = 'Add New';
            return require(base_path('views/books/create.view.php'));
        }

        if (!is_dir(base_path('public/uploads'))) {
            mkdir(base_path('public/uploads'));
        }

        $dstPath = !empty($_FILES['cover_image']['name']) ? move_file() : NULL;

        $newBookData = [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'publishing_date' => $_POST['publishing_date'],
            'cover_image' => $dstPath,
            'summary' => $_POST['summary']
        ];

        Database::get_book_repository()->create($newBookData);

        Router::redirect('/books');
    }

    public function edit()
    {
        $uri = "/book";
        $heading = 'Edit';

        $book = Database::get_book_repository()->find($_GET['id'] ?? $_POST['id']);

        require(base_path('views/books/edit.view.php'));
    }

    public function update()
    {
        $errors = Validator::get_validation_errors();

        if (!empty($errors)) {
            return require(base_path('controllers/books/edit.php'));
        }

        if (!is_dir(base_path("public/uploads"))) {
            mkdir(base_path("public/uploads"));
        }

        $dstPath = move_file();

        // Remove old cover image
        $oldCoverImagePath = Database::get_book_repository()->find($_POST['id'], true);

        if (valid_path($oldCoverImagePath['cover_image'])) {
            unlink(base_path("public/{$oldCoverImagePath['cover_image']}"));
        }

        // Update book in database
        $updatedBook = [
            "id" => $_POST['id'],
            "title" => $_POST['title'],
            "author" => $_POST['author'],
            "publishing_date" => $_POST['publishing_date'],
            "cover_image" => $dstPath,
            "summary" => $_POST['summary']
        ];

        Database::get_book_repository()->update($updatedBook['id'], $updatedBook);

        Router::redirect('/books');
    }

    public function destroy()
    {
        $coverImagePath = Database::get_book_repository()->find($_POST['id'], true);

        if (valid_path($coverImagePath['cover_image'])) {
            unlink(base_path("public/{$coverImagePath['cover_image']}"));
        }

        Database::get_book_repository()->delete($_POST['id']);

        Router::redirect('/books');
    }
}
