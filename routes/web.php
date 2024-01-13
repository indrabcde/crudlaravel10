<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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

Route::get('/pegawai', [EmployeeController::Class,'index'])->name('pegawai');
Route::get('/tambahpegawai', [EmployeeController::Class,'tambahpegawai'])->name('tambahpegawai');

Route::post('/insertdata', [EmployeeController::Class,'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}', [EmployeeController::Class,'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployeeController::Class,'updatedata'])->name('updatedata');
Route::get('/delete/{id}', [EmployeeController::Class,'delete'])->name('delete');

//export pdf
Route::get('/exportpdf', [EmployeeController::Class,'exportpdf'])->name('exportpdf');
//export excel
Route::get('/exportexcel', [EmployeeController::Class,'exportexcel'])->name('exportexcel');
Route::post('/importexcel', [EmployeeController::Class,'importexcel'])->name('importexcel');
