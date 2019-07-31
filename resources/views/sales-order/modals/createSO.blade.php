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
                    <div class="col-md-12">
                        <form action="{{ route('so.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="form-row">                                                   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="number"><strong>Sales Order Number</strong></label>
                                            <input type="text" name="number" class="form-control" id="number" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="customer_name"><strong>Customer Name</strong></label>
                                            <select name="customer_name" id="customer_name" class="form-control">
                                                <option value="" selected disabled>Choose Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>                                    
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="customer_id"><strong>Customer ID</strong></label>
                                            <input type="text" name="customer_id" class="form-control" id="customer_id" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="order_date"><strong>Order Date</strong></label>
                                            <input type="date" name="order_date" class="form-control" id="order_date" required>
                                        </div>      
                                        
                                        <div class="form-group">
                                            <label for="product"><strong>Product</strong></label>
                                            <div class="input-group">
                                                <select name="prodcut_name" id="product_name" class="form-control">
                                                    <option value="" disabled selected>Choose Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="quantity"><strong>Quantity</strong></label>
                                            <input type="text" name="quantity" class="form-control" id="quantity" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="price_per_piece"><strong>Price Per-Piece</strong></label>
                                            <input type="text" name="price_per_piece" class="form-control" id="price_per_piece" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="subtotal_price"><strong>Subtotal Price</strong></label>
                                            <input type="text" name="subtotal_price" class="form-control" id="subtotal_price" value="0" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="discount"><strong>Discount</strong></label>
                                            <input type="text" name="discount" class="form-control" id="discount" value="0" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="down_payment"><strong>Down Payment</strong></label>
                                            <input type="text" name="down_payment" class="form-control" id="down_payment" value="0" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bank"><strong>Cash/Bank</strong></label>
                                            <input type="text" name="bank" class="form-control" id="bank" value="0" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="PPN"><strong>PPN</strong></label>
                                            <input type="text" name="PPN" class="form-control" id="PPN" value="123000" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="total"><strong>Total</strong></label>
                                            <input type="text" name="total" class="form-control" id="total" value="123000" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="file">Attachment</label>
                                            <input type="file" name="file" id="file" required>
                                        </div>
                                    </div>
                                                                                                                                 
                                    <div class="col-md-3 offset-md-9">                                                                
                                        
                                    </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
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
            </div>    
        </div>
        </div>
    </div>