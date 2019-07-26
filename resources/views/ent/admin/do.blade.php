@extends('layouts.app')

@section('title')
    <title>Account Receivable - Sales Order</title>
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
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mt-4 mb-4">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Account Receivable - Sales Order</span>
                </a>
            </div>

            <div class="col-md-4" >
            </div>
            
            <div class="col-md-4">
                <a href="#" class="btn btn-success btn-icon-split mt-4 mb-4 float-right" data-toggle="modal" data-target="#createSO">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Create</span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
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
                          @for ($i = 1; $i < 11; $i++)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">123123</td>
                                <td class="text-center">Faiz Makmur</td>
                                <td class="text-center">18127717</td>
                                <td class="text-center">12-04-2019</td>
                                <td class="text-center">Manager</td>
                                <td class="text-center"><a href="#"><i class="fas fa-file-pdf"></i></a></td>
                                <td class="text-center"><a href="#"><i class="fas fa-search"></i></a></td>
                            </tr>
                          @endfor   
                      </tbody>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    {{-- modal --}}
    @include('ent.admin.modals.createSO')
@endsection

@section('script')
   
@endsection