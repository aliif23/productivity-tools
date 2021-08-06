<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[DashboardController::class,'dashboard']);

Route::get('task/donehome/{id}',[TaskController::class,'donestatushome']);

// Staff 

    Route::get('/staff/index',[StaffController::class,'index']);

    // StaffCreate

    Route::get('/staff/createstaff', function () {
        return view('project.create.staff');
    });

    Route::post('/staff/createstaff/newstaff', [StaffController::class,'create']);

    // StaffCreateEnd

    // StaffDetails

    Route::get('/staff/details/{id}',[StaffController::class, 'showdetails']);

    // StaffDetailsEnd

    // StaffEdit

    Route::get('/staff/edit/{id}',[StaffController::class,'show']);

    Route::post('/staff/editstaff/{id}', [StaffController::class,'edit']);


    // StaffEditEnd

    // StaffEnd

    // StaffDelete

    Route::get('/staff/delete/{id}',[StaffController::class,'destroy']);

    // StaffDeleteEnd

// Staff End

// Project

    Route::get('/project/index',[ProjectController::class,'index']);

    // ProjectCreate

    Route::get('/project/createproject',[ProjectController::class,'create']);

    Route::post('/staff/createproject/newproject', [ProjectController::class,'createproject']);

    // ProjectCreateEnd

    // ProjectEdit

    Route::get('/project/edit/{id}',[ProjectController::class,'edit']);

    Route::post('/project/editproject/{id}',[ProjectController::class,'editproject']);

    // ProjectEditEnd

    // ProjectDetails

    Route::get('project/details/{id}',[ProjectController::class,'projectdetails']);    

    // ProjectDetailsEnd

    // ProjectDelete

    Route::get('/project/delete/{id}',[ProjectController::class,'destroy']);

    // ProjectDeleteEnd

    // ProjectLogPost

    Route::post('/project/postlog/',[ProjectController::class,'newlog']);

    // ProkecttLogEnd

    // ProjectDone

    Route::get('/project/status/done/{id}',[ProjectController::class,'done']);

    // ProjectDoneEnd

// ProjectEnd

// Expense

    // Index

    Route::get('/expense/index',[ExpenseController::class,'index']);

    // IndexEnd

    // Details

    Route::get('/expense/details/{id}',[ExpenseController::class,'show']);

    // DetailsEnd

    // Create

    Route::get('/expense/create',[ExpenseController::class,'create']);

    Route::post('/expense/createexpense',[ExpenseController::class,'post']);

    // CreateEnd

    // Edit
        
    Route::get('/expense/edit/{id}',[ExpenseController::class,'edit']);
    
    Route::post('/expense/editexpense/{id}',[ExpenseController::class,'editpost']);    

    // EditEnd

    // Delete

    Route::get('/expense/delete/{id}',[ExpenseController::class,'destroy']);

    // DeleteEnd

// ExpenseEnd

// IncomeStart

    // Index

    Route::get('/income/index',[IncomeController::class,'index']);

    // IndexEnd

    // Create

    Route::get('/income/create',[IncomeController::class,'create']);

    Route::post('/income/createincome',[IncomeController::class,'createpost']);

    // CreateEnd

    // Details

    Route::get('/income/details/{id}',[IncomeController::class,'show']);

    // DetailsEnd

    // Edit

    Route::get('/income/edit/{id}',[IncomeController::class,'edit']);

    Route::post('income/editincome/{id}',[IncomeController::class,'editpost']);
    

    // EditEnd

    // Delete

    Route::get('/income/delete/{id}',[IncomeController::class,'destroy']);

    // DeleteEnd


// IncomeEnd

// Task

    // Index

    Route::get('/task/index',[TaskController::class,'index']);

    // Index End
    
    // Create

    Route::get('task/create',[TaskController::class,'create']);

    Route::post('task/createtask',[TaskController::class,'createtask']);

    // CreateEnd

    // Details

    Route::get('task/details/{id}',[TaskController::class,'show']);

    Route::post('task/details/addlog/',[TaskController::class,'newlog']);

    Route::get('task/details/done/{id}',[TaskController::class,'donestatus']);

    // DetailsEnd

    // Edit

    Route::get('task/edit/{id}',[TaskController::class,'edit']);

    Route::post('task/edittask/{id}',[TaskController::class,'edittask']);

    // EditEnd

    // Delete

    Route::get('/task/delete/{id}',[TaskController::class,'destroy']);

    // DeleteEnd

// EndTask



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
