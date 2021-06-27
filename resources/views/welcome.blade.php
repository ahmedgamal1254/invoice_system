@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header">
              invoice System
              <a href="{{ route('invoice.create') }}">
                <span class="pull-right btn btn-primary">
                    <i class="fa fa-plus"></i>
                    Create New Invoice
                </span>
              </a>
            </div>
            <div class="card-body">
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Customer name</th>
                    <th scope="col">invoice date</th>
                    <th scope="col">Total Due</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($invoices as $item)
                    <tr>
                      <th scope="row">{{ $item->name }}</th>
                      <td>{{ $item->date_invoice }}</td>
                      <td>{{ $item->total_due }}</td>
                      <td>
                        <a href="{{ route('del',$item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        <a href="{{ route('edit',$item->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('visible',$item->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td class="text-center" colspan="4">{{ $invoices->links() }}</td>
                  </tr>
                </tfoot>
              </table>
            </div>
        </div>
    </div>
@endsection