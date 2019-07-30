@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mt-1 mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Product</span>
                </a>
            </div>

            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <a href="#" class="btn btn-success btn-icon-split mt-1 mb-2 float-right" data-toggle="modal" data-target="#createProduct">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Create</span>
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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Price (Rp.)</th>
                                        <th class="text-center">Action</th>                                    
                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($products) > 0)
                                        @foreach($products as $product)
                                            <tr>
                                                <td class="text-center">{{ $product->name}}</td>
                                                <td class="text-center">{{ $product->code }}</td>
                                                <td class="text-center">{{ $product->price }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#editProduct"
                                                    data-product-id="{{ $product->id }}"
                                                    data-product-name="{{ $product->name }}"
                                                    data-product-code="{{ $product->code }}"
                                                    data-product-price="{{ $product->price }}"
                                                    >
                                                    Edit
                                                    </button>
    
                                                    <button class="btn btn-danger"
                                                    data-toggle="modal"
                                                    data-target="#deleteProduct"
                                                    data-product-id={{ $product->id }}
                                                    >
                                                    Delete
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

