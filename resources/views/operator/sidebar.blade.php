<li class="header" style="font-weight:bold;">MENU UTAMA</li>
<li class="{{ set_active('operator.dashboard') }}">
    <a href="{{ route('operator.dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

<li class="{{ set_active('operator.koleksi') }}">
    <a href="{{ route('operator.koleksi') }}">
        <i class="fa fa-book"></i> <span>Manajemen Koleksi</span>
    </a>
</li>

<li class="">
    <a href="">
        <i class="fa fa-power-off text-danger"></i> <span class="text-danger">Keluar</span>
    </a>
</li>
