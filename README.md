# 🎮 Tebak Angka Game

> A modern, interactive number guessing game built with Laravel and modern web technologies. Features real-time gameplay, leaderboard system, and session management.

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Laravel: 10.10+](https://img.shields.io/badge/Laravel-10.10+-red.svg)](https://laravel.com)
[![PHP: 8.1+](https://img.shields.io/badge/PHP-8.1+-777BB4.svg)](https://www.php.net)

---

## 📋 Table of Contents

-   [🎯 Features](#-features)
-   [🛠️ Tech Stack](#️-tech-stack)
-   [📋 Requirements](#-requirements)
-   [⚙️ Installation](#️-installation)
-   [🚀 Quick Start](#-quick-start)
-   [📁 Project Structure](#-project-structure)
-   [🎲 Game Rules](#-game-rules)
-   [🔌 API Endpoints](#-api-endpoints)
-   [🧪 Testing](#-testing)
-   [📝 License](#-license)

---

## 🎯 Features

-   ✨ **Interactive Gameplay** - Guess numbers between 1-100 with instant feedback
-   🏆 **Leaderboard System** - Track top 5 best players with attempt counts
-   💾 **Session Management** - Persistent game state across requests
-   🎨 **Responsive Design** - Beautiful UI with Tailwind CSS
-   ⚡ **Modern API** - RESTful endpoints for game operations
-   🔐 **Secure** - Session-based state management with CSRF protection
-   📱 **Mobile-Friendly** - Optimized for all screen sizes
-   🧪 **Unit Tests** - PHPUnit test suite included

---

## 🛠️ Tech Stack

| Technology                                                                                                      | Version | Purpose              |
| --------------------------------------------------------------------------------------------------------------- | ------- | -------------------- |
| ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat&logo=php&logoColor=white)                             | 8.1+    | Backend runtime      |
| ![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat&logo=laravel&logoColor=white)                 | 10.10+  | Web framework & API  |
| ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat&logo=mysql&logoColor=white)                       | 5.7+    | Database management  |
| ![Vite](https://img.shields.io/badge/Vite-646CFF?style=flat&logo=vite&logoColor=white)                          | 5.0+    | Build tool & bundler |
| ![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-06B6D4?style=flat&logo=tailwindcss&logoColor=white) | 3.x     | CSS framework        |
| ![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=black)        | ES6+    | Frontend logic       |
| ![Axios](https://img.shields.io/badge/Axios-5A29E4?style=flat&logo=axios&logoColor=white)                       | 1.6+    | HTTP client          |
| ![PHPUnit](https://img.shields.io/badge/PHPUnit-366488?style=flat&logo=phpunit&logoColor=white)                 | 10.1+   | Testing framework    |

### Backend Stack

-   **Laravel Sanctum** - API token authentication
-   **Eloquent ORM** - Database abstraction
-   **Blade Templating** - Server-side templating
-   **Session Management** - State persistence

### Frontend Stack

-   **Vanilla JavaScript** - No framework overhead
-   **Fetch API** - Modern AJAX requests
-   **Tailwind CSS** - Utility-first styling
-   **CDN-based Styling** - Fast loading

---

## 📋 Requirements

-   **PHP** ≥ 8.1
-   **MySQL** ≥ 5.7
-   **Composer** (for dependency management)
-   **Node.js** ≥ 16 (optional, for Vite build tools)
-   **Git** (for version control)

### System Requirements

```bash
- RAM: 512MB minimum
- Storage: 500MB free space
- OS: Linux, macOS, or Windows
```

---

## ⚙️ Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd Tebakangka
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies (Optional)

```bash
npm install
```

### 4. Configure Environment

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Database Setup

```bash
# Update .env with your database credentials
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tebakangka
DB_USERNAME=root
DB_PASSWORD=

# Run migrations
php artisan migrate
```

### 6. Clear Cache (Important!)

```bash
php artisan config:clear
php artisan cache:clear
```

---

## 🚀 Quick Start

### Using Laragon (Windows)

1. Place project in `C:\laragon\www\Tebakangka`
2. Start Laragon and enable the project
3. Visit `http://localhost/Tebakangka` in your browser

### Using PHP Built-in Server

```bash
php artisan serve
# Navigate to http://localhost:8000
```

### Using Vite Development Server (Optional)

```bash
npm run dev
# In another terminal:
php artisan serve
```

---

## 📁 Project Structure

```
Tebakangka/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── GameController.php      # Game logic (start, guess)
│   │   │   ├── LeaderboardController.php # Leaderboard retrieval
│   │   │   └── Controller.php
│   │   ├── Kernel.php                  # Middleware configuration
│   │   └── Middleware/
│   ├── Models/
│   │   └── Leaderboard.php             # Leaderboard model
│   └── Providers/
├── config/
│   ├── app.php                         # Application config
│   ├── database.php                    # Database config
│   ├── session.php                     # Session config
│   └── ...
├── database/
│   ├── migrations/
│   │   └── *_create_leaderboard_table.php  # Leaderboard table
│   ├── factories/
│   └── seeders/
├── public/
│   ├── assets/
│   │   ├── js/
│   │   │   └── game.js                 # Frontend game logic
│   │   ├── css/
│   │   └── img/
│   └── index.php                       # Entry point
├── resources/
│   ├── views/
│   │   ├── game.blade.php              # Main game interface
│   │   └── welcome.blade.php           # Welcome page
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php                         # Web routes
│   └── api.php                         # API routes
├── tests/
│   ├── Feature/                        # Feature tests
│   └── Unit/                           # Unit tests
├── .env                                # Environment variables
├── composer.json                       # PHP dependencies
├── package.json                        # Node dependencies
├── vite.config.js                      # Vite configuration
└── phpunit.xml                         # PHPUnit configuration
```

---

## 🎲 Game Rules

1. **Objective**: Guess a random number between 1 and 100
2. **Hints**: Get feedback if your guess is too high or too low
3. **Attempts**: Track number of tries taken to win
4. **Player Name**: Optional name for leaderboard (defaults to "Guest")
5. **Leaderboard**: Top 5 players with lowest attempt counts
6. **Reset**: Force reset the game with the reset button

### Difficulty Levels

-   **Level**: Menengah (Medium)
-   **Range**: 1 - 100
-   **Hints**: Binary search friendly

---

## 🔌 API Endpoints

### Base URL

```
http://localhost:8000/api
```

### Endpoints

#### Start Game

```http
POST /api/start

Response:
{
  "status": "ok",
  "message": "Game dimulai. Tebak angka antara 1 - 100."
}
```

#### Submit Guess

```http
POST /api/guess
Content-Type: application/json

Request:
{
  "guess": 50,
  "player_name": "John"
}

Response (Correct):
{
  "status": "correct",
  "message": "Selamat! Tebakan benar dalam 7 percobaan.",
  "attempts": 7
}

Response (Too High):
{
  "status": "high",
  "message": "Terlalu tinggi, coba lagi.",
  "attempts": 3
}

Response (Too Low):
{
  "status": "low",
  "message": "Terlalu rendah, coba lagi.",
  "attempts": 3
}
```

#### Get Leaderboard

```http
GET /api/leaderboard?limit=5

Response:
[
  {
    "id": 1,
    "attempts": 4,
    "player_name": "Alice",
    "created_at": "2025-11-14T10:30:00.000000Z"
  },
  {
    "id": 2,
    "attempts": 6,
    "player_name": "Bob",
    "created_at": "2025-11-14T10:25:00.000000Z"
  }
]
```

---

## 🧪 Testing

### Run All Tests

```bash
php artisan test
```

### Run Specific Test Suite

```bash
# Unit tests
php artisan test tests/Unit

# Feature tests
php artisan test tests/Feature
```

### Run with Coverage

```bash
php artisan test --coverage
```

### PHPUnit Configuration

Tests are configured in `phpunit.xml` with:

-   Unit and Feature test suites
-   SQLite in-memory database for tests
-   Code coverage tracking

---

## 🛠️ Development

### Cache Clearing

```bash
# Clear all caches
php artisan cache:clear

# Clear config cache
php artisan config:clear

# Clear compiled views
php artisan view:clear
```

### Database

#### Fresh Migration (Dangerous - Data Loss!)

```bash
php artisan migrate:fresh
```

#### Rollback Migrations

```bash
php artisan migrate:rollback
```

#### Check Migration Status

```bash
php artisan migrate:status
```

### Debugging

#### Tinker (REPL)

```bash
php artisan tinker
```

#### View Application Logs

```bash
tail -f storage/logs/laravel.log
```

---

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## 👤 Author

**Naufal Azhar**

---

## 🙏 Acknowledgments

-   Laravel Framework & Community
-   Tailwind CSS Team
-   Open Source Community

---

## 📞 Support

For issues and questions:

1. Check existing issues on GitHub
2. Create a detailed bug report
3. Provide environment information (PHP version, OS, etc.)

---

**Last Updated**: November 2025
**Status**: ✅ Production Ready
