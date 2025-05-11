{{-- filepath: c:\laragon\www\ProjectGalonku\resources\views\layouts\sidebar.blade.php --}}
{{-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GalonKu</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Interface</div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
</ul>

<ul>
    @if (auth()->user()->role === 'admin')
        <li><a href="{{ route('products.index') }}">Kelola Produk</a></li>
        <li><a href="{{ route('users.index') }}">Kelola User</a></li>
    @endif

    @if (auth()->user()->role === 'customer')
        <li><a href="{{ route('orders.create') }}">Pesan Galon</a></li>
    @endif

    @if (auth()->user()->role === 'kurir')
        <li><a href="{{ route('deliveries.index') }}">Pengiriman</a></li>
    @endif
</ul> --}}


{{-- resources/views/layouts/sidebar.blade.php --}}
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-water"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GalonKu</div>
    </a>

    <hr class="sidebar-divider my-0">

    @if (auth()->user()->role === 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('products.index') }}">
                <i class="fas fa-box"></i>
                <span>Kelola Produk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fas fa-users"></i>
                <span>Kelola Pengguna</span>
            </a>
        </li>
    @elseif (auth()->user()->role === 'customer')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('orders.create') }}">
                <i class="fas fa-shopping-cart"></i>
                <span>Pesan Galon</span>
            </a>
        </li>
    @elseif (auth()->user()->role === 'kurir')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('deliveries.index') }}">
                <i class="fas fa-truck"></i>
                <span>Daftar Pengiriman</span>
            </a>
        </li>
    @endif

    <hr class="sidebar-divider d-none d-md-block">
</ul>