<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoiceController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::Resource('services',"App\Http\Controllers\ServiceController");
Route::Resource('invoices',"App\Http\Controllers\InvoiceController");
Route::Resource('customers',"App\Http\Controllers\CustomerController");
Route::Resource('company',"App\Http\Controllers\CompanyController");
Route::Resource('currencies',"App\Http\Controllers\CurrencyController");
Route::Resource('costs',"App\Http\Controllers\CostMoneyChargeController");
Route::post('/invoices/fetch', [InvoiceController::class, 'fetch'])->name('customers.fetch');
// Route::Resource('recipt', "App\Http\Controllers\ReciptController");
Route::get('/print', [InvoiceController::class, 'print'])->name('print');
Route::get('/originalprint', [InvoiceController::class, 'original_print'])->name('original_print');






