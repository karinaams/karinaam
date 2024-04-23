<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\flight;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaskapaiController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TransactionController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('admin.dashboard');
Route::get('admin.airline', [AirlineController::class, 'index'])->name('admin.airlines');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('role:admin')->group(function () {
    Route::get('admin.edit/{id}', [HomeController::class, 'edit'])->name('admin.edit');
    Route::post('admin.update/{id}', [HomeController::class, 'update'])->name('admin.update');
    Route::get('admin.delete/{id}', [HomeController::class, 'destroy'])->name('admin.delete');

    Route::get('airline.create', [AirlineController::class, 'create'])->name('admin.airline.create');
    Route::post('airline.store', [AirlineController::class, 'store'])->name('admin.airline.store');

    Route::get('airline.edit/{id}', [AirlineController::class, 'edit'])->name('airlines.edit');
    Route::post('airline.update/{id}', [AirlineController::class, 'update'])->name('airline.update');

    Route::get('airline.delete/{id}', [AirlineController::class, 'destroy'])->name('airline.delete');

    Route::get('/laporan', [HomeController::class, 'show'])->name('admin.laporan');
    Route::post('/laporan.confirm/{id}', [HomeController::class, 'confirmPayment'])->name('laporan.confirm');
    Route::post('/laporan.cancel/{id}', [HomeController::class, 'canceledPayment'])->name('laporan.cancel');
    // Route::post('/tiket.delete/{id}', [HomeController::class, 'deletePayment'])->name('tiket.delete');

    Route::get('laporan.pending', [HomeController::class, 'laporan'])->name('laporan.pending');
    Route::get('laporan.berhasil', [HomeController::class, 'laporanBerhasil'])->name('laporan.berhasil');

    // Route::get('/search', [TransactionController::class, 'search'])->name('search');
});

Route::middleware('role:maskapai')->group(function () {
    Route::get('maskapai', [MaskapaiController::class, 'index'])->name('maskapai.dashboard');
    Route::get('maskapai.add', [MaskapaiController::class, 'create'])->name('flight.add');
    Route::post('flight.store', [FlightController::class, 'store'])->name('flight.store');


    Route::get('flight.edit/{id}', [FlightController::class, 'edit'])->name('flight.edit');
    Route::post('flight.update/{id}', [FlightController::class, 'update'])->name('flight.update');
    Route::delete('flight.delete/{id}', [FlightController::class, 'destroy'])->name('flight.delete');

    // Route::get('maskapai.flight.show', [MaskapaiController::class, 'inxdex'])->name('maskapai.flight.show');


    // Route::post('maskapai.confirmPayment/{id}', [AdminController::class, 'confirmPayment'])->name('maskapai.confirmPayment');

    // Route::get('user.searchLaporan', [MaskapaiController::class, 'searchLaporan'])->name('maskapai.searchLaporan');
});

 Route::middleware('role:user')->group(function () {
    Route::get('user', [UsersController::class, 'index'])->name('user.dashboard');
    Route::get('user.customer/{id}', [UsersController::class, 'create'])->name('user.customer');
    // Route::post('user.customer/{id}', [UserController::class, 'store'])->name('user.customer.store');

    // Route::get('user.transaction', [TransactionController::class, 'index'])->name('user.transaction');
    // Route::post('user.transaction.store', [TransactionController::class, 'store'])->name('user.transaction.store');

    Route::get('user.show', [UsersController::class, 'show'])->name('user.show');
    // Route::get('user.searchFlights', [FlightController::class, 'searchFlights'])->name('user.searchFlights');

    Route::get('/User.Buy/{id}', [TransactionController::class, 'create'])->name('User.detail_pemesan');
    Route::post('/User.Buy.store/{id}', [TransactionController::class, 'store'])->name('User.buy.store');

    Route::get('/User.List.Tiket', [TransactionController::class, 'show'])->name('User.Tiketlist');
});



require __DIR__.'/auth.php';
