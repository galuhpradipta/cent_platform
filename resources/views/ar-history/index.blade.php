@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">History Uang Masuk</span>
                </a>
            </div>

            <div class="col-md-4" >
            </div>

            <div class="col-md-4">
               
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
                                <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="10%">No. Pesanan</th>
                                                <th class="text-center" width="10%">No. Delivery</th>                                                                        
                                                <th class="text-center" width="10%">No. Invoice</th>
                                                <th class="text-right">Jumlah Uang Masuk</th>
                                                <th class="text-center">Approved By</th>
                                                <th class="text-center">Draft</th>
                                                <th class="text-center">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($incomes) > 0)
                                                @foreach ($incomes as $income)
                                                    <tr>
                                                        <td class="text-center">{{ $income->sales_order_id }}</td>
                                                        <td class="text-center">{{ $income->delivery_order_id }}</td>
                                                        <td class="text-center">{{ $income->invoice_id }}</td>
                                                        <td class="text-right">Rp. {{ $income->amount }}</td>
                                                        <td class="text-center">{{ $income->approved_by }}  <small>({{ $income->role }})</small></td>
                                                        <td class="text-center">
                                                            <a href="http://www.africau.edu/images/default/sample.pdf" target="_blank">
                                                                <i class="fas fa-file-pdf"></i>
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="#" data-toggle="modal" data-target="#detail">
                                                                <i class="fas fa-search"></i>
                                                            </a>
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
    </div>
@endsection