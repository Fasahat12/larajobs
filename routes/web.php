<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Manage Listings
Route::get('/listings/manage',[ListingController::class,'manage'])->middleware('auth');

// Show Create Form
Route::get('/listings/create',[ListingController::class, 'create'])->middleware('auth');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}',[ListingController::class,'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}',[ListingController::class,'destroy'])->middleware('auth');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register',[UserController::class,'create'])->middleware('guest');

// Create New User
Route::post('/users',[UserController::class,'store']);

// Log User out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');

// Show Login Form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate',[UserController::class,'authenticate'])->middleware('guest');

// Route::get('/hello',function(){
//   return response('<h1>Hello World</h1>',200)
//          ->header('Content-Type','text/plain')
//          ->header('foo','bar');
// });

// Route::get('/posts/{id}',function($id){
//   // dd($id);
//   return response('Post '.$id);
// })->where('id','[0-9]+');

// Route::get('/search',function(Request $request){
//     return response($request->name.' '.$request->city);
// });
