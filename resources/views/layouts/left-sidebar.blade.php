<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color:#F1903F" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-journal-whills"></i>
    </div>
    <div class="sidebar-brand-text mx-3">CENTBOOK</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/ent.spv') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span><b>Dashboard</b></span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  {{-- <div class="sidebar-heading">
    Interface
  </div> --}}
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span><b>Account Receiveable</b></span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
        <a class="collapse-item" href="{{ route('sme.salesOrder') }}"><b>Sales Order</b></a>
        <a class="collapse-item" href="{{ route('sme.deliveryOrder') }}"><b>Delivery Order</b></a>
        <a class="collapse-item" href="{{ route('sme.invoice') }}"><b>Invoice</b></a>
        <a class="collapse-item" href="{{ route('sme.uangMasuk') }}"><b>Uang Masuk</b></a>
        <a class="collapse-item" href="{{ route('sme.history') }}"><b>History</b></a>
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
        <a class="collapse-item" href="utilities-color.html"><b>Create PR</b></a>
        <a class="collapse-item" href="utilities-border.html"><b>History</b></a>
        {{-- <a class="collapse-item" href="utilities-animation.html">Animations</a> --}}
        {{-- <a class="collapse-item" href="utilities-other.html">Other</a> --}}
      </div>
    </div>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  
  <!-- Heading -->
  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span><b>Approval</b></span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span><b>Report</b></span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masterMenu" aria-expanded="true" aria-controls="masterMenu">
      <i class="fas fa-fw fa-wrench"></i>
      <span><b>Master</b></span>
    </a>
    <div id="masterMenu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="utilities-color.html"><b>User</b></a>
        <a class="collapse-item" href="utilities-border.html"><b>Level</b></a>
        <a class="collapse-item" href="{{ route('division.index') }}"><b>Division</b></a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#accountMenu" aria-expanded="true" aria-controls="accountMenu">
      <i class="fas fa-fw fa-wrench"></i>
      <span><b>Account</b></span>
    </a>
    <div id="accountMenu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ route('logout') }}" 
          onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            
          </form>
        </a>
      </div>
    </div>
  </li>
  {{ $errors }}

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  {{-- @guest
  <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
  </li>
  @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
  @else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
  @endguest --}}

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>