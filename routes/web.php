<?php

use App\Http\Controllers\ProfileController;
use App\Http ;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;
// use App\Http\Controllers\googleauth;
use App\Http\Controllers\Agentcontroller;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\rolecontroller;
use App\Http\Controllers\MissionsController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\FaQController ;
use App\Http\Controllers\DashboardController ;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PusherController;










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



    Route::controller(CarController::class)->group(function(){

        Route::get('admin/vehicle/createw', [CarController::class, 'create'])->name('car.create'); // Changed /admin/car/create to /admin/vehicle/create
        Route::post('admin/vehicle/reez', [CarController::class, 'store'])->name('car.store'); // Changed /admin/car/store to /admin/vehicle/store
        Route::get('/admin/vehicles/flizst', [CarController::class, 'ourcars'])->name('admin.ourcars'); // Changed /admin/ourcars to /admin/vehicles/list
        Route::get('/admin/vehicles/qedit/{immatriculation}', [CarController::class, 'edit'])->name('edit.car'); // Changed /admin/ourcars/edit/{immatriculation} to /admin/vehicles/edit/{immatriculation}
        Route::get('/admin/vehicles/dfselete/{immatriculation}', [CarController::class, 'deleteCar'])->name('delete.car'); // Changed /admin/ourcars/delete/{immatriculation} to /admin/vehicles/delete/{immatriculation}
        Route::put('/admin/vehicles/updqsate/{immatriculation}', [CarController::class, 'updateCar'])->name('update.car'); // Changed /admin/ourcars/update/{immatriculation} to /admin/vehicles/update/{immatriculation}
        Route::get('admin/webapp/vehifcles/data', [CarController::class, 'cardata'])->name('car.data'); // Changed /admin/webapp/Ourcars/data to /admin/webapp/vehicles/data
        Route::get('/vehicles/deletfe/{immatriculation}', [CarController::class, 'delete'])->name('cars.delete'); // Changed /cars/delete/{immatriculation} to /vehicles/delete/{immatriculation}
        Route::get('/vehicles/eddist/{immatriculation}', [CarController::class, 'edit'])->name('cars.edit'); // Changed /cars/edit/{immatriculation} to /vehicles/edit/{immatriculation}
        Route::put('/vehicles/updaqqte/{immatriculation}', [CarController::class, 'update'])->name('cars.update'); // Changed /cars/update/{immatriculation} to /vehicles/update/{immatriculation}
        Route::get('/vehicles/{immatriculation}/carsdetails', [CarController::class, 'carsdetails'])->name('cars.details');
    
    });
  

    
    Route::controller(DriverController::class)->group(function(){

        Route::get('/operator/register', [DriverController::class, 'create'])->name('driver.create'); // Changed /driver/create to /operator/register
        Route::post('/operator/save', [DriverController::class, 'store'])->name('driver.store'); // Changed /driver/store to /operator/save
        Route::get('/admin/operatives', [DriverController::class, 'ourdrivers'])->name('our.drivers'); // Changed /admin/drivers to /admin/operatives
        Route::get('/remove/operatives/{id}', [DriverController::class, 'deletedriver'])->name('delete.driver'); // Changed /delete/drivers/{id} to /remove/operatives/{id}
        Route::get('/modify/{id}/operatives', [DriverController::class, 'editdriver'])->name('edit.driver'); // Changed /edit/drivers/{id} to /modify/operatives/{id}
        Route::put('/modify/update/{id}', [DriverController::class, 'updatedriver'])->name('update.driver'); // Changed /upadte/drivers/{id} to /modify/update/{id}
        Route::get('/operator/leave/{id}', [DriverController::class, 'conducteurconge'])->name('conducteur.conge'); // Changed /conducteur/conge/{id} to /operator/leave/{id}
        Route::post('/operator/addleave/{id}', [DriverController::class, 'addconger'])->name('add.conger'); // Changed /conducteur/addconger/{id} to /operator/addleave/{id}
        Route::get('/operator/driverconger', [DriverController::class, 'driverconger'])->name('driver.conger');
        Route::get('/operator/{id}/Qtr', [DriverController::class, 'Addintoqtr'])->name('driver.qtr');

     
    
    });


    // In routes/web.php
Route::post('/theme/switch', [ThemeController::class, 'switch'])->name('theme.switch');


    Route::controller(AdminController::class)->group(function(){

        Route::get('/admin/register', [AdminController::class, 'addadmin'])->name('add.admin'); // Changed /admin/addadmin to /admin/register
        Route::get('/admin/manage', [AdminController::class, 'Ouradmins'])->name('Our.admins'); // Changed /admin/Ouradmins to /admin/manage
        Route::post('/admin/store', [AdminController::class, 'Saveadmin'])->name('save.admin'); // Changed /admin/saveadmin to /admin/store
        Route::get('/admin/remove/{id}', [AdminController::class, 'Delateadmin'])->name('delate.admin'); // Changed /admin/Delateadmin/{id} to /admin/remove/{id}
        Route::get('/admin/edit/{id}', [AdminController::class, 'Editadmin'])->name('edit.admin'); // Changed /admin/Editadmin/{id} to /admin/edit/{id}
        Route::post('/admin/modify/{id}', [AdminController::class, 'Updateadmin'])->name('Update.admin'); // Changed /admin/Updateadmin/{id} to /admin/modify/{id}
        Route::get('/admin/vehicle', [AdminController::class, 'Addcar'])->name('add.car'); // Changed /admin/addcar to /admin/add-vehicle
        Route::get('/admin/calendar', [AdminController::class, 'caladner'])->name('caladner.add'); // Changed /admin/calander to /admin/calendar
        Route::get('/driver/try', [AdminController::class, 'draiveradd'])->name('add'); // Changed /driver to /driver/add
        Route::get('/admin/task', [AdminController::class, 'Addmission'])->name('add.mission'); // Changed /admin/missi/ to /admin/task
        Route::get('/admin/change-password', [AdminController::class, 'changpassword'])->name('change.password'); // Changed /admin/changpass to /admin/change-password
        Route::post('/admin/profile/update', [AdminController::class, 'updateprofil'])->name('profile.update'); // Kept /admin/profile/update as is
        Route::post('/admin/password/update', [AdminController::class, 'passwordupdate'])->name('password.change'); // Changed /admin/update/password to /admin/password/update
        Route::get('/admin/profile', [AdminController::class, 'Adminprofile'])->name('admin.profile'); // Kept /admin/profile as is
        Route::get('/admin/home', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard'); // Changed /admin/dashboard to  
        Route::get('/agent/home', [Agentcontroller::class, 'AgentDashboard'])->name('agent.dashboard'); // Changed /agent/dashboard to /agent/home
        Route::get('/admin/sign-up', [AdminController::class, 'adminsigne'])->name('signe.admin'); // Changed /admin/signe to /admin/sign-up
        Route::post('/admin/sign-up/create', [AdminController::class, 'usersigne'])->name('user.admin'); 
       
    
    });
    

Route::get('/auth/redirect', function () {  return Socialite::driver('google')->redirect();});
// Route::get('/auth/google' , [googleauth::class,'redirect' ])->name('google_auth');
// Route::get('/auth/google/call-back',[googleauth::class , 'callback']);

Route::controller(MissionsController::class)->group(function() {

    Route::get('/tasks', [MissionsController::class, 'index'])->name('missions.index');
    Route::get('/transport', [MissionsController::class, 'indexTransportation'])->name('missions.index.transportation');
    Route::get('/addnewrecord', [MissionsController::class, 'createTransportation'])->name('missions.create.transportation');
    Route::get('/create/activity', [MissionsController::class, 'createMission'])->name('missions.create.mission');
    Route::get('/create/celebration', [MissionsController::class, 'createEvents'])->name('missions.create.events');

    Route::post('/stores/transport', [MissionsController::class, 'storeTransportation'])->name('missions.store.transportation');
    Route::post('/storesr/activity', [MissionsController::class, 'storeMission'])->name('missions.store.mission');
    Route::post('/store/celebration', [MissionsController::class, 'storeEvents'])->name('missions.store.events');

    Route::put('/update/mission/{id}', [MissionsController::class, 'updateMission'])->name('missions.update');
    Route::get('/edit/mission/{id}', [MissionsController::class, 'editMission'])->name('missions.edit');
    Route::put('/update/transportation/{id}', [MissionsController::class, 'updateTransportation'])->name('transportation.update');
    Route::get('/edit/transportation/{id}', [MissionsController::class, 'editTransportation'])->name('transportation.edit');



    Route::delete('/delete/{id}', [MissionsController::class, 'destroy'])->name('missions.destroy');
});


Route::controller(DashboardController::class)->group(function(){
    Route::get('/update/section',[DashboardController::class,'updatesection'])->name('update.section');
    Route::put('/departments/section/{id}', [DashboardController::class, 'update'])->name('departments.update');


});


Route::controller(EventController::class)->group(function()  {


    Route::get('/events', [EventController::class, 'indexx'])->name('events.index');
    Route::get('/edit/{id}/events', [EventController::class, 'edit'])->name('events.edit');
    Route::get('/events/Delete/{id}', [EventController::class, 'destroy'])->name('events.Delete');
    Route::get('/show/{id}/events', [EventController::class, 'show'])->name('events.details');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::put('/events/update/{id}', [EventController::class, 'update'])->name('events.update');
    });
    
    Route::controller(FaQController::class)->group(function() {

        Route::get('/admin/faq', [FaQController::class, 'faq'])->name('admin.faq');
        Route::get('/add/faq', [FaQController::class, 'addFaq'])->name('add.Faq');
        Route::post('/save/faq', [FaQController::class, 'savefaq'])->name('save.faq');
    });
    



    Route::controller(roleController::class)->group(function() {

        Route::get('/all/permission', [roleController::class, 'allPermission'])->name('all.permission');
        Route::get('/add/permission', [roleController::class, 'addpermission'])->name('add.permission');
        Route::post('/permission/store', [roleController::class, 'storepermission'])->name('store.permission');
        Route::get('ad/change/permission/{id}/', [roleController::class, 'editpermission'])->name('edit.permission');
        Route::post('/permission/update', [roleController::class, 'updatepermission'])->name('update.permission');
        Route::get('/permission/delate/{id}/', [roleController::class, 'delatepermission'])->name('delate.permission');
    
    });
    

    
    Route::controller(MaintenanceController::class)->group(function() {

        Route::get('/vehicle/add-maintenance/{immatriculation}', [MaintenanceController::class, 'addCarmantenance'])->name('addCar.mantenance'); // Updated to /vehicle/add-maintenance/{immatriculation}
        Route::post('/maintenance/record', [MaintenanceController::class, 'store'])->name('maintenance.store'); // Updated to /maintenance/record
        Route::get('/details/for', [MaintenanceController::class, 'Datainmaintenance'])->name('Datain.maintenance'); // Updated to /details/maintenance
        Route::get('/maintenance/report/{id}', [MaintenanceController::class, 'print'])->name('maintenance.print'); // Updated to /maintenance/report/{id}
        Route::get('/maintenance/{id}/finalize', [MaintenanceController::class, 'complete'])->name('complete.maintenance'); // Updated to /maintenance/{id}/finalize
        Route::get('/maintenance/archive', [MaintenanceController::class, 'maintenancearchive'])->name('maintenance.archive'); // Updated to /archive/maintenance
    
        Route::get('/manages/{id}*', [MaintenanceController::class, 'maintenacegestion'])->name('maintenace.gestion'); // Updated to /maintenance/manage/{id}
        Route::get('/internal/end', [MaintenanceController::class, 'Manintern'])->name('man.intern'); // Updated to /staff/internal
        Route::post('/maintenance/add-stock', [MaintenanceController::class, 'addStockToMaintenance'])->name('maintenance.addStock');
        Route::get('/maintenance/nosintern', [MaintenanceController::class, 'nosintern'])->name('nos.intern');

       

    
    });
    

 

Route::controller(StockController::class)->group(function() {

    Route::get('/inventorya/add/stoers', [StockController::class, 'addstock'])->name('add.stock'); // Changed /addCar/add/stock to /inventory/add/stock
    Route::post('/inventoryza/save', [StockController::class, 'store'])->name('stocks.store'); // Changed /store/store to /inventory/save
    Route::get('/inventoryr/list', [StockController::class, 'allstock'])->name('all.stock'); // Changed /all/stock to /inventory/list
    Route::get('/inventorys/remove/{id}', [StockController::class, 'delete'])->name('delete.stock'); // Changed /stock/delete/{id} to /inventory/remove/{id}
    Route::get('/inventorye/new', [StockController::class, 'impoststock'])->name('impost.stock'); // Changed /impost/stock to /inventory/initialize
    Route::get('/inventoryr/down', [StockController::class, 'export'])->name('export'); // Changed /stock/export to /inventory/download
    // web.php
Route::get('/export-stock', [StockController::class, 'exportExcel'])->name('export.stock');
Route::get('/import-stock', [StockController::class, 'showImportForm'])->name('import.stock');
Route::post('/import-stock', [StockController::class, 'importExcel']);


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
    Route::get('admin/role/editing/{id}*/*', [roleController::class, 'admineditrole'])->name('admin.edit.role');
    Route::post('admin/role/update/{id}*//*', [roleController::class, 'adminroleupdate'])->name('admin.role.update');
    Route::get('admin/role/delete/{id}**', [roleController::class, 'admindeleterole'])->name('admin.delete.role');
});




// Route::get('/chate', 'App\Http\Controllers\PusherController@index');
Route::post('/broadcast', 'App\Http\Controllers\PusherController@broadcast');
Route::post('/receive', 'App\Http\Controllers\PusherController@receive');

Route::post('/send-message', [PusherController::class, 'sendMessage']);
Route::post('/send-file', [PusherController::class, 'sendFile']);



Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/admin/chat', [ConversationController::class, 'index'])->name('chate.app');
Route::get('/conversations/{conversation}/details', [ConversationController::class, 'getConversationDetails'])->name('conversations.details');
Route::post('/conversations', [ConversationController::class, 'createConversation'])->name('conversations.create');
Route::get('/conversations/{conversation}/messages', [MessageController::class, 'getMessages'])->name('conversations.messages');
Route::post('/conversations/{conversation}/send-message', [MessageController::class, 'sendMessage'])->name('messages.send');
Route::post('/conversations/{conversation}/send-file', [MessageController::class, 'sendFile'])->name('files.send');


Route::get('/admin/contacts', [ConversationController::class, 'contacts'])->name('contacts');


// Route for conversation page
Route::get('/conversation/{id}', [ConversationController::class, 'show'])->name('conversation.show');

Route::get('/logs', [LogsController::class, 'index'])->name('logs.index');

});
