<!doctype html>
<html lang="en" dir="ltr" data-bs-theme="light">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | Hope UI</title>
    
    <link rel="shortcut icon" href="{{ asset('build/assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/core/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/vendor/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/hope-ui.min.css?v=5.0.0') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/custom.min.css?v=5.0.0') }}">
    <style>
    .btn:focus, 
    .btn:active, 
    .btn.active, 
    .btn:focus-visible, 
    .btn-primary:focus, 
    .btn-primary:active {
        box-shadow: none !important;
        outline: none !important;
        border-color: transparent !important;
    }

    .btn:hover {
        color: #ffffff !important;
        filter: brightness(90%); 
        transform: none !important; 
    }

    .btn-primary:hover { background-color: #3a57e8 !important; border-color: #3a57e8 !important; }
    .btn-success:hover { background-color: #1aa053 !important; border-color: #1aa053 !important; }
    .btn-danger:hover  { background-color: #c03221 !important; border-color: #c03221 !important; }
    .btn-warning:hover { background-color: #f16a1b !important; border-color: #f16a1b !important; color: #fff !important; }
    .btn-info:hover    { background-color: #08b1ba !important; border-color: #08b1ba !important; }

    .iq-header-img, .btn-icon:hover {
        box-shadow: none !important;
    }
</style>
  </head>
  <body class="  ">
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>
    </div>
    
    <!-- Sidebar -->
    @include('layouts.partials.sidebar')

    <main class="main-content">
      <div class="position-relative iq-banner">
        <!-- Navbar -->
        @include('layouts.partials.navbar')

        <!-- Header Banner -->
        @include('layouts.partials.header-banner')
      </div>

      <!-- Konten Utama -->
      <div class="container-fluid content-inner" style="margin-top: 10px !important;">
        @yield('content')
      </div>

      <footer class="footer">
          <div class="footer-body">
              <div class="right-panel">
                  © {{ date('Y') }} Muhammad Haidar Almer Rafif
              </div>
          </div>
      </footer>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('build/assets/js/core/libs.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/core/external.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/charts/widgetcharts.js') }}"></script>
    <script src="{{ asset('build/assets/js/charts/dashboard.js') }}"></script>
    <script src="{{ asset('build/assets/js/hope-ui.js') }}" defer></script>
  </body>
</html>