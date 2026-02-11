<aside class="sidebar sidebar-default sidebar-white sidebar-base navs-rounded-all">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="{{ route('dashboard') }}" class="navbar-brand">
            <h4 class="logo-title">INVENTARIS</h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list">
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 3H10V10H3V3Z" fill="currentColor"/><path d="M14 3H21V10H14V3Z" fill="currentColor"/><path d="M14 14H21V21H14V14Z" fill="currentColor"/><path d="M3 14H10V21H3V14Z" fill="currentColor"/></svg>
                        </i>
                        <span class="item-name">Dashboard</span>
                    </a>
                </li>

                @if(Auth::check() && Auth::user()->role_id == 1)
                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#">
                            <span class="default-icon">Master Data</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none"><path d="M7 7H17V17H7V7Z" fill="currentColor" opacity="0.4"/><path d="M3 3H10V10H3V3Z" fill="currentColor"/><path d="M14 3H21V10H14V3Z" fill="currentColor"/><path d="M14 14H21V21H14V14Z" fill="currentColor"/><path d="M3 14H10V21H3V14Z" fill="currentColor"/></svg>
                            </i>
                            <span class="item-name">Kategori Barang</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('barang*') ? 'active' : '' }}" href="{{ route('barang.index') }}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none"><path d="M2 7L12 2L22 7V17L12 22L2 17V7Z" fill="currentColor" opacity="0.4"/><path d="M12 22V12L22 7M12 12L2 7" stroke="currentColor" stroke-width="1.5"/></svg>
                            </i>
                            <span class="item-name">Data Barang</span>
                        </a>
                    </li>
                    
                    <li><hr class="hr-horizontal"></li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#">
                            <span class="default-icon">Laporan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('report*') ? 'active' : '' }}" href="{{ route('report.index') }}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none"><path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="1.5"/><path d="M12 18V12M12 12L9 9M12 12L15 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </i>
                            <span class="item-name">Laporan Harian</span>
                        </a>
                    </li>
                @endif

                <li><hr class="hr-horizontal"></li>
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#">
                        <span class="default-icon">Transaksi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('peminjaman*') ? 'active' : '' }}" href="{{ route('peminjaman.index') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none"><path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="currentColor" stroke-width="1.5"/></svg>
                        </i>
                        <span class="item-name">Peminjaman</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('detailpeminjaman*') ? 'active' : '' }}" href="{{ route('detailpeminjaman.index') }}">
                        <i class="icon">
                            <svg width="20" viewBox="0 0 24 24" fill="none"><path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="currentColor" opacity="0.4"/></svg>
                        </i>
                        <span class="item-name">Detail Peminjaman</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</aside>