<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Domains\Social\Models\Board;

Route::get('home', function () {
    return Inertia::render('Frontend/Home', [
        'boards' => Board::publish()->get()->toArray(),
    ]);
})->name('home');

Route::get('explore', function () {
    return Inertia::render('Frontend/Explore', [
        'boards' => Board::publish()->get()->toArray(),
    ]);
})->name('explore');

Route::get('your-post', function () {
    return Inertia::render('Frontend/YourPost', [
        'boards' => Board::boards()->paginate(10)->toArray(),
    ]);
})->name('your-post');