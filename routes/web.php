<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Backend/User/Dashboard');
    })->name('backend.user.dashboard');
});

/*
 |----------------------------------
 | Frontend Routes
 |----------------------------------
 |
 */

Route::group([], function () {
    includeRouteFiles(__DIR__ . '/frontend/');
});

/*
 |----------------------------------
 | Backend Routes
 |----------------------------------
 |
 | These routes can only be accessed by users with type `admin`
 |
 */

Route::group(['as' => 'backend.'], function () {
    includeRouteFiles(__DIR__ . '/backend/');
});