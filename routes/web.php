<?php

use App\Http\Controllers\ProfileController;
use App\Http ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Agentcontroller;

Route::get('/', function () {
    return view('welcome');
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

    
route::get('/admin/login',[AdminController::class , 'Adminlogin' ]) -> name('admin.login');

route::get('/admin/addcar',[AdminController::class , 'Addcar' ]) -> name('add.car');

Route::get('/admin/profile', [AdminController::class, 'Adminprofile'])->name('admin.profile');

Route::get('/admin/driver', [AdminController::class, 'draiveradd'])->name('add.driver');

Route::get('/admin/missison', [AdminController::class, 'Addmission'])->name('add.mission');


Route::get('admin/changpass',[Admincontroller::class , 'changpassword'])-> name('change.password');


Route::post('admin/profile/update', [AdminController::class, 'updateprofil'])->name('profile.update');
    
 });

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    
Route::get('/agent/dashboard',[Agentcontroller::class , 'AgentDashboard']) -> name('agent.dashboard');





Route::get('/admin/logout',[AdminController::class , 'Adminlogout' ]) -> name('admin.logout'); 





Route::get('admin/signe', [AdminController::class, 'adminsigne'])->name('signe.admin');


Route::post('admin/signe/create',[Admincontroller::class , 'adminsingedata']);
