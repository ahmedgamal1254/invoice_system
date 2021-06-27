<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'XBRiyaz', sans-serif;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            font-size: 9px;
            line-height: 24px;
            font-family: 'XBRiyaz', sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: right;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td {
            text-align: left;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 30px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: 'XBRiyaz', sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td {
            text-align: right;
        }

        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
</head>
<body>
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
                          <tr class="heading">
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
                                <tr class="item">
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
                            <tr class="total">
                                <td colspan="3"></td>
                                <td colspan="2">sub_total</td>
                                <td>{{ $invoice->sub_total }}</td>
                            </tr>
                            <tr class="total">
                                <td colspan="3"></td>
                                <td colspan="2">discount_type</td>
                                <td>
                                    {{ $invoice->discount_type }}
                                </td>
                            </tr>
                            <tr class="total">
                                <td colspan="3"></td>
                                <td colspan="2">discount_value</td>
                                <td>{{ $invoice->discount_value }}</td>
                            </tr>
                            <tr class="total">
                                <td colspan="3"></td>
                                <td colspan="2">shipping</td>
                                <td>{{ $invoice->shipping }}</td>
                            </tr>
                            <tr class="total">
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
</body>
</html>