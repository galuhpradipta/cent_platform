@extends('layouts.app')

@section('title')
    <title>Akun</title>
@endsection

@section('page')
    Akun
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card data-tables">
            <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="fresh-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>Kode Akun</th>
                                <th>Nama Akun</th>
                                <th>Kategori</th>                                
                            </tr>
                        </thead>                        
                        <tbody>
                          @if (count($accounts) > 0)
                              @foreach ($accounts as $account)
                                  <tr>
                                      <td>{{ $account->account_code }}</td>
                                      <td>{{ $account->account_name }}</td>
                                      <td>{{ $account->category_description }}</td>
                                  </tr>
                              @endforeach
                          @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stacked-form">
            <form action="{{ route('account.store' )}}" method="POST">
              <div class="card-header ">
                  <h4 class="card-title">Tambah Akun Baru</h4>
              </div>
              <div class="card-body">
                  @csrf
                  <div class="form-group">
                      <label>Nama Akun</label>
                      <input type="text" name="account_name" placeholder="Masukkan nama akun" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Kode Akun</label>
                      <input type="text" name="account_code" placeholder="Masukkan kode akun" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Akun Kategori</label>
                      <select name="account_category_id" id="account_category_id" class="form-control" required>
                          <option disabled selected>Pilih Kategory Akun</option>
                          @foreach ($categories as $category)
                              <option value="{{ $category->account_category_id }}">{{ $category->description }}</option>
                          @endforeach
                      </select>
                  </div>                    
                  
              </div>
              <div class="card-footer ">
                  <button type="submit" class="btn btn-fill btn-info">Submit</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('#datatables').DataTable();

        $('#account_category_id').select2();
    });
</script>    

@endsection