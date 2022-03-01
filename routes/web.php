<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\SpecialDishController;
use App\Http\Controllers\Backend\MenuCategoryController;
use App\Models\Admin;
use App\Models\MenuCategory;
use App\Models\SpecialDish;

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

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//admin route
Route::group(['prefix' => 'admin', 'middleware'=>['admin:admin']],function(){

    Route::get('/login',[AdminController::class,'loginForm']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');

   

});

 //Admin All routes
Route::middleware(['auth:admin'])->group(function () {
 Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
 Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
 Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
 Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
 Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
 Route::post('/admin/update/password',[AdminProfileController::class,'AdminUpdatePassword'])->name('update.change.password');
  });

Route::prefix('specialdish')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[SpecialDishController ::class,'SpecialDishView'])->name('all.specialdish');
Route::get('/add',[SpecialDishController ::class,'SpecialDishAdd'])->name('add.specialdish');
Route::post('/store',[SpecialDishController ::class,'SpecialDishStore'])->name('specialdish.store');
Route::get('/edit/{id}',[SpecialDishController::class,'SpecialDishEdit'])->name('specialdish.edit');
Route::post('/update/{id}',[SpecialDishController ::class,'SpecialDishUpdate'])->name('specialdish.update');
Route::get('/delete/{id}',[SpecialDishController ::class,'SpecialDishDelete'])->name('specialdish.delete');

 });
 Route::prefix('menucategory')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[MenuCategoryController::class,'MenuCategoryView'])->name('all.menucategory');

Route::post('/store',[MenuCategoryController ::class,'MenuCategoryStore'])->name('menucategory.store');
Route::get('/edit/{id}',[MenuCategoryController::class,'MenuCategoryEdit'])->name('menucategory.edit');
Route::post('/update/{id}',[MenuCategoryController ::class,'MenuCategoryUpdate'])->name('menucategory.update');
Route::get('/delete/{id}',[MenuCategoryController ::class,'MenuCategoryDelete'])->name('menucategory.delete');

 });

 
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
