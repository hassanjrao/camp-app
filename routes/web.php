<?php

use App\Http\Controllers\CampController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('camps', [CampController::class, 'index'])->name('camp.index');

Route::get("profile", [ProfileController::class, "index"])->name("index");


Route::middleware(["auth"])->group(function () {

    Route::get('camps/{id}/{slug}', [CampController::class, 'show'])->name('camp.show');

    Route::post("carts/add", [CartController::class, "add"])->name("carts.add");
    Route::post("carts/remove", [CartController::class, "remove"])->name("carts.remove");
    Route::get("carts", [CartController::class, "index"])->name("carts.index");


    Route::post("payments/store", [PaymentController::class, "store"])->name("payments.store");


    Route::prefix("admin")->name("admin.")->group(function () {

        Route::get("/", function () {
            return view("admin.dashboard");
        })->name("index");


        Route::resource("users", UserController::class);
    });
});
