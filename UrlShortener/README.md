<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Features

- Shorten long URLs into unique short codes.
- Decode short URLs back to their original long URLs.
- Uses Laravel framework with API endpoints.
- Stores short URLs temporarily in cache.
- Includes test cases for core functionalities.

## Installation Guide
## Step 1: Clone the Repository
git clone https://github.com/JyotiJas/UrlShortener.git
cd UrlShortener

## Step 2: Install Dependencies
composer install

## Step 3: Set Up Environment Variables
Copy the .env.example file and rename it to .env:

cp .env.example .env

## Step 4: Start the Laravel Server
php artisan serve

## API Endpoints
## Encode a URL (Shorten a Long URL)

Endpoint:
POST /api/encode

Example Request (JSON Body):

{
  "url": "https://www.example.com/some/long/path?query=value"
}

Example Response:

{
  "original_url": "https://www.example.com/some/long/path?query=value",
  "short_url": "http://127.0.0.1:8000/abcd12"
}

## Decode a Short URL (Retrieve Original URL)

Endpoint: 
GET /api/decode/{short_code}

Example Request:
GET /api/decode/abcd12

Example Response:

{
  "original_url": "https://www.example.com/some/long/path?query=value"
}

## Running Tests
php artisan test


## Technologies Used

- Laravel (PHP Framework)
- Cache (Laravel Cache Driver)
- Composer (Dependency Manager)
- GitHub (Version Control)
