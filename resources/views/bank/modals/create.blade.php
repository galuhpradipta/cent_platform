<div class="modal fade" id="createBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <form action="{{ route('bank.store') }}" method="POST">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="modal-title" id="exampleModalLabel"><strong>Buat Daftar Akun</strong></h4>        
                    </div>                                        
                </div>
    
    
                <div class="div">
                    <hr class="sidebar-divider">
                </div>
                

                <div class="row">
                    <div class="col-md-12">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="code">Kode Akun</label>
                            <input type="text" name="code" class="form-control" id="code" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Kategori</label>
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
                            <label for="balance">Initial Balance</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" step="any" name="balance" class="form-control" id="balance" required>
                            </div>
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