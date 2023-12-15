<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::name("user.")->prefix("/users")->group(function () {
    Route::get("/", [UserController::class, 'index'])->name('index');
    Route::get("/{id}", [UserController::class, 'show'])->name('show');
    Route::post("/", [UserController::class, 'store'])->name('store');
    Route::match(['put', 'patch'], '/', [UserController::class, 'update'])->name('update');
    Route::delete("/", [UserController::class, 'destroy'])->name('destroy');
});

