<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReligionController;
use App\Models\Employee;
use App\Models\Religion;

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
    $jumlahpegawai = Employee::count();
    $jumlahpegawaicowo = Employee::where('jeniskelamin','cowo')->count();
    $jumlahpegawaicewe = Employee::where('jeniskelamin','cewe')->count();
    return view('welcome', compact('jumlahpegawai', 'jumlahpegawaicowo', 'jumlahpegawaicewe'));
})->middleware('auth');

Route::group(['middleware' => ['auth', 'hakakses:admin']], function(){
    Route::post('/updatedata/{id}', [EmployeeController::Class,'updatedata'])->name('updatedata');
    Route::get('/delete/{id}', [EmployeeController::Class,'delete'])->name('delete');
    Route::post('/insertdata', [EmployeeController::Class,'insertdata'])->name('insertdata');
    Route::get('/tambahpegawai', [EmployeeController::Class,'tambahpegawai'])->name('tambahpegawai');
    Route::get('/tampilkandata/{id}', [EmployeeController::Class,'tampilkandata'])->name('tampilkandata');
    Route::post('/importexcel', [EmployeeController::Class,'importexcel'])->name('importexcel');
    Route::get('/tambahagama', [ReligionController::class,'create'])->name('tambahagama')->middleware('auth');
});


Route::get('/pegawai', [EmployeeController::Class,'index'])->name('pegawai')->middleware('auth');






//export pdf
Route::get('/exportpdf', [EmployeeController::Class,'exportpdf'])->name('exportpdf');
//export excel
Route::get('/exportexcel', [EmployeeController::Class,'exportexcel'])->name('exportexcel');

Route::get('/login', [LoginController::Class,'login'])->name('login');

Route::post('/loginproses', [LoginController::Class,'loginproses'])->name('loginproses');
Route::get('/register', [LoginController::Class,'register'])->name('register');
Route::post('/registeruser', [LoginController::Class,'registeruser'])->name('registeruser');
Route::get('/logout', [LoginController::Class,'logout'])->name('logout');



Route::get('/datareligion', [ReligionController::class,'index'])->name('datareligion')->middleware('auth');


Route::post('/insertdatareligion', [ReligionController::class,'store'])->name('insertdatareligion')->middleware('auth');
