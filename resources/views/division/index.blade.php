
@extends('layouts.app')

@section('title')
    <title>Division</title>
@endsection

@section('custom-css')
   
@endsection

@section('content')
<div class="container-fluid">
        <!-- Page Heading -->
          <div class="row">
              <div class="col-md-4">
                  <a href="#" class="btn btn-primary btn-icon-split mt-4 mb-4">
                      <span class="icon text-white-50">
                          <i class="fas fa-flag"></i>
                      </span>
                      <span class="text">Master - Division</span>
                  </a>
              </div>
  
              <div class="col-md-4" >
  
              </div>
  
              <div class="col-md-4">
                  <a href="#" class="btn btn-success btn-icon-split mt-4 mb-4 float-right" data-toggle="modal" data-target="#create-division-modal">
                      <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
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
                      <th class="text-center">Division</th>
                      <th class="text-center">Code</th>
                      <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($divisions) > 0)
                      @foreach ($divisions as $division)
                        <tr>
                          <th class="text-center">{{ $division->name }}</th>
                          <th class="text-center">{{ $division->code }}</th>
                          <th>
                              <div class="row">
                                <div class="col-md-6 text-center">
                                    <a href="#" data-toggle="modal" data-target="#edit-division-modal" class="btn btn-primary btn-circle">
                                      <i class="fas fa-edit"></i>
                                    </a>
                                </div>

                                <div class="col-md-6 text-center">
                                  <a href="#" data-toggle="modal" data-target="#delete-division-modal" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>  
                                  </a>                        
                                </div>
                              </div>
                          </th>
                        </tr>
                      @endforeach       

                    @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
  
        <!-- Modal-->
        @include('division.modals.create')
        @include('division.modals.delete')
        @include('division.modals.edit')
      </div>
@endsection

@section('script')
   
@endsection