<div class="modal fade modal-xl" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {{-- <div class="modal-header justify-content-center">
                <div class="modal-profile">
                    <i class="nc-icon nc-bulb-63"></i>
                </div>
            </div> --}}
            <form action="{{ route('customer.store') }}" method="POST">
            <div class="modal-body">
                <h4 class="modal-title strong">Buat Pelanggan Baru</h4>
                <hr class="sidebar-divider">
        
                @csrf                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" placeholder="masukkan nama pelanggan" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="masukkan email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="phone_number">Nomor Telepon</label>
                                <input type="text" name="phone_number" class="form-control" placeholder="masukkan nomor telepon" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" class="form-control" placeholder="masukkan alamat" required>
                            </div>
                        </div>
                    </div>
                {{-- <div class="row">
                        <div class="col-md-12">
                            <h4 class="modal-title" id="exampleModalLabel">Buat Pelanggan</h4>        
                        </div>
                    </div>
        
                    <div class="div">
                        <hr class="sidebar-divider">
                    </div> 

                    <form action="{{ route('customer.store') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" required>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-link btn-simple">Back</button>
                <button type="button" class="btn btn-link btn-simple" data-dismiss="modal">Close</button> --}}
                <button data-dismiss="modal" class="btn btn-danger btn-fill">
                    Cancel
                </button>                        
                <button type="submit" class="btn btn-primary btn-fill">
                    Submit
                </button>
            </div>  
            </form>
          
        </div>
    </div>
</div>