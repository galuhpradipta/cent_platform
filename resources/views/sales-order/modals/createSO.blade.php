<div class="modal fade" id="createSO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                            <h4 class="modal-title"><strong>Create Sales Order</strong></h4>        
                    </div>
                
                    <div class="col-md-6">
                        
                    </div>
    
                </div>
    
    
                <div class="div">
                    <hr class="sidebar-divider">
                </div>
                

                <div class="row">
                    <form action="{{ route('so.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-12">                                           
                            
                                <div class="form-row">                                                   
                                    <div class="col-md-4">                                        
                                        <div class="form-group">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                            <label for="customer_id"><strong>Customer Name</strong></label>
                                            <select name="customer_id" id="customer_id" class="form-control">
                                                <option value="" selected disabled>Choose Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>                                    
                                                @endforeach
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="customer_email">Customer Email</label>
                                            <input type="text" class="form-control" id="customer_email" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="customer_address"><strong>Customer Address</strong></label>
                                            <input type="text" name="customer_address" class="form-control" id="customer_address" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label for="order_date"><strong>Order Date</strong></label>
                                            <input type="date" name="order_date" class="form-control" id="order_date" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="attachment">Attachment</label>
                                            <input type="file" name="attachment" id="attachment" class="form-control" required>
                                        </div>
                                                                                                    
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="product_id"><strong>Product Name</strong></label>
                                            <div class="input-group">
                                                <select name="product_id" id="product_id" class="form-control">
                                                    <option disabled selected>Choose Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="product_price"><strong>Price Per-Piece (Rp.)</strong></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input class="form-control" type="number" step="any" name="product_price" id="product_price" readonly>                                               
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="quantity"><strong>Quantity</strong></label>
                                            <input type="number" name="quantity" class="form-control" id="quantity" value="0" required>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label for="subtotal_price"><strong>Subtotal Price</strong></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input class="form-control" type="number" step="any" name="subtotal_price" id="subtotal_price" value="0" readonly>                                               
                                            </div>                                            
                                        </div>

                                        <div class="form-group">
                                            <label for="discount"><strong>Discount</strong></label>
                                            <input type="number" step="any" name="discount" class="form-control" id="discount" value="0" required>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank"><strong>Kasbank</strong></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input class="form-control" type="number" step="any" name="bank" id="bank" value="0" required>                                               
                                            </div>                                                
                                        </div>

                                        <div class="form-group">
                                            <label for="ppn"><strong>PPN</strong></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                <input class="form-control" type="number" step="any" name="ppn" id="ppn" value="0" required>                                               
                                            </div>                                           
                                        </div>

                                        <div class="form-group">
                                            <label for="down_payment"><strong>Down Payment</strong></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input class="form-control" type="number" step="any" name="down_payment" id="down_payment" value="0" required>                                               
                                            </div>                                              
                                        </div>

                                        <div class="form-group">
                                            <label for="total"><strong>Total</strong></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input class="form-control" type="number" step="any" name="total" id="total" value="0" readonly>                                               
                                            </div>                                           
                                        </div>
                                        
                                        <div class="form-group pt-4">
                                            <div class="row">
                                                <div class="col-md-6">  
                                                    <button type="button" data-dismiss="modal" class="btn btn-danger btn-block">
                                                        Cancel
                                                    </button>
                                                </div>

                                                <div class="col-md-6">
                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        Submit
                                                    </button>
                                                </div>

                                            </div>
                                        </div>                                       
                                    </div>                                                                                                                                                                   
                            </div>
                        
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-3 offset-md-9">                                                                
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        </div>
    </div>