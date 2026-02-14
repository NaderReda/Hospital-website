<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;



Route::get('/', [UserController::class,'Index'])->name('index');
Route::get('/alldoctors',[UserController::class,'allDoctors' ])->middleware(['auth','verified'])->name('alldoctors');
Route::post('/appointment',[UserController::class,'MakeAnAppointment' ])->middleware(['auth','verified'])->name('appointment');
Route::get('/aboutus',[UserController::class, 'AboutUs'])->middleware(['auth','verified'])->name('aboutus');
Route::post('/contact-send',[UserController::class, 'sendcontact'])->middleware(['auth','verified'])->name('contact.send');
Route::get('/myappointments',[UserController::class, 'Myappointments'])->middleware(['auth','verified'])->name('myappointments');
Route::post('/cancelappoint/{id}',[UserController::class, 'Cancelappoint'])->middleware(['auth','verified'])->name('cancelappoint');

Route::get('/dashboard',[UserController::class,'dashboard'])
->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/contact',[UserController::class, 'Contact'])->middleware(['auth'])->name('contact');


Route::middleware('auth','admin')->group(function () {
    Route::get('/add_doctors',[AdminController::class, 'addDoctors'])->name('add_doctors');
    Route::post('/add_doctors',[AdminController::class, 'postAddDoctors'])->name('post_add_doctors');
    Route::get('/view_doctors',[AdminController::class, 'viewDoctors'])->name('view_doctors');
    Route::get('/delete_doctor/{id}',[AdminController::class, 'deleteDoctor'])->name('delete_doctor');
    Route::get('/update_doctor/{id}',[AdminController::class, 'updateDoctor'])->name('update_doctor');
    Route::post('/post_update_doctor/{id}',[AdminController::class,'postUpdateDoctor'])->name('post_update_doctors');
    Route::get('/view_appointment',[AdminController::class, 'viewAppointment'])->name('view_appointment');
    Route::post('/changestatus/{id}',[AdminController::class, 'changeStatus'])->name('changestatus');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
