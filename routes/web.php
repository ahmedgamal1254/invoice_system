<?php
    use App\Invoice;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        $invoices=Invoice::orderBy('id','desc')->paginate(10);
        return view('welcome',['invoices' => $invoices]);
    });
    ################ crud invoice ###########
    Route::get('invoice/create','InvoiceController@create')->name('invoice.create');
    Route::post('invoice/add','InvoiceController@add')->name('invoice.add');

    Route::get('invoice/delete/{id}','InvoiceController@del')->name('del');
    Route::get('invoice/visible/{id}','InvoiceController@visible')->name('visible');
    Route::get('invoice/edit/{id}','InvoiceController@edit')->name('edit');

    Route::get('invoice/print/{id}','InvoiceController@print')->name('print');

    Route::get('invoice/pdf/{id}','InvoiceController@pdf')->name('pdf');
    Route::get('invoice/mail/{id}','InvoiceController@mail')->name('mail');
    ################ crud invoice ###########