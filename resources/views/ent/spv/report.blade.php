@extends('layouts.app')

@section('title')
    <title>Report</title>
@endsection

@section('custom-css')
   
@endsection


@section('content')
    @section('left-sidebar')
        @include('ent.spv.layouts.left-sidebar')
    @endsection

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mt-4 mb-4">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Dashboard - Report</span>
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
                        <th class="text-center">Name</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @for ($i = 0; $i < 5; $i++)
                    <tr>
                        <td class="text-center">Galuh Pradipta</td>
                        <td class="text-center">Jalan Perjuangan</td>
                        <td class="text-center">081210521220</td>
                        <td class="text-center">galuh@freefolks.id</td>
                        <td class="text-center">Admin</td>
                        <td class="text-center">Test</td>
                    </tr> 
                    @endfor                            
  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
@endsection

@section('scripts')

@endsection