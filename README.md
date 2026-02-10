# Simple Blog System

A simple blog application built with **Laravel 11**, **Blade**, and **Tailwind CSS**.

## Features

- **User Authentication** — Register, log in, and manage your profile (powered by Laravel Breeze)
- **Blog Posts (CRUD)** — Create, read, update, and delete your own posts
- **Comments** — Logged-in users can comment on posts and delete their own comments
- **Categories** — Assign multiple categories to posts (many-to-many relationship)
- **Search** — Keyword search across post titles and body content
- **Authorization** — Policy-based access control ensuring users can only edit/delete their own content

## Requirements

- PHP >= 8.2
- Composer
- Node.js & npm
- SQLite (included with PHP)

## Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd simple-blog-system
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install Node.js dependencies

```bash
npm install
```

### 4. Environment setup

```bash
copy .env.example .env
php artisan key:generate
```

### 5. Configure database

Open `.env` and ensure the database connection is set to SQLite:

```dotenv
DB_CONNECTION=sqlite
```

Then create the database file:

```bash
type nul > database/database.sqlite
```

### 6. Run migrations

```bash
php artisan migrate
```

### 7. Seed the database (optional)

This populates the database with sample users, posts, categories, and comments:

```bash
php artisan db:seed
```

A test account will be created:
- **Email:** `admin@admin.com`
- **Password:** `password`

### 8. Build front-end assets

```bash
npm run build
```

## Running the Application

### Development

Start the PHP built-in server:

```bash
# Terminal 1 — PHP server
php -S 127.0.0.1:8000 -t public
```

The application will be available at **http://127.0.0.1:8000**.
