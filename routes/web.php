<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Protected\DashboardController;
use App\Http\Controllers\Protected\ListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(["auth", "verified"])->group(function () {
    Route::get("/", [PostController::class, "index"])->name("dashboard");
    Route::get("/post/create", [PostController::class, "create"])->name("post.create");
    Route::post("/post/create", [PostController::class, "store"])->name("post.store");

    Route::post("/lists", [ListController::class, "store"])->name("lists.store");
    Route::patch("/lists/{list}", [ListController::class, "update"])->name("lists.update");
});

require __DIR__ . '/auth.php';
