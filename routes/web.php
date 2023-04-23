<?php

use App\Http\Controllers\Admin\CampController as AdminCampController;
use App\Http\Controllers\Admin\CampSessionController;
use App\Http\Controllers\Admin\CampSessionSlotController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
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

Route::middleware(["auth"])->group(function () {

    Route::get('camps/{id}/{slug}', [CampController::class, 'show'])->name('camp.show');

    Route::post("carts/add", [CartController::class, "add"])->name("carts.add");
    Route::post("carts/remove", [CartController::class, "remove"])->name("carts.remove");
    Route::get("carts", [CartController::class, "index"])->name("carts.index");


    Route::post("payments/store", [PaymentController::class, "store"])->name("payments.store");

    Route::get("profile", [ProfileController::class, "index"])->name("profile.index");

    Route::get("profile/order/{id}/details", [ProfileController::class, "orderDetails"])->name("profile.orderDetails");




    Route::middleware(["role:admin"])->prefix("admin")->name("admin.")->group(function () {

        Route::get("/", [DashboardController::class, "index"])->name("index");


        Route::resource("users", UserController::class);
        Route::get("camps/{id}/sessions", [AdminCampController::class, "sessions"])->name("camps.sessions");
        Route::resource("camps", AdminCampController::class);
        Route::get("sessions/{id}/slots", [CampSessionController::class, "slots"])->name("sessions.slots");
        Route::resource("sessions", CampSessionController::class);

        Route::post("slots/sessions", [CampSessionSlotController::class, "getCampSessions"])->name("slots.camp.sessions");
        Route::resource("slots", CampSessionSlotController::class);

        Route::resource("orders",OrderController::class);
    });
});
