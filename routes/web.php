<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Applicant\Home;
use App\Livewire\Applicant\ApplyCertificate;
use App\Livewire\Applicant\ApplicationHistory;

/********************
 * Applicant unprotected routes
 *******************/

Route::get('/', Home::class)->name('applicant.home');
Route::get('/apply-certificate', ApplyCertificate::class)->name('applicant.aplly');
Route::get('/application-history', ApplicationHistory::class)->name('applicant.history');


/***********************
 * Approver protected routes
 */
