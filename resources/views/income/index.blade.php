@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Uang Masuk</span>
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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="small text-center font-weight-bold" width="8%">No. SO</th>
                                        <th class="small text-center font-weight-bold" width="8%">No. DO</th>
                                        <th class="small text-center font-weight-bold" width="8%">No. Inv</th>
                                        <th class="small text-center font-weight-bold" width="15%">Jml. Uang Masuk</th>
                                        <th class="small text-center font-weight-bold" width="15%">Kas</th>
                                        <th class="small text-center font-weight-bold" width="15%">Tanggal Uang Masuk</th>
                                        <th class="small text-center font-weight-bold" width="10%">Draft</th>
                                        <th class="small text-center font-weight-bold" width="10%">Detail</th>                                    
                                        @if (Auth::user()->role == 'Supervisor')
                                            <th class="small text-center" width="10%">Approve</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($incomes) > 0)
                                        @foreach ($incomes as $income)
                                            <tr>
                                                <td class="small text-center">{{ $income->sales_order_id }}</td>
                                                <td class="small text-center">{{ $income->delivery_order_id }}</td>
                                                <td class="small text-center">{{ $income->invoice_id }}</td>
                                                @if (empty($income->amount))
                                                    <td class="small text-center" data-toggle="modal" data-target="#edit" data-income-id="{{  $income->id  }}">
                                                        <a href="#" >
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td class="small text-center">{{ $income->amount }}</td>
                                                @endif
                                                <td class="small text-center">{{ $income->salesOrder->bank->name }}</td>
                                                @if (empty($income->income_date))
                                                    <td class="small text-center" data-toggle="modal" data-target="#edit" data-income-id="{{  $income->id  }}">
                                                        <a href="#" >
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td class="small text-center">{{ $income->income_date }}</td>
                                                @endif
                                                <td class="small text-center">
                                                    <a href="http://www.africau.edu/images/default/sample.pdf" target="_blank">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </td>
                                                <td class="small text-center">
                                                    <a href="#" data-toggle="modal" data-target="#detail" data-income-id="{{ $income->id }}">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </td>
                                                @if (Auth::user()->role == 'Supervisor')
                                                <td class="text-center">
                                                    <a href="#" class="" data-toggle="modal" data-target="#approve" data-income-id="{{ $income->id }}">
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
        </div>
        {{-- modal --}}
        @if (count($incomes) > 0)
            @include('income.modals.edit')
            @include('income.modals.approve')
            @include('income.modals.detail')
        @endif
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#edit').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var incomeID = button.data('income-id');
            
            $('#income_id').val(incomeID);
        });

        $('#approve').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var incomeID = button.data('income-id');
           
            $('#approve_income_id').val(incomeID);
        });
    });
</script>
@endsection