<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
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
// route of to call resource controller
Route::resource('/',StudentController::class);
 Route::get('/', function() {
      return view('welcome'); 
});
//route of to call simple controller
//securing the routes for admin
Route::group(['middleware'=>'auth'],function(){
Route::get('/index', [StudentController::class, 'showstudent']);
Route::match(['get','post'],'/add', [StudentController::class, 'addstudent']);
Route::match(['get','post'],'/edit/{id}', [StudentController::class, 'editstudent']);
Route::match(['get','post'],'/delete/{id}', [StudentController::class, 'deletestudent']);
});
//Route::get('/services','UserController@index');

//Route::get('/',[DataController::class,'info']);

//Route::post('/show',[DataController::class,'result']);


// Route::get('/services',[PagesController::class, 'index']);

// Route::get('/form', function() {
//     return view('form'); 
// });
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
