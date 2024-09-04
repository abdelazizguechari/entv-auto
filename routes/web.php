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
use App\Http\Controllers\rolecontroller;
use App\Http\Controllers\MissionsController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StockController;





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
route::get('/admin/calander',[AdminController::class , 'caladner' ]) -> name('caladner.add');
Route::get('/admin/faq', [AdminController::class, 'faq'])->name('admin.faq');
Route::get('/admin/driver', [AdminController::class, 'draiveradd'])->name('add.driver');
Route::get('/admin/missison', [AdminController::class, 'Addmission'])->name('add.mission');
Route::get('admin/changpass',[Admincontroller::class , 'changpassword'])-> name('change.password');
Route::post('admin/profile/update', [AdminController::class, 'updateprofil'])->name('profile.update');
Route::post('admin/update/password', [AdminController::class, 'passwordupdate'])->name('password.change');
Route::get('admin/car/create', [CarController::class, 'create'])->name('car.create');
Route::post('admin/car/store', [CarController::class, 'store'])->name('car.store');
route::get('/admin/ourcars',[CarController::class , 'ourcars' ]) -> name('admin.ourcars');




route::get('/admin/ourcars/edit/{immatriculation}',[CarController::class , 'edit' ]) -> name('edit.car');
route::get('/admin/ourcars/delete/{immatriculation}',[CarController::class , 'deleteCar' ]) -> name('delete.car');

Route::put('/admin/ourcars/update/{immatriculation}', [CarController::class, 'updateCar'])->name('update.car');


Route::get('admin/webapp/Ourcars/data' , [Carcontroller::class , 'cardata']) ->name('car.data');
Route::get('admin/driver/create', [DriverController::class, 'create'])->name('driver.create');
Route::post('admin/driver/store', [DriverController::class, 'store'])->name('driver.store');
Route::get('admin/our/drivers', [DriverController::class, 'ourdrivers'])->name('our.drivers');
Route::get('admin/delete/drivers/{id}', [DriverController::class, 'deletedriver'])->name('delete.driver');
Route::get('admin/edit/drivers/{id}', [DriverController::class, 'editdriver'])->name('edit.driver');


Route::put('admin/upadte/drivers/{id}', [DriverController::class, 'updatedriver'])->name('update.driver');










});






Route::get('/admin/profile', [AdminController::class, 'Adminprofile'])->name('admin.profile');
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');   
Route::get('/agent/dashboard',[Agentcontroller::class , 'AgentDashboard']) -> name('agent.dashboard');
Route::get('/admin/logout',[AdminController::class , 'Adminlogout' ]) -> name('admin.logout'); 
Route::get('admin/signe', [AdminController::class, 'adminsigne'])->name('signe.admin');
Route::post('admin/signe/create', [AdminController::class, 'usersigne'])->name('user.admin');
route::get('/admin/login',[AdminController::class , 'Adminlogin' ]) -> name('admin.login');
Route::get('/auth/redirect', function () {  return Socialite::driver('google')->redirect();});
// Route::get('/auth/google' , [googleauth::class,'redirect' ])->name('google_auth');
// Route::get('/auth/google/call-back',[googleauth::class , 'callback']);

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


Route::controller(roleController::class)->group(function() {

    Route::get('/all/permission', [roleController::class, 'allPermission'])->name('all.permission');
    Route::get('/add/permission', [roleController::class, 'addpermission'])->name('add.permission');
    Route::post('/permission/store', [roleController::class, 'storepermission'])->name('store.permission');
    Route::get('ad/change/permission/{id}', [roleController::class, 'editpermission'])->name('edit.permission');
    Route::post('/permission/update', [roleController::class, 'updatepermission'])->name('update.permission');
    Route::get('/permission/delate/{id}', [roleController::class, 'delatepermission'])->name('delate.permission');

});





Route::controller(MaintenanceController::class)->group(function() {

    Route::get('/addCar/mantenance{immatriculation}', [MaintenanceController::class, 'addCarmantenance'])->name('addCar.mantenance');
    Route::post('/maintenance/store', [MaintenanceController::class, 'store'])->name('maintenance.store');
    Route::get('/Datain/maintenance', [MaintenanceController::class, 'Datainmaintenance'])->name('Datain.maintenance');
    Route::get('/maintenance/print/{id}', [MaintenanceController::class, 'print'])->name('maintenance.print');

    // Route::get('ad/change/permission/{id}', [MaintenanceController::class, 'editpermission'])->name('edit.permission');
    // Route::post('/permission/update', [MaintenanceController::class, 'updatepermission'])->name('update.permission');
    // Route::get('/permission/delate/{id}', [MaintenanceController::class, 'delatepermission'])->name('delate.permission');

});



Route::controller(StockController::class)->group(function() {

    Route::get('/add/stock', [StockController::class, 'addstock'])->name('add.stock');
    Route::post('/stocks/store', [StockController::class, 'store'])->name('stocks.store');
    // Route::get('/Datain/maintenance', [StockController::class, 'Datainmaintenance'])->name('Datain.maintenance');
    // Route::get('/maintenance/print/{id}', [StockController::class, 'print'])->name('maintenance.print');

    // Route::get('ad/change/permission/{id}', [StockController::class, 'editpermission'])->name('edit.permission');
    // Route::post('/permission/update', [StockController::class, 'updatepermission'])->name('update.permission');
    // Route::get('/permission/delate/{id}', [StockController::class, 'delatepermission'])->name('delate.permission');

});





Route::controller(roleController::class)->group(function() {

    Route::get('/all/role', [roleController::class, 'allrole'])->name('all.role');
    Route::get('/add/role', [roleController::class, 'addrole'])->name('add.role');
    
    Route::get('ad/change/role/{id}', [roleController::class, 'editrole'])->name('edit.role');
    Route::post('/role/update', [roleController::class, 'updaterole'])->name('update.role');
    Route::get('/role/delate/{id}', [roleController::class, 'delaterole'])->name('delate.role');



  
    Route::post('/role/save', [roleController::class, 'rolePermissionStore'])->name('role.permission.save');
    Route::get('/permission/role', [roleController::class, 'addrolespermission'])->name('add.roles.permission');
    

    
    Route::post('/role/store', [roleController::class, 'storerole'])->name('save.role');

    Route::get('/all/permission/role', [roleController::class, 'allrolespermission'])->name('all.roles.permission');


    Route::get('admin/role/editing/{id}', [roleController::class, 'admineditrole'])->name('admin.edit.role');

    Route::post('admin/role/update/{id}', [roleController::class, 'adminroleupdate'])->name('admin.role.update');


    Route::get('admin/role/delete/{id}', [roleController::class, 'admindeleterole'])->name('admin.delete.role');

 
   
   
});





