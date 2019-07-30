<div class="modal fade" id="editCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Edit Customer</strong></h4>        
                    </div>
                </div>
    
    
                <div class="div">
                    <hr class="sidebar-divider">
                </div> 

                <form action="{{ route('customer.update') }}" method="POST">
                @method('PATCH')
                @csrf
                

                <div class="row">
                    <div class="col-md-12">
                   
                        <input type="hidden" name="id" id="fedit-id" class="form-control" required>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="fedit-name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="fedit-email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" id="fedit-phone-number" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="fedit-address" required>
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