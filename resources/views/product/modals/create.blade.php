<div class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="exampleModalLabel">Buat Product</h4>        
                        </div>
                    </div>
            
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div> 
                        
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">Kode</label>
                                <input type="text" name="code" class="form-control" id="code" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="account_id">Akun</label>
                            <select name="account_id" id="account_id" class="form-control">
                                <option selected disabled>Pilih Akun</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="unit">Satuan</label>
                                <select name="unit" id="unit" class="form-control" required>
                                    <option disabled>Pilih Jenis Satuan</option>
                                    <option value="Kilogram">Kilogram</option>
                                    <option value="Pcs">Pcs</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="ppn">PPN</label>
                                <input type="number" name="ppn" id="ppn" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Harga Satuan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" name="price" class="form-control" id="price" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div>
                        
                </div>   
                
                <div class="modal-footer">
                    {{-- <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-2">
                            <button data-dismiss="modal" class="btn btn-fill btn-danger">
                                Cancel
                            </button>
                        </div>
                       
                    </div> --}}

                    <div class="col-md-9"></div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success btn-block">
                            Submit
                        </button>
                    </div>
                </div>
            </form>

        </div>
        </div>
    </div>