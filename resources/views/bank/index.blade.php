@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-fill btn-icon-split mt-1 mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Customer</span>
                </a>
            </div>

            <div class="col-md-4">

            </div>

            <div class="col-md-4">
                <a href="#" class="btn btn-success btn-fill btn-icon-split mt-1 mb-2 float-right" data-toggle="modal" data-target="#createBank">
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
                                        <th width="25%">Nama</th>
                                        <th width="15%">Kode</th>
                                        <th width="10%">Kategori</th>
                                        <th width="15%" class="text-right">Saldo Awal</th>
                                        <th width="15%" class="text-right">Saldo</th>
                                        <th width="10%" class="text-right" style="display: table-cell;">Edit</th>
                                    </tr>
                                </thead>

                                <tbody>
                                   @if (count($banks) > 0)
                                        @foreach ($banks as $bank)
                                            <tr>
                                                <td class="text-left">{{ $bank->name }}</td>
                                                <td class="text-left">{{ $bank->code }}</td>
                                                <td class="text-left">{{ $bank->category }}</td>
                                                <td class="text-right">Rp. {{ $bank->initial_balance }}</td>
                                                <td class="text-right">Rp. {{ $bank->balance }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary btn-fill btn-sm"
                                                        data-toggle="modal" data-target="#editBank"
                                                        data-bank-id="{{ $bank->id }}"
                                                        data-bank-name="{{ $bank->name }}"
                                                        data-bank-code="{{ $bank->code }}"
                                                        data-bank-balance="{{ $bank->balance }}">
                                                        Ubah
                                                        <i class="fas fa-edit"></i>
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
        $('#dataTable').DataTable();

        $('#editBank').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var bankID = button.data('bank-id');
            var bankName = button.data('bank-name');
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