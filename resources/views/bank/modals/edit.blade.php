<div class="modal fade" id="editBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="{{ route('bank.update') }}" method="POST">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Ubah Informasi Akun</strong></h4>        
                    </div>                                        
                </div>
    
                <div class="div">
                    <hr class="sidebar-divider">
                </div>            

                <div class="row">
                    <div class="col-md-12">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" id="fedit-id">
                        <div class="form-group">
                            <label for="fedit-name"><strong>Name</strong></label>
                            <input type="text" name="name" class="form-control" id="fedit-name" required>
                        </div>
                        <div class="form-group">
                            <label for="fedit-code"><strong>Code</strong></label>
                            <input type="text" name="code" class="form-control" id="fedit-code" required>
                        </div>                        
                                                                                                                         
                        <div class="col-md-6">
                        </div>                            
                    </div>
                </div>
            </div>  
            <div class="modal-footer">
                <button class="btn btn-fill btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-fill btn-primary">Submit</button>
            </div>  
            </form>

        </div>
        </div>
    </div>