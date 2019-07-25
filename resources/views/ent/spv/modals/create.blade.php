<div class="modal fade" id="create-account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Create Account</strong></h4>        
                    </div>
               
                    <div class="col-md-6">
                        
                    </div>
    
                </div>
    
    
                <div class="div">
                    <hr class="sidebar-divider">
                </div>
                

                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('ent-spv.master-account.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="registered_by" value="{{ Auth::user()->id }}">
                            <div class="form-row">                                                   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name"><strong>Name</strong></label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="address"><strong>Address</strong></label>
                                        <input type="text" name="address" class="form-control" id="address" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_number"><strong>Phone Number</strong></label>
                                        <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                                    </div>

                                                                          
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password"><strong>Password</strong></label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                    </div> 

                                    <div class="form-group">
                                        <label for="email"><strong>Email</strong></label>
                                        <input type="email" name="email" class="form-control" id="email" required>
                                        
                                    </div>   
                                    
                                    <div class="form-group">
                                        <label for="role"><strong>Role</strong></label>
                                        <select name="role" id="role" class="form-control">
                                            <option value="" disabled>Select Role</option>
                                            <option value="0">Supervisor</option>
                                            <option value="1">Admin</option>

                                            
                                            {{-- @foreach ($account->roleOptions() as $roleOptionKey => $roleOptionValue)
                                                <option value="{{ $roleOptionKey }}" {{ $account->role == $roleOptionValue ? 'selected' : ''}}>{{ $roleOptionValue }}</option>
                                            @endforeach                                            --}}
                                        </select>
                                    </div>  
                                </div>
                                                                                                                             
                                <div class="col-md-3 offset-md-9">                                                                
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="button" data-dismiss="modal" class="btn btn-danger">Cancel</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
        </div>
        </div>
    </div>