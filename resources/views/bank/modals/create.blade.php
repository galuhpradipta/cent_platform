<div class="modal fade" id="createBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="exampleModalLabel"><strong>Create Bank Account</strong></h4>        
                        </div>                                        
                    </div>
        
        
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div>
                    
    
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('bank.store') }}" method="POST">
                                @csrf
    
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        
                                <div class="form-group">
                                    <label for="name"><strong>Name</strong></label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
    
                                <div class="form-group">
                                    <label for="code"><strong>Code</strong></label>
                                    <input type="text" name="code" class="form-control" id="code" required>
                                </div>

                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <div class="input-group">
                                        <select name="category" id="category" class="form-control">
                                            <option disabled>Pilih Kategory Akun</option>
                                            <option value="Kas">Kas</option>
                                            <option value="Rekening">Rekening</option>
                                            <option value="Giro">Giro</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label for="balance"><strong>Initial Balance</strong></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp.</span>
                                        </div>
                                        <input type="number" step="any" name="balance" class="form-control" id="balance" required>
                                    </div>
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