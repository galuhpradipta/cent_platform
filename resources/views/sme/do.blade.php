@extends('sme.layouts.app')

@section('title')
    <title>Account Receivable - Delivery Order</title>
@endsection

@section('custom-css')
   
@endsection

@section('content')
     <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
        <a href="#" class="btn btn-primary btn-icon-split mt-4 mb-4">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Account Receivable - Delivery Order</span>
        </a>

      <!-- DataTales Example -->
          <div class="card shadow mb-4">
           
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Nomor DO</th>
                      <th class="text-center">Nama Pelanggan</th>
                      <th class="text-center">Nomor SO</th>
                      <th class="text-center">Tanggal DO</th>
                      <th class="text-center">Approved By</th>
                      <th class="text-center">Draft</th>
                      <th class="text-center">Detail</th>
                    </tr>
                  </thead>   
                  
                  <tbody>
                      @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <th class="text-center">{{ $i }}</th>
                            <th>123123</th>
                            <th>Faiz Makmur</th>
                            <th>18127717</th>
                            <th>12-04-2019</th>
                            <th>Manager</th>
                            <th class="text-center"><a href="#"><i class="fas fa-file-pdf"></i></a></th>
                            <th class="text-center"><a href="#"><i class="fas fa-search"></i></a></th>
                        </tr>
                      @endfor   
                  </tbody>
                  
                </table>
              </div>
            </div>
          </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@section('script')
   
@endsection