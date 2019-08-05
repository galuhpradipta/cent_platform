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
                    <span class="text">Pesanan Penjualan</span>
                </a>
            </div>

            <div class="col-md-4" >

            </div>

            <div class="col-md-4">
                <a href="#" class="btn btn-success btn-icon-split mb-2 float-right" data-toggle="modal" data-target="#createSO">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Buat</span>
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
                    <th class="text-center small font-weight-bold">Nomor SO</th>
                    <th class="text-center small font-weight-bold">Nama Pelanggan</th>
                    <th class="text-center small font-weight-bold">ID Pelanggan</th>
                    <th class="text-center small font-weight-bold">Email Pelanggan</th>
                    <th class="text-center small font-weight-bold">Tanggal Order</th>
                    <th class="text-center small font-weight-bold">Alamat Penagihan</th>
                    <th class="text-center small font-weight-bold">Draft</th>
                    <th class="text-center small font-weight-bold">Detail</th>
                    @if (Auth::user()->role == 'Supervisor')
                      <th class="text-center small font-weight-bold">Approve</th>
                    @endif
                </tr>
              </thead>
              <tbody>
                @if (count($salesOrders) > 0)
                    @foreach ($salesOrders as $salesOrder)
                        <tr>
                            <td class="text-center small">{{ $salesOrder->id}}</td>
                            <td class="text-center small">{{ $salesOrder->customer->name }}</td>
                            <td class="text-center small">{{ $salesOrder->customer->id }}</td>
                            <td class="text-center small">{{ $salesOrder->customer->email }}</td>
                            <td class="text-center small">{{ $salesOrder->order_date }}</td>
                            <td class="text-center small">{{ $salesOrder->customer->address }}</td>
                            <td class="text-center small"><a href="http://www.africau.edu/images/default/sample.pdf" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                            <td class="text-center small">
                                <a href="#" data-toggle="modal" data-target="#detailSO" data-so-id={{ $salesOrder->id }}>
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                            @if (Auth::user()->role == 'Supervisor')
                           
                            <td class="text-center small">
                                <a href="#" data-toggle="modal" data-target="#approve" data-so-id={{ $salesOrder->id }}>
                                    <i class="fas fa-check"></i>
                                </a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                @endif             
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- modal --}}
      @include('sales-order.modals.createSO')

      @if (count($salesOrders) > 0)
        @include('sales-order.modals.detailSO')
        @include('sales-order.modals.approve')
      @endif

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
        $('#product_unit').val(data.unit);
      });  
    });

    $('#customer_id').on('change', function() {
      var customerID = $(this).children('option:selected').val();

      $.get(baseURL+'/api/customer/'+customerID, function(data,status) {
        $('#customer_email').val(data.email);
        $('#customer_address').val(data.address);
      });
    });

    $('#bank_id').on('change', function() {
      var bankID = $(this).children('option:selected').val();

      $.get(baseURL+'/api/bank/'+bankID, function(data, status) {
        $('#bank_name').val(data.name);
        $('#bank_code').val(data.code);
      });

      console.log(bankID);
    });

    $('#quantity').on('input', function() {     
      var price = $('#product_price').val();
      var quantity = $('#quantity').val();
      var subtotalPrice = price * quantity;
      var ppn = subtotalPrice * 0.1;
      // var totalPrice = (price * quantity - discount);

      $('#subtotal_price').val(subtotalPrice);
      $('#ppn').val(ppn);
    });

    $('#discount').on('input', function() {
      // var price = $('#product_price').val();
      // var quantity = $('#quantity').val();
      // var discount = $('#discount').val();
      // var subtotalPrice = $('#subtotal_price').val();
      // var totalPrice =  $('#total').val();
      // totalPrice = totalPrice - discount;

      // $('#total').val(totalPrice);
    });

    $('#down_payment').on('input', function() {
      var subtotalPrice = $('#subtotal_price').val();
      var ppn = $('#ppn').val();
      var discount = $('#discount').val();
      var downPayment = $('#down_payment').val();
      var totalPrice = (parseFloat(subtotalPrice) + parseFloat(ppn)) - parseFloat(discount) - parseFloat(downPayment);

      $('#total').val(totalPrice);
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
          $('#detail-so-file').attr('href', baseURL + '/storage/' + data.attachment_url);
          $.get(baseURL+'/api/product/'+data.product_id, function(data, status){
            console.log(data);
            $('#detail-product-name').html(data.name);
            $('#detail-product-unit').html(data.unit);
            $('#detail-product-price').html(data.price);
            
          });
          $.get(baseURL+'/api/customer/'+data.customer_id, function(data, status){
            $('#detail-customer-id').html(data.id);
            $('#detail-customer-name').html(data.name);
            $('#detail-customer-email').html(data.email);
            $('#detail-customer-address').html(data.address);
          });
          
        })
    });

    $('#approve').on('show.bs.modal', function(e) {
      var button =  $(e.relatedTarget);
      var salesOrderID = button.data('so-id');

      console.log(salesOrderID);
      $('#approve_sales_order_id').val(salesOrderID); 
    });

    $('input.number').keyup(function(event) {
    // skip for arrow keys
      if(event.which >= 37 && event.which <= 40) return;

      // format number
      $(this).val(function(index, value) {
        return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        ;
      });
    });
  });
</script>    
@endsection