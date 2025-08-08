<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\IsLoggedIn;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsBPH;
use App\Http\Middleware\IsAnggota;
use App\Http\Middleware\IsRSDM;
use App\Http\Middleware\IsAnggotaBPH;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'isLoggedIn' => IsLoggedIn::class,
            'isAdmin' => IsAdmin::class,
            'isBPH' => IsBPH::class,
            'isAnggota' => IsAnggota::class,
            'isRSDM' => IsRSDM::class,
            'isAnggotaBPH' => IsAnggotaBPH::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
