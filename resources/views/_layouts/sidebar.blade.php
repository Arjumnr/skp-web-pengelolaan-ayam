<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ set_active('/') }}">
                    <a href="{{ route('dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Data Ayam</li>
                <li class="{{ set_active('ayam-masuk') }}">
                    <a href="{{ route('indexAyamMasuk') }}"><i class="menu-icon fa fa-laptop"></i>Ayam Masuk </a>
                </li>
                <li class="{{ set_active('ayam-keluar') }}">
                    <a href="{{ route('indexAyamKeluar') }}"><i class="menu-icon fa fa-laptop"></i>Ayam Keluar </a>
                </li>
                <li class="menu-title">Data Pakan</li>
                <li class="{{ set_active('ayam-masuk') }}">
                    <a href="{{ route('indexAyamMasuk') }}"><i class="menu-icon fa fa-laptop"></i>Pakan Masuk </a>
                </li>
                <li class="{{ set_active('ayam-keluar') }}">
                    <a href="{{ route('indexAyamKeluar') }}"><i class="menu-icon fa fa-laptop"></i>Pakan Keluar </a>
                </li>
                <li class="menu-title">Data Obat</li>
                <li class="{{ set_active('ayam-masuk') }}">
                    <a href="{{ route('indexAyamMasuk') }}"><i class="menu-icon fa fa-laptop"></i>Obat Masuk </a>
                </li>
                <li class="{{ set_active('ayam-keluar') }}">
                    <a href="{{ route('indexAyamKeluar') }}"><i class="menu-icon fa fa-laptop"></i>Obat Keluar </a>
                </li>
            </ul>
        </div>
    </nav>
</aside>
