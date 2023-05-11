<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransController;
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
    return view('welcome');
})->name('home');

Route::get('/list', [DashboardController::class, 'list'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/lists', [DashboardController::class, 'lists'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(DashboardController::class)->prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', 'index')->name('dashboard.index');
    Route::prefix('transaction')->group(function () {
        Route::get('/', 'indexTrans')->name('trans.user.index');
        Route::get('/list', 'indexTransList')->name('trans.user.list');
        Route::get('/pay/{id}', 'pay')->name('trans.user.pay');
        Route::post('/pay/{id}', 'send')->name('trans.user.send');
    });
    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        Route::get('/', 'admin')->name('dashboard.admin.index');

        Route::controller(CarController::class)->prefix('cars')->middleware(['auth', 'admin'])->group(function () {
            Route::get('/', 'index')->name('cars.index'); // index
            Route::post('/create', 'store')->name('cars.store'); // create store C
            Route::get('/create', 'create')->name('cars.create'); // create index R
            Route::get('/edit/{id}', 'edit')->name('cars.edit'); // create edit U
            Route::patch('/edit/{id}', 'update')->name('cars.update'); // create update
            Route::delete('/delete/{id}', 'destroy')->name('cars.destroy'); // create delete D
            Route::get('/delete/{id}', 'destroy')->name('cars.destroy'); // create delete D
            Route::get('/all/test/{id}', 'test')->name('cars.test'); // test
            Route::get('/list', 'list')->name('cars.list'); // list
            // car
            Route::get('/all', 'listAll')->name('car.list.all'); // list
            Route::get('/all/create', 'allCreate')->name('car.all.create'); // test
            Route::post('/all/create', 'allStore')->name('car.all.store'); // test
            Route::get('/all/edit/{id}', 'allEdit')->name('car.all.edit'); // test
            Route::put('/all/edit/{id}', 'allUpdate')->name('car.all.update'); // test
        });

        Route::controller(TransController::class)->prefix('trans')->middleware(['auth', 'admin'])->group(function () {
            Route::get('/list', 'index')->name('trans.index'); // index
            Route::get('/list/index', 'listNew')->name('trans.list'); // index list
            Route::get('/process', 'process')->name('trans.process'); // proses
            Route::get('/done', 'done')->name('trans.done'); // done
        });

        Route::controller(DriverController::class)->prefix('driver')->middleware(['auth', 'admin'])->group(function () {
            Route::get('/', 'index')->name('driver.index'); // index
            Route::get('/create', 'create')->name('driver.create'); // create
            Route::post('/create', 'store')->name('driver.store'); // store
            Route::get('/edit/{id}', 'edit')->name('driver.edit'); // edit
            Route::put('/edit/{id}', 'update')->name('driver.update'); // update
            Route::delete('/delete/{id}', 'destroy')->name('driver.destroy'); // delete
            Route::get('/list', 'list')->name('driver.list'); // list
        });
    });
    Route::get('/rent/{id}', 'sewa')->name('rent');
    Route::post('/rent/{id}', 'store')->name('rent.post');
});

require __DIR__.'/auth.php';
