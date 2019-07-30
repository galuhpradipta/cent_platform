@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mt-1 mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Customer</span>
                </a>
            </div>

            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <a href="#" class="btn btn-success btn-icon-split mt-1 mb-2 float-right" data-toggle="modal" data-target="#createCustomer">
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
                                    @if (count($customers) > 0)
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td class="text-center">{{ $customer->name}}</td>
                                                <td class="text-center">{{ $customer->email }}</td>
                                                <td class="text-center">{{ $customer->phone_number }}</td>
                                                <td class="text-center">{{ $customer->address }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary">
                                                        Edit
                                                    </button>
    
                                                    <button class="btn btn-danger">
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
        @include('customer.modals.create')
    </div>

@endsection