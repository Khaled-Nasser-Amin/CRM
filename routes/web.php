<?php

use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
})->middleware('guest');

Route::get('/login',[AuthController::class,'index'])->name('index');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/ForgetPassword',[AuthController::class,'viewForget'])->name('viewForget');
Route::post('/ForgetPassword',[AuthController::class,'sendEmailToResetPassword'])->name('sendEmail');
Route::get('/reset-password/{_token}',[AuthController::class,'viewResetPassword'])->name('viewResetPassword');
Route::post('/reset-password',[AuthController::class,'changePassword'])->name('changePassword');


//logged in
Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/calculator', function () {
        return view('admin.calculator');
    })->name('viewCalculator');
    Route::get('/ViewLeads',[LeadController::class,'ViewLeads'])->name('ViewLeads');
    Route::post('/addNewLead',[LeadController::class,'addNewLead'])->name('addNewLead');
    Route::post('/updateLead/{lead}',[LeadController::class,'updateLead'])->name('updateLead');
    Route::post('/deleteLead/{lead}',[LeadController::class,'deleteLead'])->name('deleteLead');
    Route::post('/lastConnection/{lead}',[LeadController::class,'lastConnection'])->name('lastConnection');

    Route::get('/ViewUser',[UserController::class,'ViewUser'])->name('ViewUser');
    Route::get('/deleteUser/{user}',[UserController::class,'deleteUser'])->name('deleteUser');
    Route::post('/AddNewUser',[UserController::class,'AddNewUser'])->name('AddNewUser');
    Route::post('/EditUser/{user}',[UserController::class,'EditUser'])->name('EditUser');

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');


    Route::get('/properties',[PropertiesController::class,'properties'])->name('properties');
    Route::get('/addNewProperty',[PropertiesController::class,'addNewProperty'])->name('addNewProperty');
    Route::post('/addNewProperty/{user}',[PropertiesController::class,'store'])->name('store');
    Route::get('/showProperty/{property}',[PropertiesController::class,'showProperty'])->name('showProperty');
    Route::get('/editProperty/{property}',[PropertiesController::class,'editProperty'])->name('editProperty');
    Route::post('/updateProperty/{property}',[PropertiesController::class,'updateProperty'])->name('updateProperty');
    Route::get('/deleteProperty/{property}',[PropertiesController::class,'deleteProperty'])->name('deleteProperty');

    Route::get('/viewHumanResource',[EmployeeController::class,'viewHumanResource'])->name('viewHumanResource');
    Route::post('/addNewEmployee',[EmployeeController::class,'addNewEmployee'])->name('addNewEmployee');
    Route::post('/updateEmployee/{employee}',[EmployeeController::class,'updateEmployee'])->name('updateEmployee');
    Route::get('/deleteEmployee/{employee}',[EmployeeController::class,'deleteEmployee'])->name('deleteEmployee');
    Route::get('/downloadDocumentation/{employee}',[EmployeeController::class,'downloadDocumentation'])->name('downloadDocumentation');


    Route::get('/full-calender', [FullCalenderController::class, 'index'])->name('calendar');
    Route::post('/full-calender/action', [FullCalenderController::class, 'action']);

    Route::get('events','CalenderController@index')->name('calender');
    Route::resource('Invoices','InvoiceController')->except(['show','edit','create']);
    Route::get('Tickets','TicketController@index')->name('tickets');
    Route::post('Tickets','TicketController@store')->name('tickets.store');

    Route::get('/showProject/{project}',[ProjectController::class,'showProject'])->name('showProject');
    Route::resource('/projects','ProjectController');


    Route::resource('/developers','DeveloperController')->except(['index','show','edit']);
    Route::resource('/amenities','AmenitiesController')->except(['index','show','edit']);

    //start chat routes
    Route::name('chat.')->group(function(){
        Route::get('Chat','MessageController@index')->name('index');
        Route::get('Chat/{message}','MessageController@downloadDocumentation')->name('downloadDocumentation');
        Route::post('Chat/store','MessageController@storeText')->name('storeText');
        Route::post('Chat','MessageController@storeFile')->name('storeFile');
        Route::post('Chat/readMessages/{id}','MessageController@readMessages')->name('readMessages');
        Route::post('Chat/getUnReadMessages/{id}','MessageController@getUnReadMessages')->name('getUnReadMessages');
        Route::post('Chat/getAllUnreadMessages','MessageController@getAllUnreadMessages')->name('getAllUnreadMessages');
        Route::post('Chat/clearChat/{userId}','MessageController@deleteMessages')->name('deleteMessages');
    });
    Route::name('notification.')->group(function(){
        Route::post('NumberOfNotifications','NotificationsController@NumberOfUnreadNotifications')->name('NumberOfUnreadNotifications');
        Route::get('Notifications/Clear','NotificationsController@DeleteNotifications')->name('DeleteNotifications');
        Route::post('markAllAsRead','NotificationsController@markAllAsRead')->name('markAllAsRead');
    });



});



