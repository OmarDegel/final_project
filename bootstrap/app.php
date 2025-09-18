<?php

use App\Http\Middleware\Permission;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CourseMiddleware;
use App\Http\Middleware\InstructorMiddleWare;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'check.auth' => AdminMiddleware::class,
            "check.permission" => Permission::class,
            "check.course" => CourseMiddleware::class,
            "instructor" => InstructorMiddleWare::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
