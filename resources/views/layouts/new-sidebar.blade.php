<div class="sidebar" data-color="orange" data-image="{{ asset('light-bs/img/sidebar-5.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo ml-5">
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

            <li class="nav-item">
                <a href="#uangMasuk" class="nav-link" data-toggle="collapse">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>Uang Masuk<b class="caret"></b></p>
                </a>
            </li>
    
            <div class="collapse" id="uangMasuk">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('so.index') }}">
                            {{-- <span class="sidebar-mini">PJ</span> --}}
                            <span class="sidebar-normal">Pesanan Penjualan</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('do.index') }}">
                            {{-- <span class="sidebar-mini">SJ</span> --}}
                            <span class="sidebar-normal">Surat Jalan</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('invoice.index') }}">
                            {{-- <span class="sidebar-mini">INV</span> --}}
                            <span class="sidebar-normal">Faktur Penjualan</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('income.index') }}">
                            {{-- <span class="sidebar-mini">UM</span> --}}
                            <span class="sidebar-normal">Uang Masuk</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('ar-history.index') }}">
                            {{-- <span class="sidebar-mini">RW</span> --}}
                            <span class="sidebar-normal">Riwayat</span>
                        </a>
                    </li>
                </ul>
            </div>

            <li class="nav-item">
                <a href="#uangKeluar" class="nav-link" data-toggle="collapse">
                    <i class="nc-icon nc-money-coins"></i>
                    <p>Uang Keluar<b class="caret"></b></p>
                </a>
            </li>

            <div class="collapse" id="uangKeluar">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('pr.index') }}">
                            {{-- <span class="sidebar-mini">PP</span> --}}
                            <span class="sidebar-normal">Pesanan Pembelian</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('po.index') }}">
                            {{-- <span class="sidebar-mini">PP</span> --}}
                            <span class="sidebar-normal">Pengiriman Pembelian</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('receipt.index') }}">
                            {{-- <span class="sidebar-mini">INV</span> --}}
                            <span class="sidebar-normal">Faktur Pembelian</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('spending.index') }}">
                            {{-- <span class="sidebar-mini">UM</span> --}}
                            <span class="sidebar-normal">Uang Keluar</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('ap-history.index') }}">
                            {{-- <span class="sidebar-mini">RW</span> --}}
                            <span class="sidebar-normal">Riwayat</span>
                        </a>
                    </li>
                </ul>
            </div>
                            
            <li class="nav-item">
                <a class="nav-link" href="{{route('journal.index')}}">
                    <i class="nc-icon nc-icon nc-paper-2"></i>
                    <p>Jurnal</p>
                </a>
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