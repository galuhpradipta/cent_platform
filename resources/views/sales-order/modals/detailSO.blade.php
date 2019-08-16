<div class="modal fade" id="detailSO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="modal-title" id="exampleModalLabel"><strong>Detail Sales Order</strong></h4>
                    
            </div>
                <div class="col-md-6">                    
            </div>

                <div class="col-md-2">
                    <button class="close pull-right" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>       
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Pelanggan</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">File</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center" id="detail-customer-name"></td>
                                <td class="text-center" id="detail-customer-email"></td>
                                <td class="text-center" id="detail-customer-address"></td>
                                <td class="text-center">
                                    <a href="" target="_blank" id="detail-so-file">
                                        <i class="fas fa-file"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Harga Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center" id="detail-product-name"></td>
                                <td class="text-center" id="detail-product-unit"></td>
                                <td class="text-center" id="detail-product-price"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">No. Pesanan</th>
                                <th class="text-center">Tanggal Order</th>
                                <th class="text-center">Kuantitas</th>
                                <th class="text-center">Subtotal</th>
                                <th class="text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center" id="detail-so-id"></td>
                                <td class="text-center" id="detail-so-order-date"></td>
                                <td class="text-center" id="detail-so-quantity"></td>
                                <td class="text-center" id="detail-so-subtotal-price"></td>
                                <td class="text-center" id="detail-so-total"></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>