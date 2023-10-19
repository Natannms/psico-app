<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\TermsController;
use Illuminate\Support\Facades\Route;

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
Route::get('/preview/atestado', [DocumentsController::class, 'atestadoCreate'])->name('preview.atestado');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //uploads
    Route::post('/upload/logo', [ImagesController::class, 'uploadLogo'])->name('upload.logo');
    Route::post('/upload/seal', [ImagesController::class, 'uploadSeal'])->name('upload.seal');


    Route::get('/report/{schedule_id}', [ReportController::class, 'index'])->name('report.index');
    Route::post('/report/update/{report_id}', [ReportController::class, 'update'])->name('report.update');



    Route::get('/images/edit/{user_id}', [ImagesController::class, 'edit'])->name('images.edit');

    Route::get('/atestado/generate/{id}', [DocumentsController::class, 'atestadoCreate'])->name('atestado.atestadoCreate');
    Route::get('/recibo/generate/{id}', [DocumentsController::class, 'reciboCreate'])->name('recibo.reciboCreate');


    Route::get('/dashboard/{data_inicial?}/{data_final?}', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/agendamentos/{id}/cliente/{data_inicial?}/{data_final?}', [SchedulesController::class, 'indexClient'])->name('agendamentos.cliente.index');

    Route::get('/documents/{filename}', [Controller::class, 'readPdf']);
});

Route::get('/client/schedule', [SchedulesController::class, 'scheduleClientCreate'])->name('client.schedule.create');
Route::post('/schedule/store', [SchedulesController::class, 'store'])->name('schedule.store');
Route::get('/terms', [TermsController::class, 'index'])->name('terms.show');
Route::get('/policy', [PrivacyPolicyController::class, 'index'])->name('policy.show');
