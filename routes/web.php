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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TxtConvertController;
use App\Http\Controllers\TradierOptionChainController;
use App\Http\Controllers\OpenStatusController;
use App\Http\Controllers\AddDataController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\ERDataController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\LiveOptionFlowController;
use App\Http\Controllers\PLCalendarController;  
use App\Http\Controllers\StockController;
use App\Http\Controllers\AlgoController;  
use App\Http\Controllers\SignalsController;
use App\Http\Controllers\AlgoSignalsController;
use App\Http\Controllers\SignalsFilterController;
use App\Http\Controllers\SignalsProfitController;
use App\Http\Controllers\SignalsUController;


Route::prefix('userpage')->group(function () {
    Route::get('/', UserController::class)->middleware('checkuser')->middleware('visitor');
    Route::get('/{id}', [UserController::class, 'show'])->middleware('checkuser')->middleware('visitor');
    Route::get('/{id}/{data}', [UserController::class, 'searchField'])
        ->name('userpage.searchField')
        ->middleware('checkuser')->middleware('visitor');
});

Route::prefix('adminpage')->group(function () {
    // Route::group(['middleware' => ['checkuser', 'permission']], function() {
    //     //your restricted routes here
    //   });
    Route::get('/', AdminController::class)
        ->name('adminpage.home')
        ->middleware('checkadmin')->middleware('visitor');
    Route::get('/{id}', [AdminController::class, 'show'])
        ->name('adminpage.show')
        ->middleware('checkadmin');
    Route::get('/{id}/{data}', [AdminController::class, 'searchField'])
        ->name('adminpage.searchField')
        ->middleware('checkadmin');
    Route::get('/refresh_price/{id}/{data}', [AdminController::class, 'refreshWithPrice'])
        ->name('adminpage.refreshWithPrice')
        ->middleware('checkadmin');
    Route::get('show_adminpage/{categories}/{fields}/{select_category}', [AdminController::class, 'show_adminpage'])
        ->name('adminpage.showAdminPage')
        ->middleware('checkadmin');
    Route::post('edit_field', [AdminController::class, 'editFeild'])
        ->name('adminpage.editField')
        ->middleware('checkadmin');

    Route::post('future_edit_field', [AdminController::class, 'futureeditFeild'])
        ->name('adminpage.future_editField')
        ->middleware('checkadmin');
        
     Route::post('future_algo_editField', [AdminController::class, 'future_algo_editField'])
        ->name('adminpage.future_algo_editField')
        ->middleware('checkadmin');

     Route::post('stock_algo_editField', [AdminController::class, 'stock_algo_editField'])
        ->name('adminpage.stock_algo_editField')
        ->middleware('checkadmin');

    Route::post('break_edit_field', [AdminController::class, 'breakeditFeild'])
        ->name('adminpage.break_editField')
        ->middleware('checkadmin');

    Route::post('activate_record', [AdminController::class, 'activeRecord'])
        ->name('adminpage.activeRecord')
        ->middleware('checkadmin');
    Route::post('activate_record2', [AdminController::class, 'activeRecord2'])
        ->name('adminpage.activeRecord2')
        ->middleware('checkadmin');

    Route::post('add_field', [AdminController::class, 'addField'])
        ->name('adminpage.postField')
        ->middleware('checkadmin');

     Route::post('add_breakstock', [AdminController::class, 'addBreakstock'])
        ->name('adminpage.postBreakstock')
        ->middleware('checkadmin');

     Route::post('add_futures', [AdminController::class, 'addFutures'])
        ->name('adminpage.postFutures')
        ->middleware('checkadmin');

    Route::post('add_futures_algo', [AdminController::class, 'addFuturesAlgo'])
        ->name('adminpage.postFuturesAlgo')
        ->middleware('checkadmin');

    Route::post('add_stock_algo', [AdminController::class, 'addStockAlgo'])
        ->name('adminpage.postStockAlgo')
        ->middleware('checkadmin');

    Route::post('add_cat', [AdminController::class, 'addCat'])
        ->name('adminpage.addCat')
        ->middleware('checkadmin');
    Route::post('delete_cat', [AdminController::class, 'deleteCat'])
        ->name('adminpage.deleteCat')
        ->middleware('checkadmin');
    Route::post('delete_field', [AdminController::class, 'deleteFeild'])
        ->name('adminpage.deleteField')
        ->middleware('checkadmin');
    Route::post('check_new_users', [AdminController::class, 'checkNewUser'])
        ->name('adminpage.checkNewUsers')
        ->middleware('checkadmin');
    Route::post('file-import', [AdminController::class, 'fileImport'])
        ->name('adminpage.file-import')
        ->middleware('checkadmin');
    
});

Route::get('file-import-export', [AdminController::class, 'fileImportExport'])
    ->name('adminpage.fileimportexport')
    ->middleware('checkuser');

Route::get('file-export/{id}/{data}', [AdminController::class, 'fileExport'])
    ->name('adminpage.file-export')
    ->middleware('checkuser');
Route::get('file-export-pdf/{id}/{data}', [AdminController::class, 'fileExportAsPdf'])
    ->name('adminpage.file-export-pdf')
    ->middleware('checkuser');



// ////////stock page//////////////////

Route::prefix('stock')->group(function () {
    // Route::group(['middleware' => ['checkuser', 'permission']], function() {
    //     //your restricted routes here
    //   });
    Route::get('/', StockController::class)
        ->name('stock.home')
        ->middleware('checkadmin')->middleware('visitor');

    Route::get('/{id}', [StockController::class, 'show'])
        ->name('stock.show')
        ->middleware('checkadmin');
    Route::get('search/{data}', [StockController::class, 'searchField'])
        ->name('stock.searchField')
        ->middleware('checkadmin');
    Route::get('/refresh_price/{id}/{data}', [StockController::class, 'refreshWithPrice'])
        ->name('stock.refreshWithPrice')
        ->middleware('checkadmin');
    Route::get('show_stock/{categories}/{fields}/{select_category}', [StockController::class, 'show_stock'])
        ->name('stock.showstock')
        ->middleware('checkadmin');
    Route::post('edit_field', [StockController::class, 'editFeild'])
        ->name('stock.editField')
        ->middleware('checkadmin');

    Route::post('activate_record', [StockController::class, 'activeRecord'])
        ->name('stock.activeRecord')
        ->middleware('checkadmin');
    Route::post('activate_record2', [StockController::class, 'activeRecord2'])
        ->name('stock.activeRecord2')
        ->middleware('checkadmin');

    Route::post('add_field', [StockController::class, 'addField'])
        ->name('stock.postField')
        ->middleware('checkadmin');
    
    Route::post('add_cat', [StockController::class, 'addCat'])
        ->name('stock.addCat')
        ->middleware('checkadmin');
    Route::post('delete_cat', [StockController::class, 'deleteCat'])
        ->name('stock.deleteCat')
        ->middleware('checkadmin');
    Route::post('delete_field', [StockController::class, 'deleteFeild'])
        ->name('stock.deleteField')
        ->middleware('checkadmin');
    Route::post('check_new_users', [StockController::class, 'checkNewUser'])
        ->name('stock.checkNewUsers')
        ->middleware('checkadmin');


    Route::post('file-import', [StockController::class, 'fileImport'])
        ->name('stock.file-import')
        ->middleware('checkadmin');
    
});

// ////////stock signals page//////////////////

Route::prefix('signals')->group(function () {
    // Route::group(['middleware' => ['checkuser', 'permission']], function() {
    //     //your restricted routes here
    //   });
    Route::get('/', SignalsController::class)
        ->name('signals')
        ->middleware('checkadmin')->middleware('visitor');

    Route::get('/{id}', [SignalsController::class, 'show'])
        ->name('signals.show')
        ->middleware('checkadmin');
    Route::get('search/{data}', [SignalsController::class, 'searchField'])
        ->name('signals.searchField')
        ->middleware('checkadmin');
    Route::get('/refresh_price/{id}/{data}', [SignalsController::class, 'refreshWithPrice'])
        ->name('signals.refreshWithPrice')
        ->middleware('checkadmin');
    Route::get('show_signals/{categories}/{fields}/{select_category}', [SignalsController::class, 'show_signals'])
        ->name('signals.showstock')
        ->middleware('checkadmin');
    Route::post('edit_field', [SignalsController::class, 'editFeild'])
        ->name('signals.editField')
        ->middleware('checkadmin');

    Route::post('activate_record', [SignalsController::class, 'activeRecord'])
        ->name('signals.activeRecord')
        ->middleware('checkadmin');
    Route::post('activate_record2', [SignalsController::class, 'activeRecord2'])
        ->name('signals.activeRecord2')
        ->middleware('checkadmin');

    Route::post('add_field', [SignalsController::class, 'addField'])
        ->name('signals.postField')
        ->middleware('checkadmin');
    
    Route::post('add_cat', [SignalsController::class, 'addCat'])
        ->name('signals.addCat')
        ->middleware('checkadmin');
    Route::post('delete_cat', [SignalsController::class, 'deleteCat'])
        ->name('signals.deleteCat')
        ->middleware('checkadmin');
    Route::post('delete_field', [SignalsController::class, 'deleteFeild'])
        ->name('signals.deleteField')
        ->middleware('checkadmin');
    Route::post('check_new_users', [SignalsController::class, 'checkNewUser'])
        ->name('signals.checkNewUsers')
        ->middleware('checkadmin');


    Route::post('file-import', [SignalsController::class, 'fileImport'])
        ->name('signals.file-import')
        ->middleware('checkadmin');


    
});


Route::prefix('algosignals')->group(function () {
  
    Route::get('/', AlgoSignalsController::class)
        ->name('algosignals')
        ->middleware('checkadmin')->middleware('visitor');   

    Route::get('file-export', [AlgoSignalsController::class, 'fileExport'])
    ->name('algosignals.file-export3')
    ->middleware('checkuser');
    
});

Route::prefix('signalsfilter')->group(function () {
  
    Route::get('/', SignalsFilterController::class)
        ->name('signalsfilter')
        ->middleware('checkadmin')->middleware('visitor');   

    Route::post('/getdata', [SignalsFilterController::class, 'get_filter_data'])
        ->name('getdata')
        ->middleware('checkadmin')->middleware('visitor');   

    Route::get('file-export-filter', [SignalsFilterController::class, 'fileExport'])
    ->name('signalsfilter.file-export4')
    ->middleware('checkuser');    
});

Route::prefix('signalsotheru')->group(function () {
  
    Route::get('/', SignalsUController::class)
        ->name('signalsotheru')
        ->middleware('checkadmin')->middleware('visitor');   

    Route::post('/getdata', [SignalsUController::class, 'get_filter_data'])
        ->name('getdata')
        ->middleware('checkadmin')->middleware('visitor');   

    Route::get('file-export-filter', [SignalsUController::class, 'fileExport'])
    ->name('signalsotheru.file-export4')
    ->middleware('checkuser');    
});

Route::prefix('signalsprofit')->group(function () {
  
    Route::get('/', SignalsProfitController::class)
        ->name('signalsprofit')
        ->middleware('checkadmin')->middleware('visitor');   

    Route::post('/getdata', [SignalsProfitController::class, 'get_filter_data'])
        ->name('getdata')
        ->middleware('checkadmin')->middleware('visitor');   

    Route::get('file-export-filter', [SignalsProfitController::class, 'fileExport'])
    ->name('signalsprofit.file-export4')
    ->middleware('checkuser');    
});


Route::get('file-import-export2', [StockController::class, 'fileImportExport'])
    ->name('stock.fileimportexport')
    ->middleware('checkuser');

Route::get('file-export2/{id}/{data}', [StockController::class, 'fileExport'])
    ->name('stock.file-export')
    ->middleware('checkuser');



Route::get('file-export-pdf2/{id}/{data}', [StockController::class, 'fileExportAsPdf'])
    ->name('stock.file-export-pdf')
    ->middleware('checkuser');
// ////////stock page//////////////////


Route::prefix('get-options')->group(function () {
    Route::get('/', TradierOptionChainController::class)
        ->name('getoptions.home')
        ->middleware('checkadmin');
});

Route::get('/', [AuthController::class, 'index']);
Route::get('login', [AuthController::class, 'index']);
//Route::get('adminpage', [AuthController::class, 'dashboard']); 
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'doLogin'])->name('login.custom'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('registration', [AuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('txt-convert', TxtConvertController::class)
    ->name('txt_convert')
    ->middleware('checkadmin');
Route::post('txt-convert', [TxtConvertController::class, 'convert'])
    ->name('txt_convert')
    ->middleware('checkadmin');

Route::get('open-status', OpenStatusController::class)->name('open_status')->middleware('checkadmin');

Route::prefix('adddata')->group(function () {
    Route::get('/', AddDataController::class)->name('add_data')->middleware('checkadmin');
    Route::post('add', [AddDataController::class, 'addData'])->name('add_contact')->middleware('checkadmin');
    Route::post('delete_contact', [AddDataController::class, 'deleteContact'])->name('delete_contact')->middleware('checkadmin');
    Route::post('import_bulk_contacts', [AddDataController::class, 'addBulkContacts'])->name('add_bulk_contacts')->middleware('checkadmin');
    Route::post('add_new_category', [AddDataController::class, 'addNewCategory'])->name('add_new_category')->middleware('checkadmin');
    Route::post('add_edit_category', [AddDataController::class, 'addEditCategory'])->name('add_edit_category')->middleware('checkadmin');
    Route::post('delete_mail', [AddDataController::class, 'deleteMail'])->name('delete_mail')->middleware('checkadmin');
    //
});
Route::get('send_mail/{category}/{mailers}', [SendMailController::class, 'show'])->name('view_send_mailers')->middleware('checkadmin');
Route::get('send_mail', [SendMailController::class])->name('view_send_mail')->middleware('checkadmin');
Route::post('send_mail', [SendMailController::class, 'sendEmail'])->name('send_email')->middleware('checkadmin');
//Route::post('delete_mail', [SendMailController::class, 'deleteMail'])->name('send_email')->middleware('checkadmin');
//Route::get('txt-convert', [AuthController::class, 'signOut'])->name('txt_convert');

Route::prefix('erdata')->group(function () {
    Route::get('/', ERDataController::class)->name('erdata')->middleware('checkadmin');
    Route::post('add', [ERDataController::class, 'add'])->name('erdata.add')->middleware('checkadmin');
    Route::post('delete', [ERDataController::class, 'delete'])->name('erdata.delete')->middleware('checkadmin');
    Route::post('/import_csv', [ERDataController::class, 'importFromCSV'])->name('erdata.importFromCSV')->middleware('checkadmin');
    Route::get('/export_pdf', [ERDataController::class, 'exportAsPdf'])->name('erdata.exportAsPdf')->middleware('checkadmin');
    Route::get('/export_csv', [ERDataController::class, 'exportAsCsv'])->name('erdata.exportAsCsv')->middleware('checkadmin');
    
    //
});

Route::prefix('userdata')->group(function () {
    Route::get('/', UserDataController::class)->name('userdata')->middleware('checkadmin');
    Route::post('/newdata', [UserDataController::class, 'newUserData'])->name('userdata.newdata')->middleware('checkadmin');
    Route::post('/editdata', [UserDataController::class, 'editUserData'])->name('userdata.editdata')->middleware('checkadmin');
    Route::post('/deletedata', [UserDataController::class, 'deleteUserData'])->name('userdata.deletedata')->middleware('checkadmin');
    Route::post('/importdata', [UserDataController::class, 'importUserData'])->name('userdata.importdata')->middleware('checkadmin');
    Route::get('/export_csv', [UserDataController::class, 'exportUserDataAsCsv'])->name('userdata.export_csv')->middleware('checkadmin');
    Route::get('/export_pdf', [UserDataController::class, 'exportUserDataAsPdf'])->name('userdata.export_pdf')->middleware('checkadmin');
});

Route::prefix('liveoptions')->group(function() {
    Route::get('/', LiveOptionFlowController::class)->name('liveoptionflow')->middleware('checkadmin');
});

Route::prefix('plcalendar')->group(function() {
    Route::get('/', PLCalendarController::class)->name('plcalendar')->middleware('checkadmin');
    Route::get('/sum', [PLCalendarController::class, 'sum_netdiff'])->name('plcalendar.sum')->middleware('checkadmin');
    Route::get('/month_vals/{year}', [PLCalendarController::class, 'month_vals'])->name('plcalendar.monthval')->middleware('checkadmin');

});

Route::prefix('algo')->group(function() {
    Route::get('/', AlgoController::class)->name('algo');

    Route::post('/addalgo', [AlgoController::class, 'add_algo'])->name('addalgo');
    Route::post('/discountcode', [AlgoController::class, 'get_discount_code'])->name('discountcode');

    Route::get('/sum', [PLCalendarController::class, 'sum_netdiff'])->name('plcalendar.sum');
    Route::get('/month_vals/{year}', [PLCalendarController::class, 'month_vals'])->name('plcalendar.monthval');

});



Route::post('add', [AddDataController::class, 'addData'])->name('add_contact_global');


Route::get('/test', function(){
    (new App\helper\OptionFlowHelper())->fetchLiveData();
});
