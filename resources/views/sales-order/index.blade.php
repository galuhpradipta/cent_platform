@extends('layouts.new-app')

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

            <div class="col-md-2">
                <a href="{{ route('so.export-excel')}}" class="btn btn-primary btn-icon-split mb-2 btn-block float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-file"></i>
                    </span>
                    <span class="text">Export</span>
                </a>                  
            </div>

            <div class="col-md-2">
                <a href="{{ route('so.create') }}" class="btn btn-success btn-icon-split mb-2 btn-block float-right">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
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
            <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th width="10%" class="text-center">Nomor SO</th>
                    <th width="" class="text-left">Nama Pelanggan</th>
                    <th width="" class="text-left">ID Pelanggan</th>
                    <th width="" class="text-left">Email Pelanggan</th>
                    <th width="" class="text-center">Tanggal Order</th>
                    <th width="" class="text-left">Alamat Penagihan</th>
                    <th width="" class="text-center">Draft</th>
                    <th width="" class="text-center">Detail</th>
                    @if (Auth::user()->role == 'Supervisor')
                      <th class="text-center">Approve</th>
                    @endif
                </tr>
              </thead>
              <tbody>
                @if (count($salesOrders) > 0)
                    @foreach ($salesOrders as $salesOrder)
                        <tr>
                            <td class="text-center small">{{ $salesOrder->id}}</td>
                            <td class="text-left small">{{ $salesOrder->customer->name }}</td>
                            <td class="text-center small">{{ $salesOrder->customer->id }}</td>
                            <td class="text-left small">{{ $salesOrder->customer->email }}</td>
                            <td class="text-center small">{{ $salesOrder->order_date }}</td>
                            <td class="text-left small">{{ $salesOrder->customer->address }}</td>
                            <td class="text-center small"><a href="http://www.africau.edu/images/default/sample.pdf" target="_blank"><i class="fas fa-file-pdf"></i></a></td>
                            <td class="text-center small">
                                <a href="#" data-toggle="modal" data-target="#detail" data-so-id={{ $salesOrder->id }}>
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
        @include('sales-order.modals.detail')
        @include('sales-order.modals.approve')
      @endif

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    var baseURL = window.location.origin;

    $('#dataTable').DataTable();


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


    $('#detail').on('show.bs.modal', function(e) {

        var button = $(e.relatedTarget);
        var salesOrderID = button.data('so-id');

        $.get(baseURL+'/api/sales-order/'+salesOrderID, function(data, status) {

          $('#detail-customer-id').html(data[0].customer_id);
          $('#detail-customer-name').html(data[0].customer_name);
          $('#detail-customer-email').html(data[0].customer_email);
          $('#detail-customer-address').html(data[0].customer_address);
          $('#detail-so-id').html(data[0].id);
          $('#detail-so-order-date').html(data[0].order_date);
          $('#detail-so-quantity').html(data[0].quantity);
          $('#detail-so-subtotal-price').html(data[0].subtotal_price);
          $('#detail-so-total').html(data[0].total);
          $('#detail-so-file').attr('href', baseURL + '/storage/' + data[0].attachment_url);
          
          $.get(baseURL+'/api/sales-order/'+salesOrderID+'/products', function(data,status) {

            var detailProducts = $('#tableProducts > tbody');
            $.each(data, function(i, product) {
              detailProducts.append(
                  '<tr><td class="text-center">'+product.name+'</td><td class="text-center">'+product.unit+'</td><td class="text-center">'+product.quantity+'</td><td class="text-center">Rp. '+product.price+'</td></tr>'
              );

            })
          });

          $.get(baseURL+'/api/customer/'+data.customer_id, function(data, status){
            
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