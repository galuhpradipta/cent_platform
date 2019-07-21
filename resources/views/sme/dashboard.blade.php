@extends('layouts.app')

@section('title')
    <title>SME</title>
@endsection

@section('custom-css')
   
@endsection

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-3 mt-3 text-gray-800">Account Receivable</h1>
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Sales Order</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">5100</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-success text-uppercase mb-1">Delivery Order</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">521</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Pending Requests Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-md font-weight-bold text-warning text-uppercase mb-1">Invoice</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">211</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div> 
      </div>
      <!-- Pending Requests Card Example -->
      <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-md font-weight-bold text-warning text-uppercase mb-1">Uang Masuk</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div> 
      </div>

    </div>
    <h1 class="h3 mb-3 mt-3 text-gray-800">Account Payable</h1>
    <div class="row">
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Purchase Requisition</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">5100</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-md font-weight-bold text-success text-uppercase mb-1">Purchase Order</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">521</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Pending Requests Card Example -->
          <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-warning text-uppercase mb-1">Bukti Terima Barang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">211</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div> 
          </div>
          <!-- Pending Requests Card Example -->
          <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-warning text-uppercase mb-1">Uang Keluar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div> 
          </div>
    
        </div>
  </div>
  <!-- /.container-fluid -->
</div>
@endsection

@section('script')
   
@endsection