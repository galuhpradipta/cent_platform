@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-icon-split mt-1 mb-2">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">Tanda Terima</span>
                </a>
            </div>
            
            <div class="col-md-4">
            
         </div>
            <div class="col-md-4">
                            
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
    
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center small">No</th>
                                        <th class="text-center small">Nomor Penerimaan</th>
                                        <th class="text-center small">Tanggal Penerimaan</th>
                                        <th class="text-center small">Nama Barang</th>
                                        <th class="text-center small">Jumlah Barang</th>
                                        <th class="text-center small">Invoice Supplier</th>
                                        <th class="text-center small">Discount</th> 
                                        <th class="text-center small">Uang Muka</th>
                                        <th class="text-center small">PPN</th>
                                        <th class="text-center small">Jatuh Tempo</th>
                                        <th class="text-center small">Approved By</th>
                                        <th class="text-center small">Draft</th>
                                        <th class="text-center small">Detail</th>                                       
                                    
                                       
                                     
                                       
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- @if (count($purchaseRequests) > 0) --}}
                                        {{-- @foreach ($banks as $bank) --}}
                                            <tr>
                                                <td class=" text-center small">1</td>
                                                <td class=" text-center small">120</td>
                                                <td class=" text-center small">2019-04-12</td>
                                                <td class=" text-center small">Web Develop</td>
                                                <td class=" text-center small">1</td>
                                                <td class=" text-center small">Esrap Digital</td>
                                                <td class=" text-center small">10 %</td>
                                                <td class=" text-center small">Rp. 1000000</td>
                                                <td class=" text-center small">10 %</td>
                                                <td class=" text-center small">2019-04-12</td>
                                                <td class=" text-center small">Jasa</td>
                                                <td class=" text-center small">
                                                    <a href="http://www.africau.edu/images/default/sample.pdf" target="_blank">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center small"> 
                                                    <a href="#" data-toggle="modal" data-target="#detail">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </td>


                                            </tr>
                                        {{-- @endforeach --}}
                                {{-- @endif  --}}
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    
@endsection