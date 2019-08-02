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
                <a href="#" class="btn btn-success btn-icon-split mt-1 mb-2 float-right" data-toggle="modal" data-target="#createBank">
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
                                        <th class="text-center">Balance</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                   @if (count($banks) > 0)
                                        @foreach ($banks as $bank)
                                            <td class="text-center">{{ $bank->name }}</td>
                                            <td class="text-center">{{ $bank->code }}</td>
                                            <td class="text-center">Rp. {{ $bank->balance }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-primary btn-block"
                                                    data-toggle="modal" data-target="#editBank"
                                                    data-bank-id="{{ $bank->id }}"
                                                    data-bank-name="{{ $bank->name }}"
                                                    data-bank-code="{{ $bank->code }}"
                                                    data-bank-balance="{{ $bank->balance }}">
                                                    Edit
                                                </button>
                                            </td>
                                        @endforeach
                                   @endif 
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        {{-- modal --}} 
        @include('bank.modals.create')
        @if (count($banks) > 0 )
            @include('bank.modals.edit')
        @endif
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#editBank').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var bankID = button.data('bank-id');
            var bankName = button.data('bank-code');
            var bankCode = button.data('bank-code');
            var bankBalance = button.data('bank-balance');
            console.log(bankID, bankName, bankCode, bankBalance);

            $('#fedit-id').val(bankID);
            $('#fedit-name').val(bankName);
            $('#fedit-code').val(bankCode);
            $('#fedit-balance').val(bankBalance);
        });
    })
</script>
@endsection