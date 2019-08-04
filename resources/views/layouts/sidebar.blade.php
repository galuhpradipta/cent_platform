<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color:#F1903F" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-journal-whills"></i>
    </div>
    <div class="sidebar-brand-text mx-3">CENTBOOK</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span><b>Dashboard</b></span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span><b>Account Receiveable</b></span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
        <a class="collapse-item" href="{{ route('so.index') }}"><b>Pesanan Penjualan</b></a>
        <a class="collapse-item" href="{{ route('do.index') }}"><b>Delivery Order</b></a>
        <a class="collapse-item" href="{{ route('invoice.index') }}"><b>Invoice</b></a>
        <a class="collapse-item" href="#"><b>Uang Masuk</b></a>
        <a class="collapse-item" href="#"><b>History</b></a>
      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span><b>Account Payable</b></span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        {{-- <h6 class="collapse-header">Custom Utilities:</h6> --}}
        <a class="collapse-item" href="{{ route('pr.index') }}"><b>Purchase Request</b></a>
        <a class="collapse-item" href="{{ route('po.index') }}"><b>Purchase Order</b></a>
        <a class="collapse-item" href="{{ route('receipt.index') }}"><b>Tanda Terima</b></a>
        <a class="collapse-item" href="#"><b>Uang Keluar</b></a>


        {{-- <a class="collapse-item" href="utilities-animation.html">Animations</a> --}}
        {{-- <a class="collapse-item" href="utilities-other.html">Other</a> --}}
      </div>
    </div>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span><b>Report</b></span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('customer.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span><b>Customer</b></span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('supplier.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span><b>Supplier</b></span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('product.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span><b>Product</b></span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('bank.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span><b>Account</b></span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('account.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span><b>User</b></span>
    </a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>