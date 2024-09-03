<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\googleauth;
use App\Http\Controllers\AgentController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\MissionsController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('admin.admin_login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () { 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::post('/api/drivers-by-cars', [MissionsController::class, 'getDriversByCars']);    

    Route::get('/admin/addcar', [AdminController::class, 'Addcar'])->name('add.car');
    Route::get('/admin/faq', [AdminController::class, 'faq'])->name('admin.faq');
    Route::get('/admin/driver', [AdminController::class, 'draiveradd'])->name('add.driver');
    Route::get('/admin/missison', [AdminController::class, 'Addmission'])->name('add.mission');
    Route::get('admin/changpass', [AdminController::class, 'changpassword'])->name('change.password');
    Route::post('admin/profile/update', [AdminController::class, 'updateprofil'])->name('profile.update');
    Route::post('admin/update/password', [AdminController::class, 'passwordupdate'])->name('password.change');
    Route::get('admin/car/create', [CarController::class, 'create'])->name('car.create');
    Route::post('admin/car/store', [CarController::class, 'store'])->name('car.store');
    Route::get('/admin/ourcars', [CarController::class, 'ourcars'])->name('admin.ourcars');
    Route::get('admin/webapp/Ourcars/data', [CarController::class, 'cardata'])->name('car.data');
    Route::get('admin/driver/create', [DriverController::class, 'create'])->name('driver.create');
    Route::post('admin/driver/store', [DriverController::class, 'store'])->name('driver.store');
    Route::get('/admin/ourdrivers', [DriverController::class, 'index'])->name('admin.ourdrivers');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/missions', [MissionsController::class, 'index'])->name('missions.index');
    Route::get('/missions/transportation', [MissionsController::class, 'indexTransportation'])->name('missions.index.transportation');
    Route::get('/missions/create/transportation', [MissionsController::class, 'createTransportation'])->name('missions.create.transportation');
    Route::get('/missions/create/mission', [MissionsController::class, 'createMission'])->name('missions.create.mission');
    Route::get('/missions/create/events', [MissionsController::class, 'createEvents'])->name('missions.create.events');
    Route::post('/missions/store/transportation', [MissionsController::class, 'storeTransportation'])->name('missions.store.transportation');
    Route::post('/missions/store/mission', [MissionsController::class, 'storeMission'])->name('missions.store.mission');
    Route::post('/missions/store/events', [MissionsController::class, 'storeEvents'])->name('missions.store.events');
    Route::get('/missions/edit/{id}', [MissionsController::class, 'edit'])->name('missions.edit');
    Route::put('/missions/update/{id}', [MissionsController::class, 'update'])->name('missions.update');
    Route::delete('/missions/delete/{id}', [MissionsController::class, 'destroy'])->name('missions.destroy');
});

Route::resource('events', EventController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/cars/delete/{immatriculation}', [CarController::class, 'delete'])->name('cars.delete');
    Route::get('/cars/edit/{immatriculation}', [CarController::class, 'edit'])->name('cars.edit');
    Route::put('/cars/update/{immatriculation}', [CarController::class, 'update'])->name('cars.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
    Route::get('/drivers/edit/{id}', [DriverController::class, 'edit'])->name('drivers.edit');
    Route::put('/drivers/update/{id}', [DriverController::class, 'update'])->name('drivers.update');
    Route::get('/drivers/delete/{id}', [DriverController::class, 'delete'])->name('drivers.delete');
});

Route::get('/admin/profile', [AdminController::class, 'Adminprofile'])->name('admin.profile');
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');   
Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
Route::get('/admin/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout'); 
Route::get('admin/signe', [AdminController::class, 'adminsigne'])->name('signe.admin');
Route::get('/admin/login', [AdminController::class, 'Adminlogin'])->name('admin.login');
Route::get('/auth/redirect', function () { return Socialite::driver('google')->redirect(); });
Route::get('/auth/google', [googleauth::class, 'redirect'])->name('google_auth');
Route::get('/auth/google/call-back', [googleauth::class, 'callback']);