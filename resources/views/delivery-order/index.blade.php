@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Pesanan Penjualan</span>
                </a>
            </div>

            <div class="col-md-4" >
            </div>

            <div class="col-md-4">
                {{-- <a href="#" class="btn btn-success btn-icon-split mb-2 float-right" data-toggle="modal" data-target="#createSO">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Buat</span>
                </a> --}}
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

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-left">Email</th>
                                        <th class="text-center">No. Delivery</th>
                                        <th class="text-center">No. Pesanan</th>
                                        <th class="text-center">Tanggal Pesanan</th>
                                        <th class="text-center">Tanggal Delivery</th>
                                        <th class="text-center">Disetujui Oleh</th>
                                        <th class="text-center">Draft</th>
                                        @if (Auth::user()->role == 2  || Auth::user()->role == 3 || Auth::user()->role == 4)
                                            <th class="text-center">Approve</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($deliveryOrders) > 0 )
                                        @foreach ($deliveryOrders as $do)
                                            <tr>
                                                <td class="text-left">{{ $do->customer_email }}</td>
                                                <td class="text-center">{{ $do->id }}</td>
                                                <td class="text-center">{{ $do->sales_order_id }}</td>
                                                <td class="text-center">{{ $do->so_date }}</td>
                                                @if (empty($do->delivery_date))
                                                    <td class="text-center" data-toggle="modal" data-target="#edit" data-do-id="{{  $do->id  }}">
                                                        <a href="#" >
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td class="text-center">{{ $do->delivery_date }}</td>
                                                @endif
                                                <td class="text-center">{{ $do->approved_by }} <small class="italic">({{ $do->role }})</small></td>
                                                <td class="text-center">
                                                    <a href="http://www.africau.edu/images/default/sample.pdf" target="_blank">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </td>
                                                @if (Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 4)
                                                    <td class="text-center">
                                                        <a href="#" class="" data-toggle="modal" data-target="#approve" data-do-id="{{ $do->id }}">
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

        @if (count($deliveryOrders) > 0)
            @include('delivery-order.modals.edit')
            @include('delivery-order.modals.approve')
        @endif
        
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#dataTable').DataTable();

        $('#edit').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var deliveryID = button.data('do-id');
            $('#do_id').val(deliveryID);
        });


        $('#approve').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var deliveryID = button.data('do-id');
           
            $('#approve_delivery_order_id').val(deliveryID);
        });
    });
</script>
@endsection