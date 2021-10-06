<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



// //Employs Routes starts

Route::middleware(['auth'])->group(function () {

    //taylor routes start here
    Route::get('/add-taylor', function () {
        return view('add_taylor');
    });
    Route::get('/view-taylor', function () {
        return view('view_taylors');
    });
    Route::post('/store-taylor', [UserController::class, 'store'])->name('add.taylor');
    Route::get('/view-taylor/list', [UserController::class, 'show'])->name('taylor.list');
    Route::get('/view-taylor/edit', [UserController::class, 'edit'])->name('taylor.edit');
    Route::post('/view-taylor/update', [UserController::class, 'update'])->name('taylor.update');
    Route::delete('/view-taylor/delete', [UserController::class, 'destroy'])->name('taylor.delete');
    //taylor routes end here



    //cutter routs start here
    Route::get('/add-cutter', function () {
        return view('add_cutter');
    });
    Route::get('/view-cutter', function () {
        return view('view_cutters');
    });
    Route::post('/store-cutter', [UserController::class, 'store'])->name('add.cutter');
    Route::get('/view-cutter/list', [UserController::class, 'show'])->name('cutter.list');
    Route::get('/view-cutter/edit', [UserController::class, 'edit'])->name('cutter.edit');
    Route::post('/view-cutter/update', [UserController::class, 'update'])->name('cutter.update');
    Route::delete('/view-cutter/delete', [UserController::class, 'destroy'])->name('cutter.delete');
    //cutter routs end here



    // customers routes start here
    Route::get('/add-customer', function () {
        return view('add_customer');
    });
    Route::get('/view-customer', function () {
        return view('view_customers');
    });

    Route::post('/store-customer', [UserController::class, 'store'])->name('add.customer');
    Route::get('/view-customer/list', [UserController::class, 'show'])->name('customer.list');

    Route::get('/view-customer/edit', [UserController::class, 'edit'])->name('customer.edit');
    Route::post('/view-customer/update', [UserController::class, 'update'])->name('customer.update');
    Route::delete('/view-customer/delete', [UserController::class, 'destroy'])->name('customer.delete');
    // customers routes end here

});



//Employs Routes End


require __DIR__ . '/auth.php';
