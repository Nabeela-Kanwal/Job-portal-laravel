
<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/home', [HomeController::class, 'index'])->name('home');




    Route::group(['account'], function () {
    Route::group(['middleware' => 'guest'], function () {
    Route::get('/account/registration', [AccountController::class, 'registration'])->name('account.registration');
    Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
    Route::post('/proces/registration', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
    Route::post('/account/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
  });

    Route::group(['middleware' => 'auth'], function () {
    Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::get('/account/logout', [AccountController::class, 'logout'])->name('account.logout');
    Route::put('/account/update/Profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
    Route::post('/account/updateProfilePic', [AccountController::class, 'updateProfilePic'])->name('account.updateProfilePic');
    Route::post('/account/create/Job', [AccountController::class, 'createJob'])->name('account.createJob');
  });
});
