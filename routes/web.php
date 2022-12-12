<?php
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Admin;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\WelcomeController as FrontendWelcomeController;






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
Route::get('/',[FrontendWelcomeController::class,'index']);
Route::middleware(['auth'])->group(function(){
  
  Route::get('/categories',[FrontendCategoryController::class,'index'])->name('categories.index');
  Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
  Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
  Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
  Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
  Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
  Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
  Route::post('/reservation/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
  Route::get('/thankyou', [FrontendWelcomeController::class, 'thankyou'])->name('thankyou');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
   
  });
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){
  Route::get('/',[App\Http\Controllers\AdminController::class,'index'])->name('index'); 
  Route::resource('/categories',App\Http\Controllers\Admin\CategoryController::class,['index']);
  Route::resource('/menus',App\Http\Controllers\Admin\MenuController::class);
  Route::resource('/tables',App\Http\Controllers\Admin\TableController::class);
  Route::resource('/reservation',App\Http\Controllers\Admin\ReservationController::class);
 
});

require __DIR__.'/auth.php';
