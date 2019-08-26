@extends('layouts.new-app')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
          <div class="row">
              <div class="col-md-4">
                  <a href="#" class="btn btn-primary btn-fill btn-icon-split mt-1 mb-2">
                      <span class="icon text-white-50">
                          <i class="fas fa-flag"></i>
                      </span>
                      <span class="text">User</span>
                  </a>
              </div>            
  
              <div class="col-md-4" >
  
              </div>
  
              <div class="col-md-4">
                  <a href="#" class="btn btn-fill btn-success btn-icon-split mt-1 mb-2 float-right" data-toggle="modal" data-target="#create-account-modal">
                      <span class="icon text-white-50">
                          <i class="fas fa-plus"></i>
                      </span>
                      <span class="text">Buat</span>
                  </a>
              </div>
          </div>


        @if (count($errors) > 0)
          <div class="alert alert-danger" role="alert">
              {{ $errors->first() }}
            </div>
        @endif

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
        </div>
        @endif
  
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th width="20%">Name</th>
                      <th width="30%">Address</th>
                      <th width="10%">Phone</th>
                      <th width="15%">Email</th>
                      <th width="10%">Role</th>
                      <th width="10%">Edit</th>
                      <th width="10%" style="display: table-cell;">Delete</th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($accounts as $account)
                  
                  <tr>
                      
                      <td class="text-left">{{ $account->name }}</td>
                      <td class="text-left small">{{ $account->address }}</td>
                      <td class="text-left">{{ $account->phone_number }}</td>
                      <td class="text-left">{{ $account->email }}</td>                      
                      <td class="text-left">{{ $account->role }}</td>
                      <td class="text-center">                          
                          <button 
                            data-toggle="modal"
                            data-target="#editModal"
                            data-account-id="{{ $account->id }}"
                            data-account-name="{{ $account->name }}"
                            data-account-address="{{ $account->address }}"
                            data-account-phone-number = {{ $account->phone_number }}
                            data-account-email="{{ $account->email }}"
                            data-account-role="{{ $account->role }}"
                            data-account-unencrypted-password="{{ $account->unencrypted_password }}"
                            class="btn btn-sm btn-fill btn-primary">
                              Ubah
                            <i class="fas fa-edit"></i>
                          </button>                          
                      </td>            
                      <td class="text-center">
                          <button 
                            data-toggle="modal" 
                            data-target="#deleteModal" 
                            data-account-id="{{ $account->id }}"
                            class="btn btn-sm btn-fill btn-danger">
                              Hapus
                            <i class="fas fa-trash"></i>
                          </button>
                      </td>         
                  </tr>
                  @endforeach                                  

                </tbody>
              </table>
            </div>
          </div>
        </div>
  
      {{-- modal --}}
      @include('account.modals.create')
      @if (count($accounts) > 0)
        @include('account.modals.edit')
        @include('account.modals.delete')
      @endif
 
      </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // edit modal
        $('#dataTable').DataTable();

        $('#editModal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);

            var id = button.data('account-id');
            var name = button.data('account-name')
            var address = button.data('account-address')
            var phoneNumber = button.data('account-phone-number')
            var email = button.data('account-email')
            var role = button.data('account-role')
            var password = button.data('account-unencrypted-password')

            $('#fedit-id').val(id);
            $('#fedit-name').val(name);
            $('#fedit-address').val(address);
            $('#fedit-phone-number').val(phoneNumber);
            $('#fedit-email').val(email);
            $('#fedit-role').val(role);
            $('#fedit-password').val(password);

            console.log('role', role);
            console.log(name, address, phoneNumber, email, role, password);
        });

        // delete modal
        $('#deleteModal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var accountID = button.data('account-id');
            console.log(accountID);
            $('#fdelete-account-id').val(accountID);
        });
    });
</script>
@endsection