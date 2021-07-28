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

use NuoviMedia\LetterboxdClient\LetterboxdClient;

$client = new LetterboxdClient();
```

Whe heavily based the methods on the [Official Letterboxd API](http://api-docs.letterboxd.com/).

By now, we only implemented the `GET` methods on the `/film` and `/films` endpoints.

The method names are the method in lowercase, followed by the endpoint in CamelCase excluding the
parameters: `GET film/languages` becomes `getFilmLanguages` and `GET /film/{id}/report` becomes `getFilmReport`.

The only naming exception is `GET film/film-services` which becomes `getFilmServices`.

Any path parameter is a method argument, and the set of the query parameters is the last method argument.

For example, you can obtain the first ten members' relationships sorted by name for a film by calling:
```php 
$client->getFimMembers($movie_id, ['perPage' => 10, 'sort' => 'Name']);
```