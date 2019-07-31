@extends('layouts.app')

@section('content')
     <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Account Receivable - Sales Order</span>
                </a>
            </div>

            <div class="col-md-4" >

            </div>

            <div class="col-md-4">
                <a href="#" class="btn btn-success btn-icon-split mb-2 float-right" data-toggle="modal" data-target="#createSO">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Create</span>
                </a>
            </div>
        </div>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nomor SO</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">ID Pelanggan</th>
                    <th class="text-center">Alamat Penagihan</th>
                    <th class="text-center">Draft</th>
                    <th class="text-center">Detail</th>
                </tr>
              </thead>
              <tbody>
               
                @for ($i = 0; $i < 10; $i++)
                    <tr>
                        <th class="text-center"><small><strong>{{ $i + 1 }}</strong></small></th>
                        <th><small><strong>992811</strong></small></th>
                        <th><small><strong>Galuh Pradipta</strong></small></th>
                        <th><small><strong>122211</strong></small></th>
                        <th class="text-center"><small><strong>galuh@centbook.com</strong></small></th>
                        <th class="text-center"><a href="http://www.africau.edu/images/default/sample.pdf" target="_blank"><i class="fas fa-file-pdf"></i></a></th>
                        <th class="text-center">
                            <a href="#" data-toggle="modal" data-target="#detailSO">
                                <i class="fas fa-search">
                                </i>
                            </a>
                        </th>
                    </tr>
                @endfor
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Logout Modal-->
      @include('sales-order.modals.createSO')

      @include('sales-order.modals.detailSO')

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
<script>
  $(document).ready(function(){

    $('.js-example-basic-single').select2({
       
    });
  });
</script>    
@endsection