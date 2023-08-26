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
use App\Http\Controllers\SubmissionsController;


use App\Mail\MailableName;
use Illuminate\Support\Facades\Mail;


Route::get('/sendInvite', [MailController::class, 'sendMailInvite'])->name('sendInvite');


Route::get('/acceptInvite/{id}/{email?}/{member?}', [MailController::class, 'acceptInvite'])->name('acceptInvite');

Route::get('/',[AccountsController::class,"index"]);
Route::get('/login',[AccountsController::class,"login"])->name('login');
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

Route::get('/dashboard/{id}',[AccountsController::class,"godashboard"])->name('godashboard');


Route::get("/sendmail",[MailController::class,"sendMail"]);


Route::get('/submissions', [SubmissionsController::class, 'index']);
//Route::get('/submissions/create', 'SubmissionsController@create')->name('submissions.create');

Route::resource('submissions', SubmissionsController::class);
Route::get('uploadsubmissions/index', [SubmissionsController::class, 'student_index']);
Route::put('uploadsubmissions/{id}/documentupload', [SubmissionsController::class, 'student_upload_document']);


// Route::put('/uploadsubmissions/upload-document', [SubmissionsController::class, 'student_upload_document']);

Route::get('submissions/{id?}/show-student', 'SubmissionsController@showToStudent')->name('submissions.show_student');
Route::post('submissions/{id}/upload', 'SubmissionsController@uploadDocument')->name('submissions.upload');
Route::post('submissions/{id}/store-document', 'SubmissionsController@storeDocument')->name('submissions.storeDocument');


Route::get('/dashboard/project-overview', 'SubmissionsController@projectOverview')->name('dashboard.project_overview');
Route::get('/marks-and-reviews', 'SubmissionsController@mandview')->name('marks_review');

// Route::get('/submissions/create', [SubmissionsController::class, 'create']);
// Route::post('/submissions/store', [SubmissionsController::class, 'store']);
// Route::get('/submissions/{id}', [SubmissionsController::class, 'show']);
// Route::get('/submissions/{id}/edit', [SubmissionsController::class, 'edit']);
// Route::put('/submissions/{id}', [SubmissionsController::class, 'update']);
// Route::delete('/submissions/{id}', [SubmissionsController::class, 'destroy']);


