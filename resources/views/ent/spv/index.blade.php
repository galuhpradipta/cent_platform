@extends('layouts.app')

@section('title')
    <title>Dashboard</title>
@endsection

@section('custom-css')
   
@endsection

@section('left-sidebar')
  @include('ent.spv.layouts.left-sidebar')
@endsection

@section('navbar')
  @include('ent.spv.layouts.navbar')
@endsection

@section('navbar-title')
    Dashboard
@endsection

@section('content')
        {{-- Account Receiveable --}}
        <div class="d-sm-flex align-item-center justify-content-between mb-4 mt-4">
            <h1 class="h3 mb-0 text-gray-800">Account Receiveable</h1>
        </div>

        {{-- Sales Order  --}}
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sales Order</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 justify-content-between">321</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Delivery Order --}}
            <div class="col-xl-3 col-md-6">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Delivery Order</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">312</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Invoice --}}
            <div class="col-xl-3 col-md-6">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Invoice</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Uang Masuk --}}
            <div class="col-xl-3 col-md-6">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Uang Masuk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">432</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Account Receiveable --}}
        <div class="d-sm-flex align-item-center justify-content-between mb-4 mt-4">
                <h1 class="h3 mb-0 text-gray-800">Account Payable</h1>
            </div>
    
        {{-- Purchase Request --}}
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Purchase Request</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 justify-content-between">122</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Purchase Order --}}
            <div class="col-xl-3 col-md-6">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Purchase Order</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bukti Terima --}}
            <div class="col-xl-3 col-md-6">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bukti Terima</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Uang Keluar --}}
            <div class="col-xl-3 col-md-6">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Uang Keluar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">112</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection