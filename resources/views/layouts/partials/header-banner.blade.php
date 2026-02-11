<div class="iq-navbar-header">
    <div class="container-fluid iq-container">
        <div class="row">
            <div class="col-md-12">
                <div class="flex-wrap d-flex justify-content-between align-items-center text-white pb-5">
                    <div>
                        <h1>Hello {{ Auth::user()->nama_lengkap }}</h1>
                        <p>Selamat datang kembali di sistem manajemen inventaris barang.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="iq-header-img">
        <img src="{{ asset('build/assets/images/dashboard/top-header.png') }}" alt="header" class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
    </div>
</div>