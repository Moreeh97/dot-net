<?php
protected $routeMiddleware = [
    // ... middleware الآخرين
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
];