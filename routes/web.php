<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('/voter/create',[VoterController::class ,'create'])->name('voter.create');
Route::get('/voter/index',[VoterController::class ,'index'])->name('voter.index');
Route::get('/organization/index',[OrganizationController::class ,'index'])->name('organization.index');
Route::get('/organization/create',[OrganizationController::class ,'create'])->name('organization.create');
Route::post('/voter/create',[VoterController::class ,'store'])->name('voter.store');
Route::post('/organization/create',[OrganizationController::class ,'store'])->name('organization.store');
Route::get('/voter/delete/{id}',[VoterController::class,'destroy'])->name('voter.destroy');
Route::get('/orgainzation/dashboard',[OrganizationController::class ,'index'])->name('org.dashboard');
Route::get('poll/vote/{poll}', [PollController::class,'show'])->name('poll.show');
Route::post('/poll/vote/{poll}', [PollController::class,'vote'])->name('poll.vote');
Route::get('delete/{poll}',[PollController::class,'destroy'])->name('poll.delete');
Auth::routes();

Route::prefix('poll')->middleware('auth:org')->group(function(){
    Route::view('create', 'polls.create')->name('poll.create');
    Route::post('create', [PollController::class, 'store'])->name('poll.store');
    Route::get('/', [PollController::class,'index'])->name('poll.index');
    Route::get('/poll/{poll}/details', [PollController::class,'showDetails'])->name('poll.show.details');
    Route::get('/update/{poll}', [PollController::class,'edit'])->name('poll.edit');
    Route::put('/update/{poll}', [PollController::class,'update'])->name('poll.update');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
