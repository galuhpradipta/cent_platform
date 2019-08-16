<div class="sidebar" data-color="orange" data-image="{{ asset('light-bs/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:;" class="simple-text">
              CENTBOOK
            </a>
        </div>  

        

        <ul class="nav">
            <li class="nav-item">
                <hr class="sidebar-divider">
                <a href="#uangMasuk" class="nav-link" data-toggle="collapse">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>Uang Masuk<b class="caret"></b></p>
                </a>
            </li>

            <div class="collapse" id="uangMasuk">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('so.index') }}">
                            <span class="sidebar-mini">PJ</span>
                            <span class="sidebar-normal">Pesanan Penjualan</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('do.index') }}">
                            <span class="sidebar-mini">SJ</span>
                            <span class="sidebar-normal">Surat Jalan</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('invoice.index') }}">
                            <span class="sidebar-mini">INV</span>
                            <span class="sidebar-normal">Faktur Penjualan</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('income.index') }}">
                            <span class="sidebar-mini">UM</span>
                            <span class="sidebar-normal">Uang Masuk</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('ar-history.index') }}">
                            <span class="sidebar-mini">RW</span>
                            <span class="sidebar-normal">Riwayat</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- <li class="nav-item">
                <div class="collapse" id="uangMasuk" style>
                    
                </div>
            </li> --}}
        </ul>

        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="nc-icon nc-icon nc-paper-2"></i>
                    <p>Dashboard</p>
                </a>
            </li>
                        
            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="nc-icon nc-planet"></i>
                    <span class="notification">Uang Keluar</span>
                    {{-- <span class="d-lg-none">Notification</span> --}}
                </a>
                <ul class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('pr.index') }}">Pesanan Pembelian</a>
                    <a class="dropdown-item" href="{{ route('po.index') }}">Pengiriman Pembelian</a>
                    <a class="dropdown-item" href="{{ route('receipt.index') }}">Invoice</a>
                    <a class="dropdown-item" href="#">Uang Keluar</a>
                    <a class="dropdown-item" href="#">History</a>
                </ul>              
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customer.index') }}">
                    <i class="nc-icon nc-icon nc-paper-2"></i>
                    <p>Customer</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('supplier.index') }}">
                    <i class="nc-icon nc-icon nc-paper-2"></i>
                    <p>Supplier</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">
                    <i class="nc-icon nc-icon nc-paper-2"></i>
                    <p>Product</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('bank.index') }}">
                    <i class="nc-icon nc-icon nc-paper-2"></i>
                    <p>Account</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('account.index') }}">
                    <i class="nc-icon nc-icon nc-paper-2"></i>
                    <p>User</p>
                </a>
            </li>



            {{-- <li class="nav-item active active-pro">
                <a class="nav-link active" href="javascript:;">
                    <i class="nc-icon nc-alien-33"></i>
                    <p>Upgrade plan</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>