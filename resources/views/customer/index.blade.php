@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-fill btn-icon-split mt-1 mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Pelanggan</span>
                </a>
            </div>

            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <a href="#" class="btn btn-success btn-fill btn-icon-split mt-1 mb-2 float-right" data-toggle="modal" data-target="#myModal1">
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
                                        <th width="20%" class="text-center">Name</th>
                                        <th width="20%" class="text-center">Email</th>
                                        <th width="10%" class="text-center">Phone Number</th>
                                        <th width="35%" class="text-center">Address</th>
                                        <th width="15%" class="text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($customers) > 0)
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td class="text-left">{{ $customer->name}}</td>
                                                <td class="text-left">{{ $customer->email }}</td>
                                                <td class="text-left">{{ $customer->phone_number }}</td>
                                                <td class="text-left small">{{ $customer->address }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-primary btn-fill"
                                                    data-toggle="modal"
                                                    data-target="#editCustomer"
                                                    data-customer-id="{{ $customer->id }}"
                                                    data-customer-name="{{ $customer->name }}"
                                                    data-customer-email="{{ $customer->email }}"
                                                    data-customer-phone-number="{{ $customer->phone_number }}"
                                                    data-customer-address="{{ $customer->address }}"
                                                    >
                                                        Ubah
                                                        <i class="fas fa-edit"></i>
                                                    </button>                                                   
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-danger btn-fill"
                                                    data-toggle="modal"
                                                    data-target="#deleteCustomer"
                                                    data-customer-id={{ $customer->id }}
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
        @include('customer.modals.create')
        @if (count($customers) > 0)
            @include('customer.modals.edit')
            @include('customer.modals.delete')
        @endif
        
    </div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#editCustomer').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var id = button.data('customer-id');
            var name = button.data('customer-name');
            var email = button.data('customer-email');
            var phone_number = button.data('customer-phone-number');
            var address = button.data('customer-address');

            $('#fedit-id').val(id);
            $('#fedit-name').val(name);
            $('#fedit-email').val(email);
            $('#fedit-phone-number').val(phone_number);
            $('#fedit-address').val(address);
        });

        $('#deleteCustomer').on('shown.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var customerID = button.data('customer-id');
            console.log(customerID);
            $('#fdelete-id').val(customerID);
        });
    });
</script>
@endsection

