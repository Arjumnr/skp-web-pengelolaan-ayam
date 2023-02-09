<aside id="left-panel" class="left-panel">
    
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ set_active('/') }}">
                    <a href="{{ route('dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Data Ayam</li>
                <li class="{{ set_active('ayam-masuk') }}">
                    <a href="{{ url('ayam-masuk') }}"><i class="menu-icon fa fa-file"></i>Ayam Masuk </a>
                </li>
                <li class="{{ set_active('ayam-keluar') }}">
                    <a href="{{ url('ayam-keluar') }}"><i class="menu-icon fa fa-file"></i>Ayam Keluar </a>
                </li>
                <li class="menu-title">Data Pakan</li>
                <li class="{{ set_active('pakan-masuk') }}">
                    <a href="{{ url('pakan-masuk') }}"><i class="menu-icon fa fa-archive"></i>Pakan Masuk </a>
                </li>
                <li class="{{ set_active('pakan-keluar') }}">
                    <a href="{{ url('pakan-keluar') }}"><i class="menu-icon fa fa-square-o"></i>Pakan Keluar </a>
                </li>
                <li class="{{ set_active('pakan-terpakai') }}">
                    <a href="{{ url('pakan-terpakai') }}"><i class="menu-icon fa fa-th"></i>Pakan Terpakai </a>
                </li>
                <li class="menu-title">Data Obat</li>
                <li class="{{ set_active('obat') }}">
                    <a href="{{ url('obat') }}"><i class="menu-icon fa fa-medkit"></i>Obat </a>
                </li>

                
            </ul>
            

        </div>
    </nav>
</aside>
