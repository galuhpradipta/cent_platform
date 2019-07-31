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

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th class="text-center">Nomor SO</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">ID Pelanggan</th>
                    <th class="text-center">Alamat Penagihan</th>
                    <th class="text-center">Draft</th>
                    <th class="text-center">Detail</th>
                </tr>
              </thead>
              <tbody>
                @if (count($salesOrders) > 0)
                    @foreach ($salesOrders as $salesOrder)
                        <tr>
                            <td class="text-center">{{ $salesOrder->id}}</td>
                            <td class="text-center">{{ $salesOrder->customer->name }}</td>
                            <td class="text-center">{{ $salesOrder->customer->id }}</td>
                            <td class="text-center">{{ $salesOrder->customer->email }}</td>
                            <td class="text-center"><a href="http://www.africau.edu/images/default/sample.pdf" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                            <td class="text-center">
                                <a href="#" data-toggle="modal" data-target="#detailSO" data-so-id={{ $salesOrder->id }}>
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
               
                @for ($i = 0; $i < 10; $i++)
                    <tr>
                        
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
    var baseURL = window.location.origin;

    $('#product_id').on('change', function() {
      var productID = $(this).children('option:selected').val();
      
      $.get(baseURL+'/api/product/'+productID, function(data, status){
        $('#product_price').val(data.price);
      });  
    });

    $('#customer_id').on('change', function() {
      var customerID = $(this).children('option:selected').val()

      $.get(baseURL+'/api/customer/'+customerID, function(data,status) {
        $('#customer_id').val(data.id);
        $('#customer_email').val(data.email);
        $('#customer_address').val(data.address);
      });
    });

    $('#quantity').on('change', function() {
      
      var price = $('#product_price').val();
      var quantity = $('#quantity').val();
      var subtotalPrice = price * quantity;

      $('#subtotal_price').val(subtotalPrice);

      console.log(price, quantity);
    });

    $('#detailSO').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var salesOrderID = button.data('so-id');

            $.get(baseURL+'/api/sales-order/'+salesOrderID, function(data, status) {
              $('#detail-so-id').html(data.id);
              $('#detail-so-order-date').html(data.order_date);
              $('#detail-so-quantity').html(data.quantity);
              $('#detail-so-subtotal-price').html(data.subtotal_price);
              $('#detail-so-total').html(data.total);







              $.get(baseURL+'/api/product/'+data.product_id, function(data, status){
                console.log(data);
                $('#detail-product-name').html(data.name);
                $('#detail-product-price').html(data.price);
                
              });

              $.get(baseURL+'/api/customer/'+data.customer_id, function(data, status){
                $('#detail-customer-id').html(data.id);
                $('#detail-customer-name').html(data.name);
                $('#detail-customer-address').html(data.address);
              });
              
            })
        });
  });
</script>    
@endsection