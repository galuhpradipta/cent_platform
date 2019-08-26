<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="exampleModalLabel"><strong>Ubah Delivery Date</strong></h4>        
                        </div>
                    </div>
        
        
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div> 
    
                    <form action="{{ route('po.update') }}" method="POST">
                    @method('PATCH')
                    @csrf

                    <input type="hidden" name="po_id" id="po_id">
    
                    <div class="row">
                       <div class="col-md-12">
                           <div class="form-group">
                               <label for="delivery_date">Tanggal Delivery</label>
                               <input type="date" class="form-control" id="delivery_date" name="delivery_date">
                           </div>
                       </div>
                    </div>
    
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <button data-dismiss="modal" class="btn btn-danger btn-block">
                                Cancel
                            </button>                           
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">
                                Submit
                            </button>
                        </div>
                    </div>
    
                    </form>
                    
            </div>    
        </div>
        </div>
    </div>