<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Domains\Auth\Models\User;
use App\Domains\Social\Models\Board;

use App\Domains\Social\Http\Controllers\Frontend\Board\BoardController;

Route::get('/user-management', function () {
    return Inertia::render('Backend/Admin/UserManagement', [
        'users' => User::paginate(10)->toArray(),
    ]);
})->name('user-management');

Route::get('your-board', function () {
    return Inertia::render('Backend/User/Board', [
        'boards' => Board::boards()->paginate(10)->toArray(),
    ]);
})->name('user.board');
