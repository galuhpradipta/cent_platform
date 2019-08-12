@extends('layouts.new-app')

@section('content')
    <div class="container-fluid">
        <h2>Buat Pesanan Penjualan</h2>
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="customer_name">Pelanggan</label>
                                <input type="text" id="customer_name" name="customer_name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="font-weight-bold" for="customer_email">Email</label>
                                <input type="text" id="customer_email" name="customer_email" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection