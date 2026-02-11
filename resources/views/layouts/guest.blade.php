<!doctype html>
<html lang="en" dir="ltr" data-bs-theme="light">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | Hope UI</title>
    
    <link rel="shortcut icon" href="{{ asset('build/assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/core/libs.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/hope-ui.min.css?v=5.0.0') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/css/custom.min.css?v=5.0.0') }}">

    <style>
        /* Masukkan fix button yang Anda minta tadi agar tombol login tidak jelek */
        .btn:focus, .btn:active, .btn:focus-visible {
            box-shadow: none !important;
            outline: none !important;
        }
        .btn:hover {
            filter: brightness(90%);
        }
    </style>
  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    
    <div id="loading">
      <div class="loader simple-loader">
          <div class="loader-body"></div>
      </div>    
    </div>

    <div class="wrapper">
        @yield('content')
    </div>

    <!-- Library Bundle Script -->
    <script src="{{ asset('build/assets/js/core/libs.min.js') }}"></script>
    <!-- External Library Bundle Script -->
    <script src="{{ asset('build/assets/js/core/external.min.js') }}"></script>
    <!-- App Script -->
    <script src="{{ asset('build/assets/js/hope-ui.js') }}" defer></script>
  </body>
</html>