<?php

use Illuminate\Support\Facades\Route;

// USED CONTROLLER
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SubBrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\ScheduleVisitController;

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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('cek_login', [AuthController::class, 'login_validate'])->name('cek_login');

// Route::get('/', function () {
//     return view('home');
// })->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function(){
    // Route::get('/', function () {
    //     return view('home');
    // })->name('home');
    
    // VIEWING AND RESOURCES
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('branch', BranchController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('subbrand', SubBrandController::class);
    Route::resource('product', ProductController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('outlet', OutletController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('displays', DisplayController::class);
    Route::resource('category', CategoryProductController::class);
    Route::resource('schedule', ScheduleVisitController::class);
    // Route::get('detailSchedule/{$schedulevisit}', [ScheduleVisitController::class, 'createDetail'])->name('detailSchedule.create');
    Route::get('call', [VisitController::class, 'index'])->name('call');
    Route::get('call/{date}/{staff}', [VisitController::class, 'show'])->name('call.show');
    Route::get('visit/{id}', [VisitController::class, 'create'])->name('visit.act');
    Route::get('log', [LogActivityController::class, 'index'])->name('log.index');
    Route::get('visit.listCustomer', [VisitController::class, 'scheduledCustomer'])->name('visit.listCustomer');
    Route::get('visit.listOutlet', [VisitController::class, 'scheduledOutlet'])->name('visit.listOutlet');
    Route::get('visit.detail', [VisitController::class, 'scheduled'])->name('visit.detail');
    Route::get('visit.listCustomer/search', [VisitController::class, 'searchCust'])->name('visit.searchCustomer');
    Route::get('visit.listOutlet/search', [VisitController::class, 'searchOutlet'])->name('visit.searchOutlet');
    Route::post('visit.storeMd', [VisitController::class, 'storeVisitCustMd'])->name('visit.storeMd');
    Route::post('schedule.storeDetail', [ScheduleVisitController::class, 'storeDetail'])->name('schedule.storeDetail');
    // Route::delete('schedule.storeDetail', [ScheduleVisitController::class, 'destroyDetail'])->name('schedule.storeDetail');
    Route::delete('schedule.destroyDetail/{id}', [ScheduleVisitController::class, 'destroyDetail'])->name('schedule.destroyDetail');
    Route::get('report.display', [VisitController::class, 'reportDisplay'])->name('report.display');
    Route::get('report.usedProduct', [VisitController::class, 'reportProduct'])->name('report.usedProduct');
    Route::get('report.sample', [VisitController::class, 'reportSample'])->name('report.sample');

    // EXPORT - IMPORT
    Route::get('customer.export', [CustomerController::class, 'export'])->name('customer.export');
    Route::post('customer.import', [CustomerController::class, 'import'])->name('customer.import');
    Route::get('outlet.export', [OutletController::class, 'export'])->name('outlet.export');
    Route::post('outlet.import', [OutletController::class, 'import'])->name('outlet.import');
    Route::get('product.export', [ProductController::class, 'export'])->name('product.export');
    Route::post('product.import', [ProductController::class, 'import'])->name('product.import');
    Route::get('visit.export', [VisitController::class, 'export'])->name('visit.export');

    // AUTOCOMPLETE
    Route::get('customer.autocomplete', [CustomerController::class, 'autocomplete'])->name('customer.autocomplete');
    Route::get('category.autocomplete', [CategoryProductController::class, 'autocomplete'])->name('category.autocomplete');
    Route::get('display.autocomplete', [DisplayController::class, 'autocomplete'])->name('display.autocomplete');
    Route::get('brand.autocomplete', [BrandController::class, 'autocomplete'])->name('brand.autocomplete');
    Route::get('product.autocomplete', [ProductController::class, 'autocomplete'])->name('product.autocomplete');
    Route::get('staff.autocomplete', [StaffController::class, 'autocomplete'])->name('staff.autocomplete');

    // Temporary route
    Route::get('cardvisit', function(){return view('cardvisit');})->name('cardvisit');
    Route::get('location', [VisitController::class, 'tesLoc'])->name('location');
    Route::get('maps', [VisitController::class, 'maps'])->name('maps');
    Route::get('infoVisit', function(){return view('infoVisit');});

    // Route::get('mapslayout', function(){return view('mapsLayout');});
    Route::get('profile', function(){return view('profile');});
    Route::get('changePassword', function(){return view('changePassword');});

});
