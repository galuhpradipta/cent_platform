<div class="modal fade" id="editBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="exampleModalLabel"><strong>Edit Bank Account</strong></h4>        
                        </div>                                        
                    </div>
        
        
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div>
                    
    
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('bank.update') }}" method="POST">
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
                                <div class="col-md-6">
                                    <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>    
        </div>
        </div>
    </div>