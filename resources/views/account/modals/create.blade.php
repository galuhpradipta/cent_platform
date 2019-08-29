<div class="modal fade" id="create-account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <form action="{{ route('account.store') }}" method="POST">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Buat User</strong></h4>        
                </div>            
                <div class="col-md-6"></div>
            </div>
            <hr class="sidebar-divider">
                

                <div class="row">
                    <div class="col-md-12">
                        
                            @csrf

                            <input type="hidden" name="registered_by" value="{{ Auth::user()->id }}">
                            <div class="form-row">                                                   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <input type="text" name="address" class="form-control" id="address" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_number">Nomor Telepon</label>
                                        <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                                    </div>

                                                                          
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                    </div> 

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" required>
                                        
                                    </div>   
                                    
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="" disabled>Select Role</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Supervisor</option>
                                            <option value="3">Manager</option>
                                            <option value="4">Direktur</option>                                      
                                        </select>
                                    </div>  
                                </div>
                                                                                                                             
                                
                            </div>
                    </div>
                </div>
        </div> 

        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-fill btn-danger">Cancel</button>            
            <button type="submit" class="btn btn-fill btn-primary">Submit</button>
        </div>
        </form>
    </div>
    </div>
</div>