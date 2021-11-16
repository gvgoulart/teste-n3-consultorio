<?php

use App\Http\Controllers\Web\PacientController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\ConsultController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/pacients', [UserController::class, 'pacients'])->name('pacients');
Route::get('/pacients/delete/{id}', [PacientController::class,'delete'])->name('pacient_delete');
Route::get('/pacients/createForm', [PacientController::class,'createForm'])->name('pacient_createForm');
Route::post('/pacients/create', [PacientController::class,'create'])->name('pacient_create');
Route::get('/pacients/editForm/{id}', [PacientController::class,'editForm'])->name('pacient_edit_form');
Route::get('/pacients/edit/{id}', [PacientController::class,'edit'])->name('pacient_edit');

Route::get('/consults', [UserController::class, 'consults'])->name('consults');
Route::get('/consult/delete/{id}', [ConsultController::class,'delete'])->name('consult_delete');
Route::get('/consult/editForm/{id}', [ConsultController::class,'editForm'])->name('consult_edit_form');
Route::get('/consult/edit/{id}', [ConsultController::class,'edit'])->name('consult_edit');
Route::get('/consult/createForm', [ConsultController::class,'createForm'])->name('consult_create_form');
Route::post('/consult/create', [ConsultController::class,'create'])->name('consult_create');
Route::get('/consults/all', [ConsultController::class, 'getAll'])->name('consults_all');




require __DIR__.'/auth.php';
