<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboard\ArtistController;
use App\Http\Controllers\dashboard\ArtworkController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
// All dashboard Routes

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
    Route::get("/artwork/edit/{id}", [ArtworkController::class, "edit"])->name("artwork.edit");
    Route::post("/artwork/update/{id}", [ArtworkController::class, "update"])->name("artwork.update");
    Route::post('/artwork/destroy/{id}', [ArtworkController::class, 'destroy'])->name('artwork.destroy');
    Route::get('/artwork/{artwork}', [ArtworkController::class, 'show'])->name('artwork.show');
    // Artist Route
    Route::get("/artist", [ArtistController::class, "index",])->name("artist.index");
    Route::get("/artist/create", [ArtistController::class, "create",])->name("artist.create");
    Route::post("/artist.store", [ArtistController::class, "store"])->name("artist.store");
    Route::get('/artist/{artist}/edit', [ArtistController::class, 'edit'])->name('artist.edit');
    Route::post('/artist/{artist}', [ArtistController::class, 'update'])->name('artist.update');
    Route::get("/artist/delete/{id}",[ArtistController::class,"destroy"])->name("artist.destroy");
    Route::get('/artist/{artist}', [ArtistController::class, 'show'])->name('artist.show');
});
Route::middleware(['auth'])->group(function () {
    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    // Admin routes
    Route::middleware(['auth'])->prefix('admin')->group(function () {
        Route::resource('users', UserController::class)->names([
            'index' => 'admin.users.index',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'show' => 'admin.users.show',
            'edit' => 'admin.users.edit',
            'update' => 'admin.users.update',
            'destroy' => 'admin.users.destroy'
        ]);
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
// google logins 
Route::get("/auth/google",[GoogleController::class,"redirectToGoogle"])->name("google.login");
Route::get("/auth/google/callback",[GoogleController::class,"handleGoogle"])->name("googleHandle");