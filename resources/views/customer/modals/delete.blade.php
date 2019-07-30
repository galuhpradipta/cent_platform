<div class="modal fade" id="deleteCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center modal-title"><strong>Are you sure ?</strong></p>
                    </div>
                </div>

                <hr class="sidebar-divider d-none d-md-block">

                <div class="row">
                    <div class="col-md-6">
                        <button type="button" data-dismiss="modal" class="btn btn-primary btn-block">Cancel</button>
                    </div>

                    <div class="col-md-6">
                        <form action="/master/customer" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="customer_id" id="fdelete-id">
                            <button type="submit" class="btn btn-danger btn-block">Delete</button>
                        </form>
                    </div>

                    
                </div>
            </div>    
        </div>
        </div>
    </div>