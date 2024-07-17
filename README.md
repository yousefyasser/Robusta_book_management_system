# Book Management Website

## Setup Manual

### Prerequisites

Ensure you have the following installed on your system:

- PHP v8.3.9
- MYSQL v8.3.0

### Steps

- Clone this repository and change directory.

```
git clone git@gitlab.com:Yousef-yasser/book-management-website.git

cd book-management-website
```

- Rename .env.example to .env & enter your configuration info.

```
mv .env.example .env

nano .env
```

- Install project dependencies.

```
composer install
```

- Run the query in 'dbSchema.sql' to create the database and table.

- start mysql service in terminal

```
sudo service mysql start
```

- Run PHP web server (replace \<PORT> with any available port number e.g. 8888).

```
php -S localhost:<PORT> -t public
```

Finally the application will start and can be accessed at http://localhost:\<PORT> in your web browser.

### API Endpoints

| Endpoint      | Purpose                    |
| ------------- | -------------------------- |
| /             | landing page               |
| /books        | show all books             |
| /books/create | form to create a book      |
| /book         | show/delete a book details |
| /book/edit    | form to edit a book        |
