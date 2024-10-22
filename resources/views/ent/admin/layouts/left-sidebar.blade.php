<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color:#F1903F" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-journal-whills"></i>
          </div>
          <div class="sidebar-brand-text mx-3">Cent Book</div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/ent/admin') }}">
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
              <a class="collapse-item" href="{{ route('ent-admin.sales-order') }}"><b>Sales Order</b></a>
              <a class="collapse-item" href="{{ route('ent-admin.delivery-order') }}"><b>Delivery Order</b></a>
              <a class="collapse-item" href="{{ route('ent-admin.invoice') }}"><b>Invoice</b></a>
              <a class="collapse-item" href="{{ route('ent-admin.uang-masuk') }}"><b>Uang Masuk</b></a>
              <a class="collapse-item" href="{{ route('ent-admin.history') }}"><b>History</b></a>
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
      
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
       
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      
      