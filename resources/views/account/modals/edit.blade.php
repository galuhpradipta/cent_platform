<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Edit</strong></h4>
            </div>
            <form action="{{ route('account.update') }}" method="POST">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        @method('PATCH')
                        @csrf
                        <div class="form-row">
                            <input type="hidden" name="id" id="fedit-id">
                                                                                         
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"><strong>Name</strong></label>
                                    <input type="text" name="name" class="form-control" id="fedit-name" required>
                                </div>
                                <div class="form-group">
                                    <label for="address"><strong>Address</strong></label>
                                    <input type="text" name="address" class="form-control" id="fedit-address" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number"><strong>Phone Number</strong></label>
                                    <input type="text" name="phone_number" class="form-control" id="fedit-phone-number" required>
                                </div>
                                                                      
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password"><strong>Password</strong></label>
                                    <input type="password" name="password" class="form-control" id="fedit-password" required>
                                </div> 
                                <div class="form-group">
                                    <label for="email"><strong>Email</strong></label>
                                    <input type="email" name="email" class="form-control" id="fedit-email" required>                                    
                                </div>   
                                
                                <div class="form-group">
                                    <p id="fedit-role" value=""></p>
                                    <label for="role"><strong>Role</strong></label>
                                    <select name="role" class="form-control">
                                        <option disabled>Select Role</option>
                                        <option value="0">Supervisor</option>
                                        <option value="1">Admin</option>
                                        {{-- @foreach ($account->roleOptions() as $roleOptionKey => $roleOptionValue)                                            
                                            <option id="fedit-role" value="{{ $roleOptionKey }}" {{ $account->role == $roleOptionValue ? 'selected' : ''}}>{{ $roleOptionValue }}</option>
                                        @endforeach                                         --}}
                                    </select>
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