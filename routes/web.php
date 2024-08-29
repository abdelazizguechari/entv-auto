<?php

use App\Http\Controllers\ProfileController;
use App\Http ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\googleauth;
use App\Http\Controllers\Agentcontroller;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;




Route::get('/', function () {
    return view('admin.admin_login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () { 
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function () {

    

route::get('/admin/addcar',[AdminController::class , 'Addcar' ]) -> name('add.car');
Route::get('/admin/faq', [AdminController::class, 'faq'])->name('admin.faq');
Route::get('/admin/driver', [AdminController::class, 'draiveradd'])->name('add.driver');
Route::get('/admin/missison', [AdminController::class, 'Addmission'])->name('add.mission');
Route::get('admin/changpass',[Admincontroller::class , 'changpassword'])-> name('change.password');
Route::post('admin/profile/update', [AdminController::class, 'updateprofil'])->name('profile.update');
Route::post('admin/update/password', [AdminController::class, 'passwordupdate'])->name('password.change');
Route::get('admin/car/create', [CarController::class, 'create'])->name('car.create');
Route::post('admin/car/store', [CarController::class, 'store'])->name('car.store');
route::get('/admin/ourcars',[CarController::class , 'ourcars' ]) -> name('admin.ourcars');
Route::get('admin/webapp/Ourcars/data' , [Carscontroller::class , 'cardata']) ->name('car.data');
Route::get('admin/driver/create', [DriverController::class, 'create'])->name('driver.create');
Route::post('admin/driver/store', [DriverController::class, 'store'])->name('driver.store');


});




Route::get('/admin/profile', [AdminController::class, 'Adminprofile'])->name('admin.profile');
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');   
Route::get('/agent/dashboard',[Agentcontroller::class , 'AgentDashboard']) -> name('agent.dashboard');
Route::get('/admin/logout',[AdminController::class , 'Adminlogout' ]) -> name('admin.logout'); 
Route::get('admin/signe', [AdminController::class, 'adminsigne'])->name('signe.admin');
route::get('/admin/login',[AdminController::class , 'Adminlogin' ]) -> name('admin.login');
Route::get('/auth/redirect', function () {  return Socialite::driver('google')->redirect();});
Route::get('/auth/google' , [googleauth::class,'redirect' ])->name('google_auth');
Route::get('/auth/google/call-back',[googleauth::class , 'callback']);
