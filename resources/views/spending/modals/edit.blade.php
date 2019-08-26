<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="exampleModalLabel"><strong>Ubah Data Uang Keluar</strong></h4>        
                        </div>
                    </div>
        
        
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div> 
    
                    <form action="{{ route('spending.update') }}" method="POST">
                    @method('PATCH')
                    @csrf

                    <input type="hidden" name="spending_id" id="spending_id">
    
                    <div class="row">
                       <div class="col-md-12">
                           <div class="form-group">
                               <label for="amount">Jumlah Uang Masuk</label>
                               <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input class="form-control" type="number" step="any" name="amount" id="amount" value="0" required>                                               
                                </div>  
                           </div>

                           <div class="form-group">
                               <label for="spending_date">Tanggal</label>
                               <input type="date" class="form-control" id="spending_date" name="spending_date" required>
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