<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DetectionController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\RouteController;
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
 
Route::get('/', [RouteController::class, 'Main']);
Route::get('/search/{type}', [RouteController::class, 'searchType']);
Route::get('/search_photo', [RouteController::class, 'searchPhoto']);
Route::get('/signin', [RouteController::class, 'login']);
Route::get('/viewresult/{tag_number}', [RouteController::class, 'viewResult']);

Route::post('login', [AuthenticationController::class, 'login']);
Route::get('/error-403', [RouteController::class, 'error403']);

//for general routes authenticated
Route::group(['middleware' => 'isUser'], function () { 
    Route::get('/admin/dashboard', [RouteController::class, 'Home']);
    Route::get('logout', [AuthenticationController::class, 'logout']);
    Route::get('/settings', [RouteController::class, 'settings']);
    Route::post('/savepassword', [AuthenticationController::class, 'resetPassword']);
});

//for admin routes
Route::group(['middleware' => 'isAdmin'], function () {
});


Route::group(['prefix' => 'admin'], function () {  
    //for super admin routes
    Route::group(['middleware' => 'isSuperAdmin'], function () {
        Route::get('/user', [RouteController::class, 'superAddUser']);
        Route::get('/edit-user', [RouteController::class, 'superEditUser']);
        Route::get('/offence-category', [RouteController::class, 'superOffenceCategory']);
    });
    Route::group(['middleware' => 'isUser'], function () { 
        Route::get('/view-offence-category', [RouteController::class, 'superEditOffenceCategory']);
        Route::get('/view-user', [RouteController::class, 'superViewUser']);
    });

    Route::get('/add-criminal-profile', [RouteController::class, 'AdminCriminalProfile']);
    Route::get('/view-criminal-profile', [RouteController::class, 'AdminViewCriminalProfile']);
        
 
});



//for super admin routes
Route::group(['middleware' => 'isSuperAdmin'], function () {
    Route::post('/saveuser', [AuthenticationController::class, 'newuser']);
    Route::get('/deleteuser/{id}', [AuthenticationController::class, 'removeUser']); 
    Route::post('/saveoffencetype', [GeneralController::class, 'saveoffencetype']);
    Route::get('/deleteoffencecategory/{id}', [GeneralController::class, 'removeOffenceCategory']);
    Route::get('/deletecriminalprofile/{id}', [DetectionController::class, 'removeProfile']);
    
});
 
Route::post('/savecriminal', [DetectionController::class, 'savecriminal']);
Route::post('/searchbyPhone', [DetectionController::class, 'searchbyPhone']);
Route::post('/searchbyName', [DetectionController::class, 'searchbyName']);
Route::post('/searchbyPhoto', [DetectionController::class, 'searchbyPhoto']);
