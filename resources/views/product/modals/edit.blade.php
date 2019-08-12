<div class="modal fade" id="editProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="exampleModalLabel"><strong>Ubah Product</strong></h4>        
                        </div>
                    </div>
        
        
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div> 
    
                    <form action="{{ route('product.update') }}" method="POST">
                    @method('PATCH')
                    @csrf
                    
    
                    <div class="row">
                        <div class="col-md-12">
                       
                            <input type="hidden" name="product_id" id="fedit-id" class="form-control" required>
    
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" id="fedit-name" required>
                            </div>
    
                            <div class="form-group">
                                <label for="code">Kode</label>
                                <input type="text" name="code" class="form-control" id="fedit-code" required>
                            </div>
    
                            <div class="form-group">
                                <label for="price">Harga per piece</label>
                                <input type="text" name="price" class="form-control" id="fedit-price" required>
                            </div>                           
                        </div>
                    </div>
    
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <button data-dismiss="modal" class="btn btn-danger">
                                Cancel
                            </button>
    
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
    
                    </form>
                    
            </div>    
        </div>
        </div>
    </div>