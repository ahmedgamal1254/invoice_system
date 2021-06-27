<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $table="invoices_details";

    protected $fillable = [
        'invoice_id','product_name',
        'unit','quantity','unit_price',
        'row_sub_total'
    ];

    protected $hidden=['created_at','updated_at'];

    public function invoice(){
        return $this->belongsTo('App\Invoice','invoice_id','id');
    }
}
