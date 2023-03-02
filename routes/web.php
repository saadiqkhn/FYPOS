<?php

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
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\MailController;

use App\Mail\MailableName;
use Illuminate\Support\Facades\Mail;

Route::get('/sendInvite', [MailController::class, 'sendMailInvite'])->name('sendInvite');

Route::get('/acceptInvite', [MailController::class, 'acceptInvite'])->name('acceptInvite');

Route::get('/',[AccountsController::class,"index"]);
Route::get('/login',[AccountsController::class,"login"]);
Route::post('/dologin',[AccountsController::class,"dologin"]);
Route::get('/register',[AccountsController::class,"register"]);
Route::post('/doregister',[AccountsController::class,"doregister"]);

Route::get('/projectentry',[AccountsController::class,"projectentry"]);
Route::post('/doprojectentry',[AccountsController::class,"doprojectentry"]);

Route::get('/studentdashboard',[AccountsController::class,"studentdashboard"]);
Route::get('/signout',[AccountsController::class,"signout"]);
Route::get('/documentsubmission',[AccountsController::class,"documentsubmission"]);
Route::post('/uploaddocument',[AccountsController::class,"uploaddocument"]);

Route::get('/guidelines',[AccountsController::class,"guidelines"]);
Route::post('/postguidelines',[AccountsController::class,"postguidelines"]);
Route::get('/generalguidelines',[AccountsController::class,"generalguidelines"]);

Route::get("/sendmail",[MailController::class,"sendMail"]);