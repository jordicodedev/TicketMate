<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [TicketController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/tickets', [TicketController::class, 'index'])->middleware(['auth', 'verified'])->name('tickets');
Route::get('/tickets/create', [TicketController::class, 'create'])->name('create');
Route::post('/tickets/create', [TicketController::class, 'store'])->name('store');
Route::post('/tickets/{ticket}', [TicketController::class, 'update'])->name('update');
Route::get('/tickets/delete/{ticket}', [TicketController::class, 'delete'])->name('delete');
Route::post('/tickets/delete/{ticket}', [TicketController::class, 'destroy'])->name('destroy');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Auth::routes();