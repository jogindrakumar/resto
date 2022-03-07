<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\SpecialDishController;
use App\Http\Controllers\Backend\MenuCategoryController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\SpecialRecipeController;
use App\Http\Controllers\Backend\TestimoniController;
use App\Http\Controllers\Backend\TeamController;
use App\Models\Admin;
use App\Models\About;
use App\Models\Team;
use App\Models\MenuCategory;
use App\Models\Menu;
use App\Models\SpecialDish;
use App\Models\SpecialRecipe;
use App\Models\Testimoni;

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


// All Menu Category  Routes

 Route::prefix('menucategory')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[MenuCategoryController::class,'MenuCategoryView'])->name('all.menucategory');
Route::post('/store',[MenuCategoryController ::class,'MenuCategoryStore'])->name('menucategory.store');
Route::get('/edit/{id}',[MenuCategoryController::class,'MenuCategoryEdit'])->name('menucategory.edit');
Route::post('/update/{id}',[MenuCategoryController ::class,'MenuCategoryUpdate'])->name('menucategory.update');
Route::get('/delete/{id}',[MenuCategoryController ::class,'MenuCategoryDelete'])->name('menucategory.delete');

 });

 // All Menu Routes
Route::prefix('menu')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[MenuController::class,'MenuView'])->name('all.menu');
Route::post('/store',[MenuController ::class,'MenuStore'])->name('menu.store');
Route::get('/edit/{id}',[MenuController::class,'MenuEdit'])->name('menu.edit');
Route::post('/update/{id}',[MenuController ::class,'MenuUpdate'])->name('menu.update');
Route::get('/delete/{id}',[MenuController ::class,'MenuDelete'])->name('menu.delete');

 });
  // All Special Recipes
Route::prefix('specialrecipe')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[SpecialRecipeController::class,'SpecialRecipeView'])->name('all.specialrecipe');
Route::post('/store',[SpecialRecipeController ::class,'SpecialRecipeStore'])->name('specialrecipe.store');
Route::get('/edit/{id}',[SpecialRecipeController::class,'SpecialRecipeEdit'])->name('specialrecipe.edit');
Route::post('/update/{id}',[SpecialRecipeController ::class,'SpecialRecipeUpdate'])->name('specialrecipe.update');
Route::get('/delete/{id}',[SpecialRecipeController ::class,'SpecialRecipeDelete'])->name('specialrecipe.delete');

 });
  // All About 
Route::prefix('about')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[AboutController::class,'AboutView'])->name('all.about');
Route::post('/store',[AboutController ::class,'AboutStore'])->name('about.store');
Route::get('/edit/{id}',[AboutController::class,'AboutEdit'])->name('about.edit');
Route::post('/update/{id}',[AboutController ::class,'AboutUpdate'])->name('about.update');
Route::get('/delete/{id}',[AboutController ::class,'AboutDelete'])->name('about.delete');

 });
 // All TEAM
Route::prefix('team')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[TeamController::class,'TeamView'])->name('all.team');
Route::post('/store',[TeamController ::class,'TeamStore'])->name('team.store');
Route::get('/edit/{id}',[TeamController::class,'TeamEdit'])->name('team.edit');
Route::post('/update/{id}',[TeamController ::class,'TeamUpdate'])->name('team.update');
Route::get('/delete/{id}',[TeamController ::class,'TeamDelete'])->name('team.delete');

 });

  // All Testimonial 
Route::prefix('testimonial')->middleware(['auth:admin'])->group(function(){
Route::get('/view',[TestimoniController::class,'TestimoniView'])->name('all.testimoni');
Route::post('/store',[TestimoniController ::class,'TestimoniStore'])->name('testimoni.store');
Route::get('/edit/{id}',[TestimoniController::class,'TestimoniEdit'])->name('testimoni.edit');
Route::post('/update/{id}',[TestimoniController ::class,'TestimoniUpdate'])->name('testimoni.update');
Route::get('/delete/{id}',[TestimoniController::class,'TestimoniDelete'])->name('testimoni.delete');

 });

 
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
