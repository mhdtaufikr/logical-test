<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
   

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Home -->
    <li class="nav-item active">
        <a class="nav-link" href=" {{ url('/home') }} ">
            <i class="fas fa-home"></i>
            <span>Home</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Good Receipt -->
    @if (auth()->user()->dept_name == 'Facility & Asset Management')
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/purchase') }}">
                <i class="far fa-clipboard"></i>
                <span>Good Receipt</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMonitoringProduct"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-chart-bar"></i>
                <span>Monitoring Product</span>
            </a>
            <div id="collapseMonitoringProduct" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/productIn') }}">Product In</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                data-target="#collapseMonitoringFacility" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-chart-bar"></i>
                <span>Monitoring Facility</span>
            </a>
            <div id="collapseMonitoringFacility" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/vehicle/request') }}">Vehicle Requested</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMasterFacility"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-tools"></i>
                <span>Master Facility</span>
            </a>
            <div id="collapseMasterFacility" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/vehicle/create') }}">Vehicle</a>
                </div>
            </div>
        </li>
    @elseif (auth()->user()->role == 'Super Admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/purchase') }}">
                <i class="far fa-clipboard"></i>
                <span>Good Receipt</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMonitoringProduct"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-chart-bar"></i>
                <span>Monitoring Product</span>
            </a>
            <div id="collapseMonitoringProduct" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/productIn') }}">Product In</a>
                    <a class="collapse-item" href="{{ url('/productOut-mont') }}">Product Out</a>
                    <a class="collapse-item" href="#">Product Return</a>
                </div>
            </div>
        </li>
        <!-- Nav Item - Product Request-->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProductRequest"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-chart-bar"></i>
                <span>Product Request</span>
            </a>
            <div id="collapseProductRequest" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/productOut') }}">Request Product Out</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Monitoring Product-->

        <!-- Nav Item - Monitoring Facility-->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse"
                data-target="#collapseMonitoringFacility" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-chart-bar"></i>
                <span>Monitoring Facility</span>
            </a>
            <div id="collapseMonitoringFacility" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/grab') }}">GRAB Corporate</a>
                    <a class="collapse-item" href="{{ url('/locker') }}">Locker</a>
                    <a class="collapse-item" href="#">Simcard</a>
                    <a class="collapse-item" href="{{ url('/vehicle') }}">Vehicle</a>
                    <a class="collapse-item" href="#">Facility Requested</a>
                </div>
            </div>

        </li>

        <!-- Nav Item - Monitoring Facility-->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMasterFacility"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-tools"></i>
                <span>Master Facility</span>
            </a>
            <div id="collapseMasterFacility" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/grab/create') }}">GRAB Corporate</a>
                    <a class="collapse-item" href="{{ url('/locker/create') }}">Locker</a>
                    <a class="collapse-item" href="#">Simcard</a>
                    <a class="collapse-item" href="{{ url('/vehicle/create') }}">Vehicle</a>
                </div>
            </div>

        </li>

        <!-- Nav Item - Master Data -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMstData"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-database"></i>
                <span>Master Data</span>
            </a>
            <div id="collapseMstData" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/spesification') }}">Spesification</a>
                    <a class="collapse-item" href="{{ url('/location') }}">Location</a>
                </div>
            </div>

        </li>
        <!-- Nav Item - Master Configuration -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMstConfig"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-cogs"></i>
                <span>Master Configuration</span>
            </a>
            <div id="collapseMstConfig" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ url('/dropdown') }}">Dropdown</a>
                    <a class="collapse-item" href="{{ url('/rule') }}">Rules</a>
                    <a class="collapse-item" href="{{ url('/service') }}">Service</a>
                    <a class="collapse-item" href="{{ url('/user') }}">User</a>
                </div>
            </div>

        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
