@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mt-1 mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Jurnal</span>
                </a>
            </div>
            
            <div class="col-md-4">
            
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
                                <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="20%">Tanggal</th>
                                            <th width="20%">Akun</th>
                                            <th width="20%">Keterangan</th>
                                            <th width="20%">Credit</th>
                                            <th width="20%">Debit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($journals as $journal)
                                            <tr>
                                                <td>{{ $journal->date }}</td>
                                                <td>Mandiri</td>
                                                <td>
                                                    @if ($journal->type == 1)
                                                        Credit
                                                    @else
                                                        Debit
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($journal->type == 1)
                                                        Rp. {{ $journal->amount}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($journal->type == 2)
                                                        Rp. {{ $journal->amount}}
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>


    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();

     
    });
</script>
@endsection