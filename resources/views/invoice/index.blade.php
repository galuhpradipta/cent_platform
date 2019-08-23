@extends('layouts.new-app')

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
                            <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Pelanggan</th>
                                        <th class="text-center">No. Invoice</th>
                                        <th class="text-center">Tgl. Order</th>
                                        <th class="text-center">Tanggal DO</th>
                                        <th class="text-center">Tgl. Invoice</th>
                                        <th class="text-center">Tgl. Jatuh Tempo</th>
                                        <th class="text-center">Draft</th>                              
                                        @if (Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 4)
                                            <th class="text-center">Approve</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($invoices) > 0 )
                                        @foreach ($invoices as $inv)
                                            <tr>
                                                <td class="text-center">{{ $inv->customer_email }}</td>
                                                <td class="text-center">INV-{{ $inv->invoice_number }}</td>
                                                <td class="text-center">{{ $inv->so_date }}</td>
                                                <td class="text-center">{{ $inv->do_date }}</td>
                                                @if (empty($inv->inv_date))
                                                    <td class="text-center" data-toggle="modal" data-target="#edit" data-inv-id="{{  $inv->id  }}">
                                                        <a href="#" >
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td class="text-center">{{ $inv->inv_date }}</td>
                                                @endif

                                                @if (empty($inv->due_date))
                                                    <td class="text-center" data-toggle="modal" data-target="#edit" data-inv-id="{{  $inv->id  }}">
                                                        <a href="#" >
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td class="text-center">{{ $inv->due_date }}</td>
                                                @endif

                                                <th class="text-center">
                                                    <a href="http://www.africau.edu/images/default/sample.pdf" target="_blank">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </th>

                                                @if (Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 4)
                                                    <td class="text-center">
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
        $('#dataTable').DataTable();
        
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