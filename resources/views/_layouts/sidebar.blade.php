<div class="navigation">
    <div class="navigation-header">
        <span>Navigation</span>
        <a href="#">
            <i class="ti-close"></i>
        </a>
    </div>
    <div class="navigation-menu-body">
        <ul>
            <li>
                <a class="active" href="{{ route('dashboard') }}">
                    <span class="nav-link-icon">
                        <i data-feather="pie-chart"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i data-feather="shopping-cart"></i>
                    </span>
                    <span>Data Ayam</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('indexAyamMasuk') }}">Ayam Masuk</a>
                    </li>
                    <li>
                        <a href="products.html">Ayam Keluar</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i data-feather="shopping-cart"></i>
                    </span>
                    <span>Data Pakan</span>
                </a>
                <ul>
                    <li>
                        <a href="orders.html">Pakan Masuk</a>
                    </li>
                    <li>
                        <a href="products.html">Pakan Terpakai</a>
                    </li>
                    <li>
                        <a href="product-detail.html">Pakan Keluar</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i data-feather="shopping-cart"></i>
                    </span>
                    <span>Data Obat</span>
                </a>
                <ul>
                    <li>
                        <a href="orders.html">Obat Masuk</a>
                    </li>
                    <li>
                        <a href="products.html">Obat Keluar</a>
                    </li>

                </ul>
            </li>


        </ul>
    </div>
</div>
