<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\HumanResourceController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('login');
})->middleware('guest');

Route::get('/login',[AuthController::class,'index'])->name('index');
Route::post('/login',[AuthController::class,'login'])->name('login');


//logged in
Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::get('/ViewLeads',[LeadController::class,'ViewLeads'])->name('ViewLeads');
    Route::post('/addNewLead',[LeadController::class,'addNewLead'])->name('addNewLead');
    Route::post('/updateLead/{$lead}',[LeadController::class,'updateLead'])->name('updateLead');
    Route::post('/deleteLead/{$lead}',[LeadController::class,'deleteLead'])->name('deleteLead');

    Route::get('/ViewUser',[UserController::class,'ViewUser'])->name('ViewUser');
    Route::get('/deleteUser/{user}',[UserController::class,'deleteUser'])->name('deleteUser');
    Route::post('/AddNewUser',[UserController::class,'AddNewUser'])->name('AddNewUser');
    Route::post('/EditUser/{user}',[UserController::class,'EditUser'])->name('EditUser');

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

    Route::post('/addNewProject',[ProjectController::class,'addNewProject'])->name('addNewProject');

    Route::post('/addNewDeveloper',[DeveloperController::class,'addNewDeveloper'])->name('addNewDeveloper');

    Route::get('/properties',[PropertiesController::class,'properties'])->name('properties');
    Route::get('/addNewProperty',[PropertiesController::class,'addNewProperty'])->name('addNewProperty');
    Route::get('/viewHumanResource',[HumanResourceController::class,'viewHumanResource'])->name('viewHumanResource');
});



