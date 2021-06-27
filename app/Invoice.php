<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table="invoices";

    protected $fillable = [
        'id','name','email',
        'phone','company_name',
        'invoice_number','date_invoice',
        'sub_total','discount_type',
        'discount_value','vat_value',
        'shipping','total_due'
    ];

    protected $hidden=['created_at','updated_at'];

    public function invoice_details(){
        return $this->hasMany('App\InvoiceDetail','invoice_id');
    }
}
