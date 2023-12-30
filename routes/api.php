<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ForgetController;
use App\Http\Controllers\User\ResetController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// user login api start

// login auth
Route::post('/login',[AuthController::class,'Login']);
// register routes

Route::post('/register',[AuthController::class,'Register']);

// forget password routes
Route::post('/forgetpassword',[ForgetController::class,'ForgetPassword']);

// Reset password routes
Route::post('/resetpassword',[ResetController::class,'ResetPassword']);




// user login api end

Route::get('/getvisitor',[VisitorController::class,'GetVisitorDetails']);
// contact base route
Route::post('/postcontact',[ContactController::class,'postContactDetails']);

Route::get('/allsiteinfo',[SiteInfoController::class,'AllSiteInfo']);

Route::get('/allcategory', [CategoryController::class, 'AllCategory']);

Route::get('/productlistbyremark/{remark}',[ProductListController::class, 'ProductListByRemark']);

Route::get('/productlistbycategory/{category}',[ProductListController::class, 'ProductListByCategory']);

Route::get('/productlistbysubcategory/{category}/{subcategory}',[ProductListController::class, 'ProductListBySubcategory']);
// notification
Route::get('/notification',[NotificationController::class,'NotificationHistory']);

// search route
Route::get('/search/{key}', [ProductListController::class, 'ProductBySearch']);