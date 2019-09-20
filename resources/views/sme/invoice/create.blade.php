@extends('layouts.sme.app')


@section('title')
    <title>Invoice</title>
@endsection

@section('page')
    Buat Invoice Baru
@endsection
    
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card stacked-form">
                
                <div class="card-body ">
                    <form method="#" action="#">
                        {{-- customer info --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nama Pelanggan</label>
                                    <input type="text" placeholder="Masukkan nama pelanggan" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email Pelanggan</label>
                                    <input type="email" placeholder="Masukkan email pelanggan" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{-- end of customer info --}}

                        {{-- order info --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nomor Invoice</label>
                                    <input type="text" placeholder="Masukkan nomor invoice" class="form-control">
                                </div>                            
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Order</label>
                                    <input id="datetimepicker" type="text" class="form-control datetimepicker" placeholder="masukkan tanggal">
                                </div>
                            </div>
                        </div>
                        {{-- end of order info --}}

                        <div class="row">
                            <table class="table table-hover table-striped">
                                <thead>                                   
                                    <th width="35%">Nama Produk</th>
                                    <th width="25%">Harga Satuan</th>
                                    <th width="10%">Kuantitas</th>
                                    <th width="20%">Subtotal</th>
                                    <th width="10%"></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="product_id" id="product_name" class="select2-single form-control">
                                                <option value="">produk 1</option>
                                                <option value="">produk 2</option>
                                                <option value="">produk 3</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" id="hargaSatuan" class="form-control currency" value="1500000">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success">
                                                <i class="nc-icon nc-simple-add"></i>
                                            </button>
                                        </td>
                                    </tr>                                   
                                </tbody>
                            </table>
                        </div>  
                    </form>
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-fill btn-info">Submit</button>
                </div>
            </div>
        </div>        
    </div>
@endsection

@section('script')
<script>
    
    // document.getElementById(".currency").onblur = function (){    

    //     //number-format the user input
    //     this.value = parseFloat(this.value.replace(/,/g, ""))
    //                     .toFixed(2)
    //                     .toString()
    //                     .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    //     //set the numeric value to a number input
    //     document.getElementById("number").value = this.value.replace(/,/g, "")

    // }

    $(document).ready(function(){

       

        function addCommas(nStr){
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        // $('.currency').on('keyup',function(){
        //     // $(this).val(add)

        //     currentVal = parseFloat($(this).val());

            

        //     newValue = addCommas(currentVal);

        //     console.log(newValue);

        //     $(this).val(newValue);

        //     // $(this).html(newValue);
        // });

        $('#hargaSatuan').keyup(function() {
            console.log($(this).val());

            newVal = parseFloat(($(this).val())).toFixed(2);

            $(this).val(newVal);
        });

        $('#datetimepicker').datetimepicker();

        $('#product_name').select2({
            // theme: 'classic',
            width: '100%'
        });

        
    });

    
</script>

@endsection