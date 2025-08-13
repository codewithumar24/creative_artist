<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboard\ArtworkController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//home Routes

Route::get("/", [HomeController::class, "index"])->name("home.index");
Route::get("/about", [HomeController::class, "about"])->name("home.about");
Route::get("/gallery", [HomeController::class, "gallery"])->name("home.gallery");
Route::get("/contact", [HomeController::class, "contact"])->name("home.contact");
Route::get("/artist", [HomeController::class, "artist"])->name("home.artist");
Route::get("/profile", [HomeController::class, "profile"])->name("home.profile");

//login Routes
Route::get("/loginForm", [AuthController::class, "showlogin"])->name("login");
Route::get("/registerForm", [AuthController::class, "showRegister"])->name("auth.register");
Route::post("/register", [AuthController::class, "register"])->name('auth.signUp');
Route::post("/store", [AuthController::class, "login"])->name("auth.loginStore");
Route::post("/logout", [AuthController::class, "logout"])->name("auth.logout");


//dashboard Routes

//category controller
Route::middleware(['auth'])->prefix('/dashboard')->group(function () {
    Route::get("/", [DashboardController::class, "index"])->name("dashboard.index");

    Route::get("/category", [CategoryController::class, "index"])->name("category.index");
    Route::get("/category/create", [CategoryController::class, "create"])->name("category.create");
    Route::post("/category/store", [CategoryController::class, "store"])->name("category.store");
    Route::get("/category/edit/{id}", [CategoryController::class, "edit"])->name("category.edit");
    Route::post("/category/update/{id}", [CategoryController::class, "update"])->name("category.update");
    Route::get("/category/delete/{id}", [CategoryController::class, "destroy"])->name("category.delete");

    // Artwork Route 
    Route::get("/artwork", [ArtworkController::class, "index"])->name("artwork.index");
    Route::get("/artwork/create", [ArtworkController::class, "create"])->name("artwork.create");
    Route::post("/artwork/store", [ArtworkController::class, "store"])->name("artwork.store");
});
