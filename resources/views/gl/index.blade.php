@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mt-1 mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">General Ledger</span>
                </a>
            </div>
            
            <div class="col-md-6">
            
             </div>

            <div class="col-md-2">
                <a href="{{ route('gl.create') }}" class="btn btn-success btn-icon-split mb-2 btn-block float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Buat</span>
                </a>
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
                                        {{-- <tr>
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
                                        </tr> --}}
                                        <tr>
                                            <th class="text-center" width="20%">Nama Perusahaan</th>
                                            <th class="text-center" width="20%">Jenis Perusahaan</th>
                                            <th class="text-center" width="25%">Notes</th>
                                            <th class="text-center" width="15%">Tanggal Laporan</th>
                                            <th class="text-center" width="10%">Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($generalLedgers) > 0)
                                            @foreach ($generalLedgers as $gl)
                                               <tr>
                                                    <td class="text-center">{{ $gl->name }}</td>
                                                    <td class="text-center">                                                       
                                                        @if ($gl->type == 1)
                                                            Jasa
                                                        @else
                                                            Dagang 
                                                        @endif
                                                    </td>
                                                    <td class="text-center">{{ $gl->description }}</td>
                                                    <td class="text-center">{{ $gl->date }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ URL::to('/storage') }}/{{ $gl->attachment_url }}">
                                                            <i class="fas fa-file"></i>
                                                        </a>
                                                    </td>
                                               </tr>
                                            @endforeach
                                            
                                        @endif
                                        {{-- @if (count($purchaseOrders) > 0 )
                                            @foreach ($purchaseOrders as $po)
                                                <tr>
                                                    <td class="text-left">{{ $po->supplier_email }}</td>
                                                    <td class="text-center">{{ $po->id }}</td>
                                                    <td class="text-center">{{ $po->purchase_request_id }}</td>
                                                    <td class="text-center">{{ $po->pr_date }}</td>
                                                    @if (empty($po->delivery_date))
                                                        <td class="text-center" data-toggle="modal" data-target="#edit" data-po-id="{{  $po->id  }}">
                                                            <a href="#" >
                                                                <i class="fas fa-plus"></i>
                                                            </a>
                                                        </td>
                                                    @else
                                                        <td class="text-center">{{ $po->delivery_date }}</td>
                                                    @endif
                                                    <td class="text-center">{{ $po->approved_by }} <small class="italic">({{ $po->role }})</small></td>
                                                    <td class="text-center">
                                                        <a href="http://www.africau.edu/images/default/sample.pdf" target="_blank">
                                                            <i class="fas fa-file-pdf"></i>
                                                        </a>
                                                    </td>
                                                    @if (Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 4)
                                                        <td class="text-center">
                                                            <a href="#" class="" data-toggle="modal" data-target="#approve" data-po-id="{{ $po->id }}">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>                
               
            </div>


    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

        // $('#edit').on('show.bs.modal', function(e) {
        //     var button = $(e.relatedTarget);

        //     var deliveryID = button.data('po-id');
           
        //     $('#po_id').val(deliveryID);
        // });


        // $('#approve').on('show.bs.modal', function(e) {
        //     var button = $(e.relatedTarget);

        //     var deliveryID = button.data('po-id');
           
        //     $('#approve_purchase_order_id').val(deliveryID);
        // });
    });
</script>
@endsection