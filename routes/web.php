<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\PDF\TestPDF;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function () {
//     return response('<h1>Hello World</h1>');
// });

// Route::get('/posts/{id}', function ($id) {
//     dd($id);
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     return $request->name . ' ' .$request->city;
// });

//All Listings
Route::get('/',[ListingController::class, 'index']);

//All Listings
// Route::get('/listings', function () {
//     return view('listings', [
//         'heading' => 'latest Listings',
//         'listings' => Listing::all()
//     ]);
// });


//Show Create Form
Route::get('/listings/create',[ListingController::class, 'create'])->middleware(('auth'));

//Store Listing Data
Route::post('/listings',[ListingController::class, 'store'])->middleware(('auth'));

//Show Edit Form
Route::get('/listings/{listing}/edit',[ListingController::class, 'edit'])->middleware(('auth'));

//Update Listing
Route::put('/listings/{listing}',[ListingController::class, 'update'])->middleware(('auth'));

//Delete Listing
Route::delete('/listings/{listing}',[ListingController::class, 'destroy'])->middleware(('auth'));

//Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single Listing
Route::get('/listings/{listing}',[ListingController::class, 'show']);

//Show Register/Create Form
Route::get('/register',[UserController::class, 'create'])->middleware('guest');

//Create New User
Route::post('/users',[UserController::class, 'store'])->name('user.store');

//Log User Out
Route::post('/logout',[UserController::class, 'logout'])->name('user.logout')->middleware(('auth'));

//Show Login Form
Route::get('/login',[UserController::class, 'login'])->name('login')->middleware('guest');

//Log In User
Route::post('/users/authenticate',[UserController::class, 'authenticate']);

// Route::get('/pdf',[TestPDF::class,'generate']);
