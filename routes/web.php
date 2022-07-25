<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardDendaController;
use App\Http\Controllers\DashboardPaymentMethodController;
use App\Http\Controllers\DashboardTransactionController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('layouts.admin', []);
});


Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name"  => "Camp Outdoor",
        "nomor" => "O813175O44O5",
        "image" => "akatara.jpg",
        'active' => 'about'
    ]);
})->name('about');


Route::get('/', [BerandaController::class, 'index'])->name('index');
Route::get('beranda/{home:slug}', [BerandaController::class, 'show'])->name('detail.post');


Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/pinjam', [BerandaController::class, 'pinjam'])->name('pinjam');
Route::get('/transaksi', [BerandaController::class, 'transaksi'])->name('transaksi');
Route::get('/transaksi/{code}', [BerandaController::class, 'transaksi_show'])->name('transaksi.show');
Route::post('/transaksi', [BerandaController::class, 'transaksi_pay'])->name('transaksi.pay');

Route::get('/denda', [BerandaController::class, 'denda'])->name('denda');

Route::get('/profile', [BerandaController::class, 'profile'])->name('profile');
Route::post('/profile/update', [BerandaController::class, 'profile_update'])->name('profile.update');
Route::post('/profile/pass', [BerandaController::class, 'profile_pass'])->name('profile.pass');



// Route::get('/generatelink', function () {
//     Artisan::call('storage:link');
// });

//admin



Route::group(['middleware' => ['checkAuth:1']], function () {
    Route::get('/admin', [DashboardAdminController::class, 'admin'])->name('admin');
    Route::get('/admin/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::resource('/admin/posts', DashboardPostController::class);
    Route::resource('/admin/users', DashboardUserController::class);
    Route::get('/admin/user/pass/{user}', [DashboardUserController::class, 'pass'])->name('admin.pass');
    Route::patch('/admin/user/pass/{user}', [DashboardUserController::class, 'pass_update'])->name('admin.pass.update');
    Route::resource('/admin/categories', DashboardCategoryController::class)->except('show');
    // Transaction
    Route::get('/admin/transaction', [DashboardTransactionController::class, 'index'])->name('admin.transaction.index');
    Route::get('/admin/transaction/process/{code}', [DashboardTransactionController::class, 'show'])->name('admin.transaction.show');
    Route::put('/admin/transaction/process/{code}', [DashboardTransactionController::class, 'process'])->name('admin.transaction.process');


    // Denda
    Route::get('/admin/denda', [DashboardDendaController::class, 'index'])->name('admin.denda');
    Route::get('/admin/denda/process/{id}', [DashboardDendaController::class, 'proccess'])->name('admin.denda.proccess');
    // Payment Method
    Route::get('/admin/payment/method', [DashboardPaymentMethodController::class, 'index'])->name('admin.payment.method');
    Route::get('/admin/payment/method/create', [DashboardPaymentMethodController::class, 'create'])->name('admin.payment.method.create');
    Route::post('/admin/payment/method/create', [DashboardPaymentMethodController::class, 'store'])->name('admin.payment.method.store');
    Route::get('/admin/payment/method/edit/{id}', [DashboardPaymentMethodController::class, 'edit'])->name('admin.payment.method.edit');
    Route::put('/admin/payment/method/edit/{id}', [DashboardPaymentMethodController::class, 'update'])->name('admin.payment.method.update');
    Route::delete('/admin/payment/method/destroy/{id}', [DashboardPaymentMethodController::class, 'destroy'])->name('admin.payment.method.destroy');
});
