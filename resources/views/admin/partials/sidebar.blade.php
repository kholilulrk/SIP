<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/dashboard"
                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                    class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Data</span></li>

        <li class="sidebar-item"> <a class="sidebar-link" href="{{route('admin.penyewa.index')}}" aria-expanded="false"><i
                    data-feather="users" class="feather-icon"></i><span class="hide-menu">Penyewa
                </span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link" href="ticket-list.html" aria-expanded="false"><i
                    data-feather="tag" class="feather-icon"></i><span class="hide-menu">Admin
                </span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link" href="{{route('admin.building.index')}}" aria-expanded="false"><i
                    data-feather="credit-card" class="feather-icon"></i><span class="hide-menu">Gedung
                </span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                    data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Transaksi </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span class="hide-menu"> Belum
                            Bayar
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span class="hide-menu"> DP
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                            class="hide-menu"> Lunas
                        </span></a>
                </li>
            </ul>
        </li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Cetak Laporan</span></li>

        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                    data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Sewa Gedung
                </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span class="hide-menu"> Cetak
                            Excel
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span class="hide-menu">
                            Cetak PDF
                        </span></a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link" href="{{route('admin.pemasukan.index')}}" aria-expanded="false"><i
                    data-feather="arrow-down-circle" class="feather-icon"></i><span class="hide-menu">Pemasukan
                </span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link" href="{{route('admin.pengeluaran.index')}}"
                aria-expanded="false"><i data-feather="arrow-up-circle" class="feather-icon"></i><span
                    class="hide-menu">Pengeluaran
                </span></a>
        </li>

        <li class="list-divider"></li>
    </ul>
</nav>
