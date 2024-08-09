<?php

namespace controllers;

use models\Database;
use core\Router;
use core\Validator;

class BookController
{
    public $bookRepo;

    public function __construct()
    {
        $this->bookRepo = Database::get_book_repository();
    }

    public function index()
    {
        $books = $this->bookRepo->get_books();

        view('books/index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        view('books/form', [
            'formType' => 'create'
        ]);
    }

    public function show()
    {
        $book = $this->bookRepo->find($_GET['id'] ?? INF);

        $showHistory = isset($_GET['showHistory']) && $_GET['showHistory'] === 'True';

        if ($showHistory) {
            $historyData = Database::get_book_history_repository()->get_book_history($_GET['id']);

            view('books/show_history', [
                'showHistory' => $showHistory,
                'historyData' => $historyData,
                'book' => $book
            ]);
        }

        view('books/show', [
            'book' => $book
        ]);
    }

    public function store()
    {
        $errors = Validator::get_validation_errors();
        if (!empty($errors)) {
            return view('books/form', [
                'errors' => $errors,
                'formType' => 'create'
            ]);
        }

        if (!is_dir(base_path('public/uploads'))) {
            mkdir(base_path('public/uploads'));
        }

        $dstPath = move_file();

        $newBookData = [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'publishing_date' => $_POST['publishing_date'],
            'cover_image' => $dstPath,
            'summary' => $_POST['summary']
        ];

        $this->bookRepo->create($newBookData);

        Router::redirect('/books');
    }

    public function edit()
    {
        $book = $this->bookRepo->find($_GET['id'] ?? $_POST['id']);

        view('books/form', [
            'formType' => 'edit',
            'book' => $book
        ]);
    }

    public function update()
    {
        $errors = Validator::get_validation_errors();

        if (!empty($errors)) {
            return view('books/form', [
                'formType' => 'edit',
                'errors' => $errors
            ]);
        }

        if (!is_dir(base_path("public/uploads"))) {
            mkdir(base_path("public/uploads"));
        }

        $dstPath = move_file();

        // Remove old cover image
        $oldCoverImagePath = $this->bookRepo->find($_POST['id'], true);

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

        $this->bookRepo->update($updatedBook['id'], $updatedBook);

        Router::redirect('/books');
    }

    public function destroy()
    {
        $coverImagePath = $this->bookRepo->find($_POST['id'], true);

        if (valid_path($coverImagePath['cover_image'])) {
            unlink(base_path("public/{$coverImagePath['cover_image']}"));
        }

        $this->bookRepo->delete($_POST['id']);

        Router::redirect('/books');
    }
}
