<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <i class="fas fa-boxes brand-image"></i>
        <span class="brand-text font-weight-light">Peminjaman Barang</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <i class="fas fa-user-circle fa-2x text-white"></i>
            </div>
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">{{ auth()->user()->nama }}</a>
                <small class="text-muted">{{ ucwords(auth()->user()->role) }}</small>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @if (in_array(auth()->user()->role, ['admin', 'super admin']))
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- Data Barang -->
                    <li class="nav-item">
                        <a href="{{ route('barang.index') }}"
                            class="nav-link {{ Request::is('barang*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-box"></i>
                            <p>Data Barang</p>
                        </a>
                    </li>

                    <!-- Konfirmasi Peminjaman -->
                    <li class="nav-item">
                        <a href="{{ route('peminjaman.konfirmasi') }}"
                            class="nav-link {{ Request::is('peminjaman/konfirmasi') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-check"></i>
                            <p>
                                Konfirmasi Peminjaman
                                @php $notifCount = App\Models\Peminjaman::where('status', 'menunggu')->count(); @endphp
                                @if ($notifCount > 0)
                                    <span class="right badge badge-warning">{{ $notifCount }}</span>
                                @endif
                            </p>
                        </a>
                    </li>

                    <!-- Konfirmasi Pengembalian -->
                    <li class="nav-item">
                        <a href="{{ route('pengembalian.konfirmasi') }}"
                            class="nav-link {{ Request::is('pengembalian/konfirmasi') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-undo"></i>
                            <p style="white-space: nowrap;">Konfirmasi Pengembalian
                                @php $notifPengembalian = App\Models\Pengembalian::where('status_barang', 'menunggu')->count(); @endphp
                                @if ($notifPengembalian > 0)
                                    <span class="right badge badge-warning">{{ $notifPengembalian }}</span>
                                @endif
                            </p>
                        </a>
                    </li>

                    <!-- Riwayat Peminjaman -->
                    <li class="nav-item">
                        <a href="{{ route('peminjaman.index') }}"
                            class="nav-link {{ Request::is('peminjaman') && !Request::is('peminjaman/konfirmasi') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-history"></i>
                            <p>Riwayat Peminjaman</p>
                        </a>
                    </li>

                    <!-- Data User -->
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Data User</p>
                        </a>
                    </li>

                    @if (auth()->user()->role == 'super admin')
                        <!-- Data Admin -->
                        <li class="nav-item">
                            <a href="{{ route('admins.index') }}"
                                class="nav-link {{ Request::is('admins*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>Data Admin</p>
                            </a>
                        </li>
                    @endif
                @else
                    <!-- Beranda (User) -->
                    <li class="nav-item">
                        <a href="{{ route('beranda') }}"
                            class="nav-link {{ Request::is('beranda') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Beranda</p>
                        </a>
                    </li>

                    <!-- Riwayat Peminjaman (User) -->
                    <li class="nav-item">
                        <a href="{{ route('peminjaman.index') }}"
                            class="nav-link {{ Request::is('peminjaman*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-history"></i>
                            <p>Riwayat Peminjaman</p>
                        </a>
                    </li>
                @endif

                <!-- Profil -->
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}"
                        class="nav-link {{ Request::is('profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Profil</p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-left w-100">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
