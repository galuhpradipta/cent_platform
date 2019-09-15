@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-title">
                <div class="row">
                    <div class="col-md-4 ml-5">
                        <h4 class="modal-title"><strong>Buat Pesanan Penjualan Baru</strong></h4>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first() }}
                </div> 
            @endif
            
            <div class="card-body">
                
                <hr class="sidebar-divider">
                    <form action="{{ route('so.store')}}" method="POST" enctype="multipart/form-data" id="soForm">
                        @csrf
                        <div class="body">                            
                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="customer_id">Nama Pelanggan</label>
                                        <select name="customer_id" id="customer_id" class="form-control" required>
                                            <option selected disabled>Pilih Pelanggan</option>
                                            @foreach ($customers as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="customer_id">Email</label>
                                        <input type="text" class="form-control" id="customer_email" placeholder="ID Pelanggan" readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="customer_phone">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="customer_phone" placeholder="ID Pelanggan" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                {{-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="account_id">Akun</label>
                                        <select name="account_id" id="account_id" class="form-control" required>
                                            <option selected disabled>Pilih Akun</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="account_code">Kode Akun</label>
                                        <input type="text" id="account_code" class="form-control" readonly> 
                                    </div>
                                </div> --}}

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="invoice_number">Nomor Invoice</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend" style="padding-top:5px;">
                                                <span class="input-group-text">INV-</span>
                                            </div>
                                            <input type="text" id="invoice_number" name="invoice_number" class="text-left form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="order_date">Tanggal Order</label>
                                        <input type="date" name="order_date" class="form-control" id="order_date" value="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" width="30%"><strong>Produk</strong></th>
                                                    <th class="text-center" width="10%"><strong>Satuan</strong></th>
                                                    <th class="text-center" width="25%"><strong>Harga Satuan</strong></th>
                                                    <th class="text-center" width="10%"><strong>Qty</strong></th>
                                                    <th class="text-center" width="25%"><strong>Subtotal Produk</strong></th>
                                                    <th width="8%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                
                            </div>

                            <div class="form-row">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-success" id="addProduct">
                                        <i class="fas fa-plus"></i>
                                        <span>Tambah</span>                                    
                                    </button>
                                </div>
                            </div>

                            <div class="row">    
                                <div class="col-md-9"></div>                                                    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="subtotal_price">Subtotal</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" name="subtotal_price" id="subtotal_price" step="any" class="form-control" placeholder="0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="sidebar-divider">


                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="discount">Diskon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" id="discount" name="discount" step="any" class="text-right form-control" placeholder="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="down_payment">Uang Muka</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" id="down_payment" name="down_payment" step="any" class="text-right form-control" placeholder="0">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                
                                </div>                                
                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="attachment">Attachment</label>
                                        <input type="file" name="attachment" class="form-control" id="attachment">
                                    </div>                                    
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Keterangan</label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                                            
                                        </textarea>
                                    </div>
                                </div>
                    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="total_price">Total</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" name="total_price" id="total_price" step="any" class="form-control" placeholder="0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="sidebar-divider">

                            <div class="row">
                                <div class="col-md-8">

                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('so.index') }}" class="btn btn-danger btn-block">Cancel</a>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success btn-block">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            
                            
                        </div>
                    </form>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    var baseURL = window.location.origin;
    var companyID = '{{ Auth::user()->business_id }}';

    $('#customer_id').select2();
    $('#account_id').select2();


    $('#customer_id').on('change', function() {
      var customerID = $(this).children('option:selected').val();
      $.get(baseURL+'/api/customer/'+customerID, function(data,status) {
        $('#customer_email').val(data.email);
        $('#customer_address').val(data.address);
        $('#customer_phone').val(data.phone_number);
      });
    });

    $('#account_id').on('change', function() {
      var bankID = $(this).children('option:selected').val();

      $.get(baseURL+'/api/bank/'+bankID, function(data, status) {
        $('#account_name').val(data.name);
        $('#account_code').val(data.code);
      });

    });
    
    var count = 1;
    dynamic_table(count);

    function dynamic_table(number) {
        var html = '<tr id="product_row">';
        html += '<td><select name="product_ids[]" id="product_id'+count+'" class="form-control" required><option id="product_option" selected disabled>Pilih Produk</option>@foreach($products as $product) <option value="{{ $product->id }}">{{ $product->name }}</option>  @endforeach</select></td>';
        html += '<td><input type="text" id="unit'+count+'" class="text-center form-control" readonly></td>';
        html += '<td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Rp.</span></div><input type="number" id="price_per_unit'+count+'" class="text-right form-control" placeholder="0" readonly></div></td>';
        html += '<td><input type="number" name="quantities[]" id="quantity'+count+'" min="1" class="text-right form-control" placeholder="0" required></td>';
        html += '<td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Rp.</span></div><input type="number" id="subtotal_product'+count+'" step="any" class="subtotal_product text-right form-control" placeholder="0" readonly></div></td>';
        
        if (number > 1) {
            html += '<td><button type="button" id="removeProduct" class="btn btn-danger"><i class="fas fa-trash"></i></button></td>';
            html += '</tr>';
            $('tbody').append(html);
        } else {
            html += '</tr>';
            $('tbody').html(html);
        }
        
    }

    $('#addProduct').click(function() {
        count++;
        dynamic_table(count);
    });

    $(document).on('click', '#removeProduct', function() {
        count--;
        $(this).closest('#product_row').remove();
    });

    $(document).on('change', '[id^=product_id]', function(){
        var id = event.target.id.slice(10);
        var productID = $(this).children('option:selected').val();

        $.get(baseURL+'/api/product/'+productID, function(data, status) {
            $('#unit'+id).val(data.unit);
            $('#price_per_unit'+id).val(data.price);
        });
    });
    
    $(document).on('input', '[id^=quantity], #discount, #down_payment' , function(){
        var id = event.target.id.slice(8);

        var subtotal_price = 0;
        var total_price = 0;
        var price_per_unit = parseFloat($('#price_per_unit'+id).val());
        var quantity = parseFloat($('#quantity'+id).val());
        var discount = parseFloat($('#discount').val());
        discount = discount || 0;
        var down_payment = parseFloat($('#down_payment').val());
        down_payment = down_payment || 0;
        var subtotalProduct  = price_per_unit * quantity;

        $('#subtotal_product'+id).val(subtotalProduct);  
        
        $('.subtotal_product').each(function() {
            subtotal_price += +$(this).val();
        });
        
        $('#subtotal_price').val(subtotal_price);

        var totalPrice = subtotal_price - down_payment - discount;
        $('#total_price').val(totalPrice);
    });
    
});

</script>
@endsection