<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PredefinedTransactionController;
use App\Http\Controllers\BulkTransactionController;
use App\Http\Controllers\DynamicBulkUploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/configuration');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   // configuration
    Route::get('/configuration', [ConfigController::class, 'configuration'])->name('config.index');
    Route::post('/configsave', [ConfigController::class, 'configsave'])->name('config.index');
    //product master
    // Route::get('/productmaster', [ProductController::class, 'create'])->name('product.create');
    // Route::post('/productmaster/store', [ProductController::class, 'store'])->name('product.create');
    // Route::get('/productmaster/show', [ProductController::class, 'show'])->name('product.index');
    //predefined transaction
    Route::get('/predefinedtransaction', [PredefinedTransactionController::class, 'index'])->name('product.create');
    Route::post('/predefinedtransaction_update', [PredefinedTransactionController::class, 'update']);
    Route::post('/predefinedtransaction_update/{id}', [PredefinedTransactionController::class, 'update']);
    Route::post('/getProductData', [PredefinedTransactionController::class, 'getProductData']);
    Route::get('/get-predefinedtransaction-list', [PredefinedTransactionController::class, 'transactionList']);
    Route::get('/printpreview/{id}', [PredefinedTransactionController::class, 'printpreview']);
    Route::get('/print/{id}', [PredefinedTransactionController::class, 'print']);
    Route::get('/batchNumberValidation', [PredefinedTransactionController::class, 'batchNumberValidation']);
    //reprint
    Route::get('/reprint/{id}', [PredefinedTransactionController::class, 'reprintTransaction']);
    Route::post('/reprintprint/{id}', [PredefinedTransactionController::class, 'reprint']);
    Route::get('/reprintTransactionPredefined', [PredefinedTransactionController::class, 'reprintTransactionPredefined']);
    //Dynamic transaction
    Route::get('/dynamic', [PredefinedTransactionController::class, 'dynamicshow']);
    Route::get('/dynamictransaction', [PredefinedTransactionController::class, 'dynamictransaction']);
    Route::post('/dynamicsave', [PredefinedTransactionController::class, 'dynamicsave']);
    Route::get('/dynamictransactionprint', [PredefinedTransactionController::class, 'dynamictransactionprint']);
    Route::get('/labelnameagainstdata', [PredefinedTransactionController::class, 'labelnameagainstdata']);
    Route::get('/labelNameDynamic', [PredefinedTransactionController::class, 'labelNameDynamic']);
    Route::get('/printdynamic/{id}', [PredefinedTransactionController::class, 'printdynamic']);

    // bulkupload-dynamictransaction

    Route::get('/dynamictransaction-bulkupload', [BulkTransactionController::class, 'dynamictransactionbulkupload']);
    Route::post('/bulkuploaddynamicsave', [BulkTransactionController::class, 'bulkuploaddynamicsave']);
    Route::get('/bulkuploaddynamicsave/{id}/{label}', [BulkTransactionController::class, 'bulkuploaddynamicsave']);

    //label design page

    Route::get('/labeldesign', [LabelController::class, 'labeldesign'])->name('label.label');
    Route::post('/savelabeldesign', [LabelController::class, 'savelabeldesign']);
    Route::get('/labeledit/{id}', [LabelController::class, 'labeledit']);
    Route::get('/labellist', [LabelController::class, 'labellist'])->name('label.labellist');
    Route::get('/labelname_shipper', [LabelController::class, 'labelnameValidation']);
    Route::get('/labelsize', [LabelController::class, 'labelsize']);
    Route::post('/labelupdate/{id}', [LabelController::class, 'labelupdate']);
    //user
    Route::resource('users', UserController::class);
    Route::get('/userNameChange', [UserController::class, 'userNameChange']);
    //change password
    Route::get('/change-password', [App\Http\Controllers\UserController::class, 'changepassword']);
    Route::post('/change-password', [App\Http\Controllers\UserController::class, 'editpassword']);
    //product master
    Route::resource('productmaster', ProductController::class);
    // Route::get('/productNameChange', [ProductController::class, 'productNameChange']);
    // Route::get('/productIdChange', [ProductController::class, 'productIdchange']);
    Route::get('/requestapproval', [ProductController::class, 'requestapproval']);
    Route::get('/pendingapproval/{id}', [ProductController::class, 'approvereject']);
    Route::post('/productApprove', [ProductController::class, 'productApprove']);
    Route::post('/productReject', [ProductController::class, 'productReject']);
    Route::get('/rejectpending/{id}', [ProductController::class, 'rejectpending']);
    Route::post('/updaterejectpending/{id}', [ProductController::class, 'updaterejectpending']);
    Route::get('/approved/{id}', [ProductController::class, 'approved']);
    //role
    Route::resource('roles', RoleController::class);
    //reports
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/detailedreport-pr/{id}', [ReportController::class, 'detailedPredefinedReport'])->name('report.predefineddetailedreport');
    Route::get('/detailedreport-dy/{id}', [ReportController::class, 'detailedDynamicReport'])->name('report.dynamicdetailedreport');
    Route::get('/dynamicreport', [ReportController::class, 'dynamicreport'])->name('report.dynamicreport');
    Route::get('/bulkdynamicreport', [ReportController::class, 'bulkdynamicreport'])->name('report.bulkdynamicreport');
    Route::get('/bulkdynamicreport/{id}', [ReportController::class, 'bulkdynamicdetailedreport'])->name('report.bulkdynamicdetailedreport');
    //bulkupload for product
    Route::get('/bulkupload', [ProductController::class, 'bulkupload']);
    Route::get('/bulkuploadproduct', [ProductController::class, 'bulkuploadproduct']);
    Route::post('/importdatafetch', [ProductController::class, 'importdatafetch']);
    Route::post('/import', [ProductController::class, 'import'])->name('import');

    //bulkupload for transaction
    Route::get('/tranasctionbulkuploadview', [BulkTransactionController::class, 'TransactionBulkuploadView']);
    Route::get('/transactionbulkupload', [BulkTransactionController::class, 'TransactionBulkUpload']);

    //dynamic bulkupload transaction
    Route::get('/dynamicbulktransactionview', [DynamicBulkUploadController::class, 'dynamicBulkTransactionView']);
    Route::post('/createTableExcel', [DynamicBulkUploadController::class, 'createTableExcel']);


});

require __DIR__.'/auth.php';
