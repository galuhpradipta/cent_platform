@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-fill btn-icon-split mt-1 mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Product</span>
                </a>
            </div>

            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <a href="#" class="btn btn-success btn-fill btn-icon-split mt-1 mb-2 float-right" data-toggle="modal" data-target="#createProduct">
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
                                        <th width="30%"><strong>Nama</strong></th>
                                        <th width="15%"><strong>Kode</strong></th>
                                        <th width="15%"><strong>Satuan</strong></th>
                                        <th width="20%" class="text-center"><strong>Harga Satuan</strong></th>
                                        <th width="10%"><strong>Edit</strong></th>
                                        <th width="10%" style="display:table-cell;"><strong>Delete</strong></th>                                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($products) > 0)
                                        @foreach($products as $product)
                                            <tr>
                                                <td class="text-left">{{ $product->name}}</td>
                                                <td class="text-left">{{ $product->code }}</td>
                                                <td class="text-left"> {{ $product->unit }}</td>
                                                <td class="text-right" style="margin-right": 10px !important;>Rp. {{ number_format((float)$product->price, 2, ',',  '.' ) }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary btn-sm btn-fill"
                                                        data-toggle="modal"
                                                        data-target="#editProduct"
                                                        data-product-id="{{ $product->id }}"
                                                        data-product-name="{{ $product->name }}"
                                                        data-product-code="{{ $product->code }}"
                                                        data-product-price="{{ $product->price }}"
                                                        >
                                                        Ubah
                                                        <i class="fas fa-edit"></i>
                                                    </button>                                                   
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm btn-fill"
                                                        data-toggle="modal"
                                                        data-target="#deleteProduct"
                                                        data-product-id={{ $product->id }}
                                                        >
                                                        Hapus
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
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
        {{-- modals --}}
        @include('product.modals.create')
        @if (count($products) > 0)
            @include('product.modals.edit')
            @include('product.modals.delete')

        @endif
        
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

        // $('#account_id').select2(
        //     width: 100% !important;
        // );

        $('#account_id').select2();

        $('#editProduct').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var productID = button.data('product-id');
            var name = button.data('product-name');
            var code = button.data('product-code');
            var price = button.data('product-price');

            console.log(productID, name, code, price);

            $('#fedit-id').val(productID);
            $('#fedit-name').val(name);
            $('#fedit-code').val(code);
            $('#fedit-price').val(price);
        });

        $('#deleteProduct').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var productID = button.data('product-id');

            $('#fdelete-id').val(productID);
        });
    });
</script>
@endsection

