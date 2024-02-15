<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Domains\Social\Models\Board;

Route::get('home', function () {
    return Inertia::render('Frontend/Home', [
        'boards' => Board::publish()->get()->toArray(),
    ]);
})->name('home');