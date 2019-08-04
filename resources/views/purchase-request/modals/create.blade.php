<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <form action="{{ route('pr.store') }}" method="POST">
        @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Create Purchase Request</strong></h4>        
                    </div>                                        
                </div>

                <div class="div">
                    <hr class="sidebar-divider">
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_id">Nama Produk</label>
                                <div class="input-group">
                                    <select name="product_id" id="product_id" class="form-control">
                                        <option disabled selected>Choose Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                            
                        
                    
                    </div>
                </div>
            </div> 
            
            <div class="modal-footer">
                <div class="col-md-6">

                </div>
                
                <div class="col-md-6">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
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