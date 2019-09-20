<div class="sidebar" data-color="orange" data-image="{{ asset('light-bootstrap/img/sidebar-5.jpg') }}">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                Ct
            </a>
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                CENT
            </a>
        </div>
        <div class="user">
            <div class="photo">
                <img src="{{ asset('light-bootstrap/img/default-avatar.png') }}" />
            </div>
            <div class="info ">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>{{ Auth::user()->name }}
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a class="profile-dropdown" href="#pablo">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="#pablo">
                                <span class="sidebar-mini">EP</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="#pablo">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('sme.index') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                    <i class="nc-icon nc-app"></i>
                    <p>
                        Uang Masuk
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="componentsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('sme-invoice.index') }}">
                                <span class="sidebar-mini">INV</span>
                                <span class="sidebar-normal">Invoice</span>
                            </a>
                        </li>                        
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('account.index') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Daftar Akun</p>
                </a>
            </li>
            
        </ul>
    </div>
</div>