@extends('layouts.app')

@section('title')
    <title>History</title>
@endsection

@section('custom-css')
   
@endsection

@section('content')
    @section('left-sidebar')
        @include('ent.admin.layouts.left-sidebar')
    @endsection
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
                      @for ($i = 1; $i <= 10; $i++)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>123123</td>
                            <td>123121</td>
                            <td>12331</td>
                            <td>Rp. 100.000</td>
                            <td>Direktur</td>
                            <td class="text-center"><a href="#"><i class="fas fa-file-pdf"></i></a></td>
                            <td class="text-center">
                                <a href="#" data-toggle="modal" data-target="#detailSO">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                      @endfor   
                  </tbody>
                  
                </table>
              </div>
            </div>
          </div>
    </div>
    <!-- /.container-fluid -->
    {{-- modal --}}
    @include('ent.admin.modals.detailSO')

@endsection

@section('script')
   
@endsection