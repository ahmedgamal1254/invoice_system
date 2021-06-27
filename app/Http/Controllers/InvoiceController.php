<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;
use PDF;

class InvoiceController extends Controller
{
    public function create(){
        return view('invoice.create');
    }

    public function del($id){
        $invoice=Invoice::find($id);
        $invoice->delete();

        return redirect('/');
    }

    public function visible($id){
        $invoice=Invoice::with('invoice_details')->find($id);
        // return $invoice
        return view('invoice.visible',['invoice' => $invoice]);
    }

    public function add(Request $request){
        $data['id'] = Request('invoice_number');
        $data['name'] = Request('name');
        $data['email'] = Request('email');
        $data['phone'] = Request('phone');
        $data['company_name'] = Request('company_name');
        $data['invoice_number'] = Request('invoice_number');
        $data['date_invoice'] = Request('date_invoice');
        $data['sub_total'] = Request('sub_total');
        $data['discount_type'] = Request('discount_type');
        $data['discount_value'] = Request('discount_value');
        $data['vat_value'] = Request('vat_value');
        $data['shipping'] = Request('shipping');
        $data['total_due'] = Request('total_due');

        Invoice::create($data);

        $list= [];
        for($i = 0;$i < count(request('product_name'));$i++){
            $list[$i]['invoice_id'] = Request('invoice_number');
            $list[$i]['product_name'] = $request->product_name[$i];
            $list[$i]['unit'] = $request->unit[$i]; 
            $list[$i]['quantity'] = $request->quantity[$i]; 
            $list[$i]['unit_price'] = $request->unit_price[$i]; 
            $list[$i]['row_sub_total'] = $request->row_sub_total[$i]; 
        }

        // InvoiceDetail::create($list)
        DB::table('invoices_details')->insert($list);
        return redirect('/');
    }

    public function print($id){
        $invoice=Invoice::with('invoice_details')->find($id);
        return view('invoice.print',['invoice' => $invoice]);
    }

    public function pdf($id){
        $invoice=Invoice::with('invoice_details')->find($id);
        $pdf = PDF::loadView('invoice.pdf', ['invoice' => $invoice]);
        return $pdf->download($invoice->name . '.pdf');
    }

    public function mail($id){
        $invoice=Invoice::with('invoice_details')->find($id);
        $email=$invoice->email;
        Mail::to($email)->send(new InvoiceMail($invoice));
        return redirect('/');
    }
}
