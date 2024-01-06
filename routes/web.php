<?php

use App\Http\Controllers\CarsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionsController;
use Illuminate\Support\Facades\Route;

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
  return view('auth.login');
});

Route::get('/dashboard', function () {
  return view('template.pages.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::prefix('mobil')->group(function () {
    Route::get('/', [CarsController::class, 'index'])->name('master.mobil');
    Route::name('mobil.')->group(function () {
      Route::post('/fetch', [CarsController::class, 'getAjax'])->name('fetch');
      Route::post('/store', [CarsController::class, 'store'])->name('store');
      Route::get('/destroy/{cars}', [CarsController::class, 'destroy'])->name('destroy');
      Route::get('/show/{cars}', [CarsController::class, 'show'])->name('show');
      Route::put('/update/{cars}', [CarsController::class, 'update'])->name('update');
      //   Route::get('/plasma', [PlasmaRanapController::class, 'plasma'])->name('show-plasma');

    });
  });
  Route::prefix('transaction')->group(function () {
    Route::get('/', [TransactionsController::class, 'show'])->name('master.transaction');
    Route::name('transaction.')->group(function () {
      Route::post('/fetch', [CarsController::class, 'getAjax'])->name('fetch');
      Route::post('/store', [CarsController::class, 'store'])->name('store');
      Route::get('/destroy/{cars}', [CarsController::class, 'destroy'])->name('destroy');
      Route::get('/show/{cars}', [CarsController::class, 'show'])->name('show');
      Route::put('/update/{cars}', [CarsController::class, 'update'])->name('update');
      //   Route::get('/plasma', [PlasmaRanapController::class, 'plasma'])->name('show-plasma');

    });
  });


  Route::get('/list-mobil', [TransactionsController::class, 'index'])->name('sewa');
  Route::get('/sewa/{id}', [TransactionsController::class, 'create'])->name('sewa.mobil');
  Route::post('/sewa', [TransactionsController::class, 'store'])->name('sewa.mobil.store');


  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
