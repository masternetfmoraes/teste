<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegaController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route:: get('/',[PegaController::class,'Pega']);
//Route:: get('/',[PegaController::class,'exibe']);
//Route:: get('/',[PegaController::class,'PegaImg']);