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
                                <div class="col-md-3">
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
                                </div>

                                <div class="col-md-3"></div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="so_date">Tanggal Order</label>
                                        <input type="date" name="so_date" class="form-control" id="so_date" value="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-left" width="25%"><strong>Produk</strong></th>
                                                    <th class="text-left" width="15%"><strong>Satuan</strong></th>
                                                    <th class="text-left" width="25%"><strong>Harga Satuan</strong></th>
                                                    <th class="text-left" width="10%"><strong>Qty</strong></th>
                                                    <th class="text-left" width="25%"><strong>Harga Subtotal</strong></th>
                                                    <th width="8%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- <tr> --}}
                                                    {{-- <td>
                                                        <select name="product_id" id="product_id" class="form-control" required>
                                                            <option selected disabled>Pilih Produk</option>
                                                        </select>
                                                    </td> --}}
                                                    {{-- <td>
                                                        <input type="text" id="pcs" class="form-control" readonly>
                                                    </td> --}}
                                                    {{-- <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp.</span>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="0" readonly>
                                                        </div>
                                                    </td> --}}
                                                    {{-- <td>                                                        
                                                        <input type="number" min="1" class="form-control" placeholder="0" required>
                                                    </td>                                                 --}}
                                                    {{-- <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Rp.</span>
                                                            </div>
                                                            <input type="number" step="any" class="form-control" placeholder="0" readonly>
                                                        </div>
                                                    </td>                                                    --}}
                                                    {{-- <td>    
                                                        <button type="button" class="btn btn-danger">
                                                            X
                                                        </button>
                                                    </td> --}}
                                                {{-- </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-success" id="addProduct">
                                    <i class="fas fa-plus"></i>
                                    <span>Tambah</span>                                    
                                </button>
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
                                            <input type="number" id="discount" step="any" class="form-control" placeholder="0" required>
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
                                            <input type="number" id="down_payment" step="any" class="form-control" placeholder="0" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="subtotal_price">Subtotal</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" id="subtotal_price" step="any" class="form-control" placeholder="0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="attachment">Attachment</label>
                                        <input type="file" class="form-control" id="attachment">
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
                                        <label for="subtotal_price">Total</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" id="subtotal_price" step="any" class="form-control" placeholder="0" readonly>
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
        html += '<td><select name="product_id[]" id="product_id" class="form-control" required><option id="product_option" selected disabled>Pilih Produk</option>@foreach($products as $product) <option value="{{ $product->id }}">{{ $product->name }}</option>  @endforeach</select></td>';
        html += '<td><input type="text" id="pcs" class="form-control" readonly></td>';
        html += '<td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Rp.</span></div><input type="number" class="form-control" placeholder="0" readonly></div></td>';
        html += '<td><input type="number" min="1" class="form-control" placeholder="0" required></td>';
        html += '<td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Rp.</span></div><input type="number" step="any" class="form-control" placeholder="0" readonly></div></td>';
        
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
        console.log("clicked", count);
        dynamic_table(count);
    });

    $(document).on('click', '#removeProduct', function() {
        count--;
        console.log("clicked", count);
        // dynamic_table(count);
        $(this).closest('#product_row').remove();
    });

    $('#soForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '{{ route('so.index') }}',
            method: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                
            }

        });
    });
});

</script>
@endsection