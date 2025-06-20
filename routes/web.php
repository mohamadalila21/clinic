<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\BookedController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnterController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\NeedController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProcesController;
use App\Http\Controllers\RevenuesController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClinicReservationsController;
use App\Http\Controllers\WaitingController;
use App\Http\Controllers\testController;

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





Route::get('/',[ShowController::class,'home']);
Route::get('/articles',[ShowController::class,'articles']);
Route::get('showarticles/{id}',[ShowController::class,'showarticles']);
Route::get('/booked',[ShowController::class,'booked'])->name('book');
Route::get('/condition',[ShowController::class,'condition']);
Route::view('/about','web.about');
Route::view('/services','web.services');



Auth::routes(['register'=>true]);

Route::group(['prefix' => 'admin','middleware'=>'user'], function() {

    Route::resource('/',LayoutController::class);


    Route::resource('enter', EnterController::class);
    Route::resource('employee',EmployeeController::class);
    Route::resource('expenses',ExpensesController::class);
    Route::resource('revenues',RevenuesController::class);
    Route::resource('lab',LabController::class);
    Route::resource('need',NeedController::class);
    Route::resource('payment',PaymentController::class);
    Route::resource('booked',BookedController::class);
    Route::resource('articles',ArticlesController::class);
    Route::resource('condition',ConditionController::class);
    Route::resource('proces',ProcesController::class);
    Route::resource('ClinicReservations',ClinicReservationsController::class);
    Route::get('day',[BookedController::class,'day'])->name('day');
    Route::get('book/date',[BookedController::class,'formatdate']);
    Route::resource('waiting',WaitingController::class);

});
Route::get('/home', [App\Http\Controllers\EnterController::class, 'index']);

Route::post('booked' , [testController::class , 'store'])->name('rev.store');