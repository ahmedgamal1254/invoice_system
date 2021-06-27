@extends('layouts.app')
@section('content')
<div class="card" style="margin-top: 60px">
    <div class="card-header">
        <h4> invoice System :-  {{ $invoice->id }}</h4>
    </div>
    <div class="card-body">
        <div class="table">
            <div class="table-reponsive">
                <table class="table table-dark text-center">
                    <thead>
                      <tr>
                        <th scope="col">Customer Name</th>
                        <td>{{ $invoice->name }}</td>
                        <th scope="col">Customer Phone</th>
                        <td>{{ $invoice->phone }}</td>
                        <th scope="col">Customer Email</th>
                        <td>{{ $invoice->email }}</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">Company Name</th>
                        <td>{{ $invoice->company_name }}</td>
                        <th scope="row">invoice_number</th>
                        <td>{{ $invoice->invoice_number }}</td>
                        <th scope="row">date_invoice</th>
                        <td>{{ $invoice->date_invoice }}</td>
                      </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card" style="margin-top: 60px">
    <div class="card-header">
        <h4> invoice details :-  {{ $invoice->id }}</h4>
    </div>
    <div class="card-body">
        <div class="table">
            <div class="table-reponsive">
                <table class="table text-center">
                    <thead>
                      <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Sub Total</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice->invoice_details as $item)
                            <tr>
                                <td>{{ $item->invoice_id }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->row_sub_total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">sub_total</td>
                            <td>{{ $invoice->sub_total }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">discount_type</td>
                            <td>
                                {{ $invoice->discount_type }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">discount_value</td>
                            <td>{{ $invoice->discount_value }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">shipping</td>
                            <td>{{ $invoice->shipping }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="2">total_due</td>
                            <td>{{ $invoice->total_due }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        window.print()
    </script>
@endsection