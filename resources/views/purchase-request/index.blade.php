@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mt-1 mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Pesanan Pembelian</span>
                </a>
            </div>
            
            <div class="col-md-4">
            
            </div>

            <div class="col-md-2">
                <a href="{{ route('pr.export-excel')}}" class="btn btn-primary btn-icon-split mb-2 btn-block float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-file"></i>
                    </span>
                    <span class="text">Export</span>
                </a>                  
            </div>

            <div class="col-md-2">
                <a href="{{ route('pr.create') }}" class="btn btn-success btn-icon-split mb-2 btn-block float-right">
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

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                      <th width="10%" class="text-center">Nomor PR</th>
                                      <th width="" class="text-left">Nama Supplier</th>
                                      <th width="" class="text-left">ID Supplier</th>
                                      <th width="" class="text-left">Email Supplier</th>
                                      <th width="" class="text-center">Tanggal Order</th>
                                      <th width="" class="text-left">Alamat Penagihan</th>
                                      <th width="" class="text-center">Draft</th>
                                      <th width="" class="text-center">Detail</th>
                                      @if (Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 4)
                                        <th class="text-center">Approve</th>
                                      @endif
                                  </tr>
                                </thead>
                                <tbody>
                                  @if (count($purchaseRequests) > 0)
                                      @foreach ($purchaseRequests as $pr)
                                          <tr>
                                              <td class="text-center">{{ $pr->id}}</td>
                                              <td class="text-left">{{ $pr->customer_name }}</td>
                                              <td class="text-center">{{ $pr->customer_id }}</td>
                                              <td class="text-left">{{ $pr->customer_email }}</td>
                                              <td class="text-center">{{ $pr->order_date }}</td>
                                              <td class="text-left">{{ $pr->customer_address }}</td>
                                              <td class="text-center"><a href="http://www.africau.edu/images/default/sample.pdf" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                                              <td class="text-center">
                                                  <a href="#" data-toggle="modal" data-target="#detailSO" data-so-id={{ $pr->id }}>
                                                      <i class="fas fa-search"></i>
                                                  </a>
                                              </td>
                                              @if (Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 4)
                                             
                                              <td class="text-center small">
                                                  <a href="#" data-toggle="modal" data-target="#approve" data-so-id={{ $pr->id }}>
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
            {{-- modal  --}}
            @include('purchase-request.modals.create')
            {{-- @if (count($banks) > 0 )
                
            @endif --}}
            @include('purchase-request.modals.detail')
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        var baseURL = window.location.origin;

        $('#product_id').on('change', function() {
            var productID = $(this).children('option:selected').val();
            
            $.get(baseURL+'/api/product/'+productID, function(data, status){
                $('#product_price').val(data.price);
            });  
        });
    });
</script>
@endsection