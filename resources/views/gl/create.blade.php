@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-4 ml-5">
                        <h4 class="modal-title"><strong>Buat General Ledger</strong></h4>                        
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
                <form action="{{ route('gl.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="company_id"><strong>Nama Pelanggan</strong></label>
                                <select name="company_id" id="company_id" class="form-control" required>
                                    <option value="" selected disabled>Pilih Pelanggan</option>
                                    @foreach ($companies as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="company_type">Jenis Perusahaan</label>
                                <input type="text" id="company_type" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="company_phone">Nomor Telepon</label>
                                <input type="text" id="company_phone" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="date">Tanggal Input GL</label>
                                <input type="date" name="date" id="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>                   
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="attachment">Attachment</label>
                                <input type="file" name="attachment" class="form-control" id="attachment">
                            </div>                                    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Keterangan</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                                    
                                </textarea>
                            </div>
                        </div>
                    </div>
                
                    <hr class="sidebar-divider">

                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger btn-block">
                                Cancel
                            </button>                        
                        </div>      
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success btn-block">
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
    var baseURL = window.location.origin;
    $('#company_id').select2();   

    $('#company_id').on('change', function() {
        var companyID = $(this).children('option:selected').val();
        console.log(companyID);
        $.get(baseURL+'/api/company/'+companyID, function(data,status) {
            console.log(data.type);

            if(data.type == 1) {
                companyType = "Jasa";
            } else {
                companyType = "Dagang";
            }

            $('#company_type').val(companyType);
            $('#company_phone').val(data.phone_number);
        })
    });

});

</script>
@endsection