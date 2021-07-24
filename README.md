# Letterboxd Client

This is an incomplete and working-in-progress Letterboxd API Client for Laravel.

It is intended as a support package for [nuovi-media/stats](https://github.com/nuovi-media/stats).

## Installation

You can install the package via composer:

    composer require nuovi-media/laravel-letterboxd

You can publish its configuration with:

    php artisan vendor:publish

## Configuration

The `letterboxd.php` file lets you configure the api key and secret, and the user credentials needed for the library to
work.

## Usage

You can initialise the client with

```php
<?php

$client = new \NuoviMedia\LetterboxdClient\LetterboxdClient();
```

The available methods will be documented in a future version.