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
                <a class="nav-link" href="{{ url('/') }}">
                    <i class="nc-icon nc-icon nc-paper-2"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            {{-- <li>
                <a class="nav-link" href="./user.html">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Second example</p>
                </a>
            </li> --}}

            <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="nc-icon nc-planet"></i>
                    <span class="notification">Uang Masuk</span>
                    {{-- <span class="d-lg-none">Notification</span> --}}
                </a>
                <ul class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('so.index') }}">Pesanan Penjualan</a>
                    <a class="dropdown-item" href="{{ route('do.index') }}">Pengiriman Penjualan</a>
                    <a class="dropdown-item" href="{{ route('invoice.index') }}">Invoice</a>
                    <a class="dropdown-item" href="{{ route('income.index') }}">Uang Masuk</a>
                    <a class="dropdown-item" href="{{ route('ar-history.index') }}">History</a>
                </ul>
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