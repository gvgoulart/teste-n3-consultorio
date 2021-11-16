<?php

use App\Http\Controllers\Api\ConsultController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PacientController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [UserController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {

    //Lista usarioS
    Route::get('user', [UserController::class, 'getAll']);

    //Lista usuário
    Route::get('user/{id}', [UserController::class, 'getUser']);

    //Edita usuário
    Route::put('edit/{id}', [UserController::class, 'edit']);

    //Deleta usuário
    Route::delete('delete/{id}', [UserController::class, 'delete']);

    //Cria Paciente
    Route::post('pacient/create', [PacientController::class, 'create']);

    //Lista usarioS
    Route::get('pacient/getAll', [PacientController::class, 'getAll']);

    //Lista usuário
    Route::get('pacient/getPacient/{id}', [PacientController::class, 'getPacient']);
    
    //Edita usuário
    Route::put('pacient/edit/{id}', [PacientController::class, 'edit']);
    
    //Deleta usuário
    Route::delete('pacient/delete/{id}', [PacientController::class, 'delete']);


        //Cria Consulta|| Necessário id do paciente na URL
        Route::post('consult/create/{id}', [ConsultController::class, 'create']);

        //Lista usarioS
        Route::get('consult/getAll', [ConsultController::class, 'getAll']);
    
        //Lista usuário
        Route::get('consult/getConsult/{id}', [ConsultController::class, 'getConsult']);
        
        //Edita usuário
        Route::put('consult/edit/{id}', [ConsultController::class, 'edit']);
        
        //Deleta usuário
        Route::delete('consult/delete/{id}', [ConsultController::class, 'delete']);
});
