<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        @if (auth()->user()->role != 'user')
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    @php
                        $notifCount = App\Models\Peminjaman::where('status', 'menunggu')->count();
                        $notifPengembalian = App\Models\Pengembalian::where('status_barang', 'menunggu')->count();
                        $totalNotif = $notifCount + $notifPengembalian;
                    @endphp
                    @if ($totalNotif > 0)
                        <span class="badge badge-warning navbar-badge">{{ $totalNotif }}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{ $totalNotif }} Notifikasi</span>
                    <div class="dropdown-divider"></div>
                    @if ($notifCount > 0)
                        <a href="{{ route('peminjaman.konfirmasi') }}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $notifCount }} Peminjaman Baru
                        </a>
                    @endif
                    @if ($notifPengembalian > 0)
                        <a href="{{ route('pengembalian.konfirmasi') }}" class="dropdown-item">
                            <i class="fas fa-undo mr-2"></i> {{ $notifPengembalian }} Pengembalian Baru
                        </a>
                    @endif
                </div>
            </li>
        @endif

        <!-- User Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profil
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
