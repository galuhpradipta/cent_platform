<div class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="exampleModalLabel"><strong>Create Product</strong></h4>        
                        </div>
                    </div>
        
        
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div> 

                    <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" name="code" class="form-control" id="code" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price" class="form-control" id="price" required>
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