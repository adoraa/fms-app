# Facilities Management System

A web-based application for managing facility operations, handling maintenance complaints, and coordinating repair work.

## Technologies

- PHP 7.3+
- Laravel 8
- MySQL
- Blade
- Tailwind CSS
- Alpine.js
- Laravel Sanctum
- Laravel Mix

## Getting Started

### Requirements

- PHP 7.3 or later
- Composer
- MySQL
- Node.js and npm

### Installation

Clone the repository:

```bash
git clone https://github.com/adoraa/fms-app.git
cd fms-app
```

Install the PHP dependencies:

```bash
composer install
```

Create your environment file:

```bash
cp .env.example .env
```

Generate an application key:

```bash
php artisan key:generate
```

Configure your database credentials in `.env`, then run the migrations:

```bash
php artisan migrate
```

Install the frontend dependencies and compile the assets:

```bash
npm install
npm run dev
```

Start the development server:

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`.

## Project Structure

| Directory | Description |
|---|---|
| `app/Http/Controllers/` | Application controllers and request handling |
| `app/Models/` | Models for facilities, rooms, complaints, users, and other records |
| `database/migrations/` | Database table definitions |
| `resources/views/` | Blade templates and application views |
| `resources/css/` | Frontend stylesheets |
| `resources/js/` | JavaScript assets |
| `routes/` | Web and API route definitions |
| `public/` | Public assets and application entry point |
