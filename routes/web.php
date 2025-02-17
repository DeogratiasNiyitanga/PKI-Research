<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Approver\AdminHome;
use App\Livewire\Applicant\Home;
use App\Livewire\Applicant\ApplyCertificate;
use App\Livewire\Applicant\ApplicationHistory;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Approver\ManageExpriration;
use App\Livewire\Approver\Applications;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/login', Login::class)->name('login')->middleware('guest');
Route::get('/register', function () {
    return view('auth.register');
})->name('register')->middleware('guest');

/********************
 * Applicant unprotected routes
 *******************/
Route::get('/', Home::class)->name('applicant.home');
Route::get('/apply-certificate', ApplyCertificate::class)->name('applicant.aplly');
Route::get('/application-history', ApplicationHistory::class)->name('applicant.history');

/***********************
 * Approver protected routes
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', AdminHome::class)->name('dashboard');
    Route::get('/manage-expiration', ManageExpriration::class)->name('manage.expiration');
    Route::get('/applications', Applications::class)->name('applications');
});




// Logout route
Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('login');
})->middleware('auth')->name('logout');
