# Laravel Visitor

## Installation

Require this package with composer.

```bash
composer require sadekd/laravel-visitor
```

### Copy the package config to your local config with the publish command:

```bash
php artisan vendor:publish --provider="SadekD\LaravelVisitor\LaravelVisitorServiceProvider"
```

## Usage

In `App\Http\Kernel.php` add this middleware

```php
\SadekD\LaravelVisitor\Http\Middleware\VisitorMiddleware::class,
```

For all routes in web group:

```php
protected $middlewareGroups = [
    'web' => [
        ['some laravel middlewares'],
        \SadekD\LaravelVisitor\Http\Middleware\VisitorMiddleware::class,
        ['other app middlewares'],
    ],
];
```

May be assigned to route groups or used individually:

```php
protected $routeMiddleware = [
    ['some laravel middlewares'],
    'visitor' => \SadekD\LaravelVisitor\Http\Middleware\VisitorMiddleware::class,
    ['other app middlewares'],
];
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
