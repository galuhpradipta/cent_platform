@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-4 ml-5">
                        <h4 class="modal-title"><strong>Buat Jurnal Umum</strong></h4>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div> 
            @endif

            <div class="card-body">
            <hr class="sidebar-divider">
                <form action="{{ route('gl-cent.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="transaction_number">No. Transaksi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend" style="padding-top:5px;">
                                        <span class="input-group-text">INV-</span>
                                    </div>
                                    <input type="text" class="form-control" name="transaction_number" id="transaction_number" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="transaction_date">No. Transaksi</label>
                                <input type="date" class="form-control" name="transaction_date" id="transaction_date" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tag">Tag</label>
                                <input type="text" class="form-control" name="tag" id="tag">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left" width="30%"><strong>Akun</strong></th>
                                            <th class="text-left" width="30%"><strong>Deskripsi</strong></th>
                                            <th class="text-center" width="15%"><strong>Debit</strong></th>
                                            <th class="text-center" width="15%"><strong>Credit</strong></th>
                                            <th width="8%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-success" id="addLedger">
                                <i class="fas fa-plus"></i>
                                <span>Tambah</span>                                    
                            </button>
                        </div> 
                    </div>

                    <div class="row">
                      

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <input type="file" name="attachment" class="form-control" id="attachment">
                            </div>                                    
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="memo">Memo</label>
                                <textarea class="form-control" name="memo" id="memo">
                                    
                                </textarea>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total_debit">Total Debit</label>
                                <input type="number" class="text-right form-control" id="total_debit" name="total_debit" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="total_credit">Total Credit</label>
                                <input type="number" class="text-right form-control" id="total_credit" name="total_credit" readonly>
                            </div>
                        </div>
                    </div>


                    <hr class="sidebar-divider">

                    <div class="row">
                        <div class="col-md-10">
                        </div>
                        
                        <div class="col-md-2">
                            <button class="btn btn-success btn-block">
                                Submit
                            </button>
                        </div>
                    </div>
                            

                    


                </form>
            </div>
            
        </div>

    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        var count = 1;
        dynamic_table(count);

        function dynamic_table(number) {
            var html = '<tr id="ledger_row">';
            html += '<td><select name="account_ids[]" id="account_id'+count+'" class="form-control" required><option id="account_option" selected disabled>Pilih Akun</option>@foreach($accounts as $account) <option value="{{ $account->id}}">{{ $account->name }}</option> @endforeach</select></td>';
            html += '<td><input type="text" id="description'+count+'" class="form-control" name="descriptions[]" required></td>';
            html += '<td><input type="number" id="debit_amount'+count+'" class="text-right form-control debit_amount" name="debit_amounts[]" value="0" required></td>';
            html += '<td><input type="number" id="credit_amount'+count+'" class="text-right form-control credit_amount" name="credit_amounts[]" value="0" required></td>';

            if (number > 1) {
                html += '<td><button type="button" id="removeLedger" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>';
                html += '</tr>';
                $('tbody').append(html);
            } else {
                html += '</tr>';
                $('tbody').html(html);
            }
        }

        $('#addLedger').click(function() {
            count++;
            dynamic_table(count);
        });

        $(document).on('click', '#removeLedger', function() {
            count--;
            $(this).closest('#ledger_row').remove();
        });


        $(document).on('input', '[id^=credit_amount]', function() {
            var credit_amount_id =  event.target.id.slice(13);

            var total_credit = 0;

            credit_amount = parseFloat($('#credit_amount'+credit_amount_id).val());

            $('.credit_amount').each(function() {
                total_credit += parseFloat($(this).val());
            });

            $('#total_credit').val(total_credit);
        });

        $(document).on('input', '[id^=debit_amount]', function() {
            var debit_amount_id =  event.target.id.slice(12);

            var total_debit = 0;

            debit_amount = $('#debit_amount'+debit_amount_id).val();

            $('.debit_amount').each(function() {
                total_debit += parseFloat($(this).val());
            });

            $('#total_debit').val(total_debit);
        });

        $('body').on('DOMNodeInserted', 'select', function () {
            $(this).select2();
        });

        
    });
</script>

@endsection