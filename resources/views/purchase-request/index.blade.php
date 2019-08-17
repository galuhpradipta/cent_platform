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
            
            <div class="col-md-6">
            
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
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nomor PR</th>
                                        <th class="text-center">Tanggal PR</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Subtotal</th>
                                        <th class="text-center">Draft</th> 
                                        <th class="text-center">Detail</th>                                       
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- @if (count($purchaseRequests) > 0) --}}
                                        {{-- @foreach ($banks as $bank) --}}
                                            <tr>
                                                <td class=" text-center small">1</td>
                                                <td class=" text-center small">120</td>
                                                <td class=" text-center small">2019-04-12</td>
                                                <td class=" text-center small">Web Develop</td>
                                                <td class=" text-center small">Jasa</td>
                                                <td class=" text-center small">Rp. 10000000</td>
                                                <td class=" text-center small">
                                                    <a href="http://www.africau.edu/images/default/sample.pdf" target="_blank">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center small"> 
                                                    <a href="#" data-toggle="modal" data-target="#detail">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </td>


                                            </tr>
                                        {{-- @endforeach --}}
                                {{-- @endif  --}}
                                
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