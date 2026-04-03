<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
// Главная страница
Route::get('/', [HotelController::class, 'index'])->name('home');
Route::get('/about',[AboutController::class,'about'])->name('about');
// Маршруты аутентификации
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Страница конкретного отеля
Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');

// Поиск отелей
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/advanced', [SearchController::class, 'advanced'])->name('search.advanced');
Route::get('/search/cities', [SearchController::class, 'cities'])->name('search.cities');

// Страница dashboard 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



// Маршруты для авторизованных пользователей
Route::middleware('auth')->group(function () {
    // Профиль пользователя
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    
    // Редактирование профиля
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Бронирования
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create/{hotelId}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    
    // Комментарии
    Route::post('/hotels/{hotelId}/comments', [CommentController::class, 'store'])->name('comments.store');
    
    // Избранное (лайки)
    Route::get('/likes', [LikeController::class, 'index'])->name('likes.index');
    Route::post('/hotels/{hotel}/like', [LikeController::class, 'toggle'])->name('likes.toggle');
    Route::get('/hotels/{hotel}/like/check', [LikeController::class, 'check'])->name('likes.check');
    
});

