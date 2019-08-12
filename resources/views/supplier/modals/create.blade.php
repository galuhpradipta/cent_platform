<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="exampleModalLabel"><strong>Create Supplier</strong></h4>        
                        </div>
                    </div>
        
        
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div> 

                    <form action="{{ route('supplier.store') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" required>
                            </div>
                        </div>
                    </div>

                    <div class="div">
                        <hr class="sidebar-divider">
                    </div>
                    
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-danger btn-fill">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary btn-fill">
                            Submit
                        </button>
                    </div>

                    </form>
                    
            </div>    
        </div>
        </div>
    </div>