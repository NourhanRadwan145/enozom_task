# Laravel Library System

This project is a Laravel-based library system that manages books, copies, students, and borrow records. It uses repository and service design patterns for clean and maintainable code.

## Requirements

- PHP >= 7.3
- Composer
- Laravel >= 8.x
- MySQL or any other supported database

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/NourhanRadwan145/enozom_task.git
    cd enozom_task
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Create a copy of the `.env` file:
    ```bash
    cp .env.example .env
    ```

4. Generate an application key:
    ```bash
    php artisan key:generate
    ```

5. Configure your database in the `.env` file:
    ```dotenv
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=library-api
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Run migrations to create the database tables:
    ```bash
    php artisan migrate
    ```

## Database Schema

The database schema consists of the following tables:

### books Table

| Column     | Type       | Description            |
|------------|------------|------------------------|
| id         | BIGINT     | Primary key            |
| title      | STRING     | Title of the book      |
| created_at | TIMESTAMP  | Timestamp of creation  |
| updated_at | TIMESTAMP  | Timestamp of last update |

### copies Table

| Column     | Type       | Description                     |
|------------|------------|---------------------------------|
| id         | BIGINT     | Primary key                     |
| book_id    | BIGINT     | Foreign key to books table      |
| status_id  | BIGINT     | Foreign key to statuses table   |
| created_at | TIMESTAMP  | Timestamp of creation           |
| updated_at | TIMESTAMP  | Timestamp of last update        |

### students Table

| Column         | Type       | Description                   |
|----------------|------------|-------------------------------|
| id             | BIGINT     | Primary key                   |
| student_number | STRING     | Unique student number         |
| name           | STRING     | Name of the student           |
| email          | STRING     | Email of the student          |
| phone          | STRING     | Phone number of the student   |
| created_at     | TIMESTAMP  | Timestamp of creation         |
| updated_at     | TIMESTAMP  | Timestamp of last update      |

### borrow_records Table

| Column             | Type       | Description                       |
|--------------------|------------|-----------------------------------|
| id                 | BIGINT     | Primary key                       |
| student_id         | BIGINT     | Foreign key to students table     |
| copy_id            | BIGINT     | Foreign key to copies table       |
| borrowed_at        | TIMESTAMP  | Timestamp of borrowing            |
| expected_return_at | TIMESTAMP  | Expected return timestamp         |
| returned_at        | TIMESTAMP  | Actual return timestamp           |
| return_status_id   | BIGINT     | Foreign key to statuses table     |
| created_at         | TIMESTAMP  | Timestamp of creation             |
| updated_at         | TIMESTAMP  | Timestamp of last update          |

### statuses Table

| Column     | Type       | Description            |
|------------|------------|------------------------|
| id         | BIGINT     | Primary key            |
| name       | STRING     | Name of the status     |
| created_at | TIMESTAMP  | Timestamp of creation  |
| updated_at | TIMESTAMP  | Timestamp of last update |


## Main Endpoints

- `GET /api/generate-report` - Generate a report of books and its status
- `POST /api/borrow-book` - Borrow a book from the library
- `POST /api/return-book` - Return a book to the library

## Running the Project

1. Start the development server:
    ```bash
    php artisan serve
    ```

2. Open your browser and visit `http://127.0.0.1:8000`.


