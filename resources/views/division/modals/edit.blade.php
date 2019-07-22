<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Edit</strong></h4>
            </div>
            <form action="{{ route('division.update') }}" method="POST">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                            @method('PATCH')
                            @csrf

                            <div class="form-row"> 
                                <input type="hidden" name="id" id="fedit-division-id" value="">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fedit-name"><strong>Division Name</strong></label>
                                        <input type="text" name="name" class="form-control" id="fedit-name" value="" required>
                                    </div>                                    
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fedit-code"><strong>Code</strong></label>
                                        <input type="text" name="code" class="form-control" id="fedit-code" value="" required>
                                    </div>                                    
                                </div>                                
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">                    
                    <div class="col-md-6">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>                    
            </div>
            </form>  
        </div>
    </div>
</div>