@extends('sme.layouts.app')

@section('title')
    <title>History</title>
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
            <span class="text">Account Receivable - History</span>
        </a>

      <!-- DataTales Example -->
          <div class="card shadow mb-4">
           
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nomor Invoice</th>
                      <th>Nomor DO</th>
                      <th>Nomor SO</th>
                      <th>Jumlah Uang Masuk</th>
                      <th>Approved By</th>
                      <th>Draft</th>
                      <th>Detail</th>
                    </tr>
                  </thead>   
                  
                  <tbody>
                      @for ($i = 0; $i < 10; $i++)
                        <tr>
                            <th class="text-center">{{ $i }}</th>
                            <th>123123</th>
                            <th>123121</th>
                            <th>12331</th>
                            <th>Rp. 100.000</th>
                            <th>Direktur</th>
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