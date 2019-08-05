@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Invoice Penjualan</span>
                </a>
            </div>

            <div class="col-md-4" >
            </div>

            <div class="col-md-4">
                
            </div>
        </div>

        @if (count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div> 
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
        @endif

        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="small text-center font-weight-bold">Pelanggan</th>
                                        <th class="small text-center font-weight-bold">No. Pesanan</th>
                                        <th class="small text-center font-weight-bold">Tgl. Order</th>
                                        <th class="small text-center font-weight-bold">Produk</th> 
                                        <th class="small text-center font-weight-bold">Kuantitas</th>
                                        <th class="small text-center font-weight-bold">Tanggal DO</th>
                                        <th class="small text-center font-weight-bold">Tgl. Invoice</th>
                                        <th class="small text-center font-weight-bold">Tgl. Jatuh Tempo</th>
                                        <th class="small text-center font-weight-bold">Draft</th>                              
                                        @if (Auth::user()->role == 'Supervisor')
                                            <th class="small text-center font-weight-bold">Approve</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($invoices) > 0 )
                                        @foreach ($invoices as $inv)
                                            <tr>
                                                <td class="small text-center">{{ $inv->salesOrder->customer->email }}</td>
                                                <td class="small text-center">{{ $inv->salesOrder->id }}</td>
                                                <td class="small text-center">{{ $inv->salesOrder->order_date }}</td>
                                                <td class="small text-center">{{ $inv->salesOrder->product->name }}</td>
                                                <td class="small text-center">{{ $inv->salesOrder->quantity }}</td>
                                                <td class="small text-center">{{ $inv->deliveryOrder->delivery_date }}</td>
                                                @if (empty($inv->invoice_date))
                                                    <td class="small text-center" data-toggle="modal" data-target="#edit" data-inv-id="{{  $inv->id  }}">
                                                        <a href="#" >
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td class="small text-center">{{ $inv->invoice_date }}</td>
                                                @endif

                                                @if (empty($inv->due_date))
                                                    <td class="small text-center" data-toggle="modal" data-target="#edit" data-inv-id="{{  $inv->id  }}">
                                                        <a href="#" >
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td class="small text-center">{{ $inv->due_date }}</td>
                                                @endif

                                                <th class="small text-center">
                                                    <a href="http://www.africau.edu/images/default/sample.pdf" target="_blank">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </th>

                                                @if (Auth::user()->role == 'Supervisor')
                                                    <td class="small text-center">
                                                        <a href="#" data-toggle="modal" data-target="#approve" data-inv-id="{{ $inv->id }}">
                                                            <i class="fas fa-check"></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (count($invoices) > 0)
            @include('invoice.modals.edit')
            @include('invoice.modals.approve')
        @endif
        
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#edit').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var invoiceID = button.data('inv-id');
            
            $('#invoice_id').val(invoiceID);
        });


        $('#approve').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var invoiceID = button.data('inv-id');

            console.log(invoiceID);
           
            $('#approve_invoice_id').val(invoiceID);
        });
    });
</script>
@endsection