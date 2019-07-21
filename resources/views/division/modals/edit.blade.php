<div class="modal fade" id="edit-division-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Edit Division</strong></h4>
                        
                    </div>
    
                    <div class="col-md-6">
                        
                    </div>
    
                    <div class="col-md-2">
                        <button class="close pull-right" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    
                </div>

                <div class="div">
                    <hr class="sidebar-divider">
                </div>

                @if (count($divisions) > 0 )
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('division.update') }}" method="POST">
                                <div class="form-row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="name"><strong>Division Name</strong></label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{ $division->name }}">
                                        </div>                                    
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="code"><strong>Code</strong></label>
                                            <input type="text" name="code" class="form-control" id="code" value="{{ $division->code }}">
                                        </div>                                    
                                    </div>
                                    
                                    <div class="col-md-3">                                                                
                                        <a href="#" class="btn btn-primary btn-block mt-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </a>
                                    </div>
                                </div>
                                @csrf
                            </form>
                        </div>
                    </div>
                @endif
            </div>    
        </div>
        </div>
    </div>