<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CertificateController;

Route::get('/', [CertificateController::class, 'index'])->name('landing');
Route::get('/certyfikat/{id}', [CertificateController::class, 'show'])->name('certificate.show');
