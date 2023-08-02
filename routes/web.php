<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\verificationController;
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
Route::get('/l051n', [loginController::class, 'index'])->name('login');
Route::get('out', [loginController::class, 'out']);
Route::post('login', [loginController::class, 'Auth'])->middleware("throttle:3,2");

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CertificateController::class, 'index']);
    Route::get('/certificate/create', [CertificateController::class, 'create']);
    Route::post('/certificate/send', [CertificateController::class, 'send']);
    Route::get('/certificate/detil/{id}', [CertificateController::class, 'detil']);
    Route::get('/certificate/update/{id}', [CertificateController::class, 'getUpdate']);
    Route::post('/certificate/sendUpdate/{id}', [CertificateController::class, 'update']);
    Route::get('/certificate/qrcode/{number}', [CertificateController::class, 'generateQrCode'])->name('generatePDF');
    Route::post('/certificate/delete/{id}', [CertificateController::class, 'delete']);
});

Route::get('/', [verificationController::class, 'index']);
Route::get('/{number}', [verificationController::class, 'indexSpecific']);
Route::post('/', [verificationController::class, 'find']);