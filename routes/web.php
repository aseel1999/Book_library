<?php

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

 Route::get('/', function () {
   return view('welcome');
 });
 //Route::get('/home', function () {
  //  return view('home');
  //});
// Route::get("/book",[BookController::class,'index']);
// Route::get("/book/create",[BookController::class,'create']);
// Route::get("/book/{id}/show",[BookController::class,'show']);
// Route::post("/book",[BookController::class,'store']);
// Route::put("/book/{id}",[BookController::class,'update']);
// Route::delete("/book/{id}",[BookController::class,'destroy']);
// لعرض العناصر المحذوفة
Route::group(['middleware' => ['auth']] , function() {
Route::get('/book/trash','BookController@tarsh')->name('book.trash');
Route::put('/book/trash/{id?}','BookController@restore')->name('book.restore');
Route::delete('/book/trash/{id?}','BookController@forceDelete')->name('book.force-delete');
Route::resource("book",BookController::class);
Route::resource("publisher",PublisherController::class);
Route::resource("user",UserController::class);
Route::resource("issue",IssueController::class);
Route::resource("log",LogController::class);
Route::resource("category",CategoryController::class);
Route::get('/book/search','BookController@search')->name('search');
Route::get('/home','HomeController@index')->name('home');

});
Auth::routes();
