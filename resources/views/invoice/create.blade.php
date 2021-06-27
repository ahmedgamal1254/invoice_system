@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
                Create New Invoice
            </div>
            <div class="card-body">
                <form action="{{ route('invoice.add') }}" method="post">
                    @csrf

                    {{-- Start input for customer --}}
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" name="name"  placeholder="Enter name customer">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="email" class="form-control" name="email"  placeholder="Enter email customer">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="tel" class="form-control" name="phone"  placeholder="Enter phone customer">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- end input for customer --}}

                    {{-- start input for company --}}
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <input type="text" class="form-control" name="company_name"  placeholder="Enter company name">
                            @error('company.name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="number" class="form-control" name="invoice_number"  placeholder="Enter invoice number">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="date" class="form-control" name="date_invoice"  placeholder="Enter date of invoice">
                            @error('date_invoice')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- end input for company --}}

                    <div class="table-responsive">
                        <table class="table" id="invoice_details">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Product name</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Unit price</th>
                                <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody class="table-body">
                                <tr class="cloning_row" id="0">
                                    <td>#</td>
                                    <td>
                                        <input type="text" name="product_name[0]" id="product_name" class="product_name form-control">
                                        @error('product_name')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <select name="unit[0]" id="unit" class="unit form-control">
                                            <option></option>
                                            <option value="piece">{{ __('Frontend/frontend.piece') }}</option>
                                            <option value="g">{{ __('Frontend/frontend.gram') }}</option>
                                            <option value="kg">{{ __('Frontend/frontend.kilo_gram') }}</option>
                                        </select>
                                        @error('unit')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[0]" step="0.01" id="quantity" class="quantity form-control">
                                        @error('quantity')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="unit_price[0]" step="0.01" id="unit_price" class="unit_price form-control">
                                        @error('unit_price')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="row_sub_total[0]" id="row_sub_total" class="row_sub_total form-control" readonly="readonly">
                                        @error('row_sub_total')<span class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <button type="button" class="btn_add btn btn-primary">{{ __('Frontend/frontend.add_another_product') }}</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">{{ __('Frontend/frontend.sub_total') }}</td>
                                    <td><input type="number" step="0.01" name="sub_total" id="sub_total" class="sub_total form-control" readonly="readonly"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">{{ __('Frontend/frontend.discount') }}</td>
                                    <td>
                                        <div class="input-group mb-3">
                                            <select name="discount_type" id="discount_type" class="discount_type custom-select">
                                                <option value="Sr">{{ __('Frontend/frontend.sr') }}</option>
                                                <option value="percentage">{{ __('Frontend/frontend.percentage') }}</option>
                                            </select>
                                            <div class="input-group-append">
                                                <input type="number" step="0.01" name="discount_value" id="discount_value" class="discount_value form-control" value="0.00">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">{{ __('Frontend/frontend.vat') }}</td>
                                    <td><input type="number" step="0.01" name="vat_value" id="vat_value" class="vat_value form-control" readonly="readonly"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">{{ __('Frontend/frontend.shipping') }}</td>
                                    <td><input type="number" step="0.01" name="shipping" id="shipping" class="shipping form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">{{ __('Frontend/frontend.total_due') }}</td>
                                    <td><input type="number" step="0.01" name="total_due" id="total_due" class="total_due form-control" readonly="readonly"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <button class="btn btn-primary pull-right">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('keyup','.quantity',function (){
                var unit_Price = $(this).parent().siblings().children('.unit_price').val(),
                    quantity = $(this).val();

                sub_total = (unit_Price * quantity).toFixed(2)
                vat=sub_total * (5/100)
                total_due=(parseFloat(sub_total) + parseFloat(vat)).toFixed(2)
                $(this).parent().siblings().children('.row_sub_total').val(sub_total)
                $('.sub_total').val(sub_total_func())
                $('.total_due').val( discount() )
                $('.vat_value').val(parseFloat(vat))

                console.log(sub_total_func())
            })

            $(document).on('keyup','.unit_price',function (){
                var quantity = $(this).parent().siblings().children( ".quantity" ).val(),
                    unit_price = $(this).val();

                sub_total = (unit_price * quantity).toFixed(2)
                vat=sub_total * (5/100)
                total_due=(parseFloat(sub_total) + parseFloat(vat)).toFixed(2)
                $(this).parent().siblings().children('.row_sub_total').val(sub_total)
                $('.sub_total').val(sub_total_func())
                $('.total_due').val( discount() )
                $('.vat_value').val(parseFloat(vat))

                console.log(sub_total_func())
            })

            $(document).on('keyup','.discount_value',function (){
                var quantity = $(this).parent().siblings().children( ".quantity" ).val(),
                    unit_price = $(this).val();

                sub_total = (unit_price * quantity).toFixed(2)
                vat=sub_total * (5/100)
                total_due=(parseFloat(sub_total) + parseFloat(vat)).toFixed(2)
                $(this).parent().siblings().children('.row_sub_total').val(sub_total)
                $('.sub_total').val(sub_total_func())
                $('.total_due').val( discount() )
                $('.vat_value').val(parseFloat(vat))
            })

            $(document).on('change','.discount_value',function (){
                // console.log($(this).val())
                var unit_Price = $('.unit_price').val(),
                    quantity = $('.quantity').val();

                sub_total = (unit_Price * quantity).toFixed(2)
                vat=sub_total * (5/100)
                total_due=(parseFloat(sub_total) + parseFloat(vat)).toFixed(2)
                $('.row_sub_total').val(sub_total)
                $('.sub_total').val(sub_total)
                $('.total_due').val( discount() )
                $('.vat_value').val(parseFloat(vat))
            })

            $('.btn_add').click(function (e){
                e.preventDefault();
                $('.table-body').append(
                    `
                    <tr class="cloning_row" id="">
                        <td><span class='del_element'><i class='fa fa-trash'></i></span></td>
                        <td>
                            <input type="text" name="product_name[]" id="product_name" class="product_name form-control">
                        </td>
                        <td>
                            <select name="unit[]" id="unit" class="unit form-control">
                                <option></option>
                                <option value="piece">{{ __('Frontend/frontend.piece') }}</option>
                                <option value="g">{{ __('Frontend/frontend.gram') }}</option>
                                <option value="kg">{{ __('Frontend/frontend.kilo_gram') }}</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="quantity[]" step="0.01" id="quantity" class="quantity form-control">
                        </td>
                        <td>
                            <input type="number" name="unit_price[]" step="0.01" id="unit_price" class="unit_price form-control">
                        </td>
                        <td>
                            <input type="number" step="0.01" name="row_sub_total[]" id="row_sub_total" class="row_sub_total form-control" readonly="readonly">
                        </td>
                    </tr>
                    `
                );
            })

            $(document).on('click','.del_element .fa',function (){
                $(this).parent().parent().parent().remove();

                $('.row_sub_total').val(sub_total)
                $('.sub_total').val(sub_total)
                $('.total_due').val( discount() )
                $('.vat_value').val(parseFloat(vat))
            })

            function discount(){
                let discount_type=$('.discount_type').val()
                let discount_value=$('.discount_value').val()
                // let total_due=$('.total_due').val()
                if(discount_value != 0){
                    if(discount_type == 'Sr'){
                        return (parseFloat(total_due) - parseFloat(discount_value)).toFixed(2)
                    }else if(discount_type == 'percentage'){
                        return (parseFloat(total_due) - parseFloat(total_due) * parseFloat(discount_value / 100)).toFixed(2)
                    }
                }else{
                    return total_due
                }
            }

            function sub_total_func(){
                let sum=0;
                $('.row_sub_total').each(function () { 
                     sum += parseFloat($(this).val())
                });

                return sum;
            }
        });
    </script>
@endsection