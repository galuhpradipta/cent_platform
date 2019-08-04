@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mt-1 mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Supplier</span>
                </a>
            </div>

            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <a href="#" class="btn btn-success btn-icon-split mt-1 mb-2 float-right" data-toggle="modal" data-target="#create">
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
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Phone Number</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($suppliers) > 0)
                                        @foreach($suppliers as $supplier)
                                            <tr>
                                                <td class="text-center">{{ $supplier->name}}</td>
                                                <td class="text-center">{{ $supplier->email }}</td>
                                                <td class="text-center">{{ $supplier->phone_number }}</td>
                                                <td class="text-center">{{ $supplier->address }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary"
                                                    data-toggle="modal"
                                                    data-target="#edit"
                                                    data-supplier-id="{{ $supplier->id }}"
                                                    data-supplier-name="{{ $supplier->name }}"
                                                    data-supplier-email="{{ $supplier->email }}"
                                                    data-supplier-phone-number="{{ $supplier->phone_number }}"
                                                    data-supplier-address="{{ $supplier->address }}"
                                                    >
                                                        Edit
                                                    </button>
    
                                                    <button class="btn btn-danger"
                                                    data-toggle="modal"
                                                    data-target="#delete"
                                                    data-supplier-id={{ $supplier->id }}
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
        @include('supplier.modals.create')
        @if (count($suppliers) > 0)
            @include('supplier.modals.edit')
            @include('supplier.modals.delete')
        @endif
        
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#edit').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var id = button.data('supplier-id');
            var name = button.data('supplier-name');
            var email = button.data('supplier-email');
            var phone_number = button.data('supplier-phone-number');
            var address = button.data('supplier-address');

            $('#fedit-id').val(id);
            $('#fedit-name').val(name);
            $('#fedit-email').val(email);
            $('#fedit-phone-number').val(phone_number);
            $('#fedit-address').val(address);
        });

        $('#delete').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var supplierID = button.data('supplier-id');

            $('#fdelete-id').val(supplierID);
        });
    });
</script>
@endsection

