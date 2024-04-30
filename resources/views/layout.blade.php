<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    {{-- OLD VIEWPORT --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- NEW VIEWPORT --}}
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/logo/logo-SEDAP-MANTAP.png') }}">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" /> -->

    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />

</head>
<body>
    
<div class="d-flex flex-column position-relative vh-100 main">
  {{-- TOP --}}
  <header class="header d-flex flex-row justify-content-between align-items-center">
    <div class="logo d-flex flex-row justify-content-between align-items-center profil">
      <button class="btn btn-secondary mr-3 buttonColl" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidth" aria-expanded="true" aria-controls="collapseWidthExample" id="collapseBtn">
        <i class="fa fa-align-justify"></i>
      </button>
      <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="logoImage">
      <span>Sedap Mantap</span>
    </div>
    <div class="info">
      <div class="profil">
        <a href="{{ route('home') }}">
          <img src="{{asset('images/avatar/09.png')}}" alt="Avatar" class="avaImage">
        </a>
      </div>
      
      <div class="settings">
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-gear"></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('home') }}">Edit profil</a></li>
            <li><a class="dropdown-item" href="{{ route('home') }}">Change password</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  {{-- END TOP --}}

  
  {{-- CONTENT CONTAINER --}}
  <div class="contentContainer d-flex position-relative ">
    <div class="sidebar">
      <div class="position-relative">
        <div class="collapse collapse-horizontal fixed-left show sidebarCollapse" id="collapseWidth">  
          <div class="d-flex flex-column flex-shrink-0 p-3 h-75" style="width: 280px">
            <hr>
            <div class="sidebarContainer d-flex flex-column justify-content-between">
              <ul id="sidebar" class="nav nav-pills flex-column mb-auto listNav">
                <li class="nav-item">
                  <a id="home" href="{{ route('home') }}" class="nav-link btn-light linkSidebar active link-dark" aria-current="page" >
                    Home
                  </a>
                </li>
                <li>
                    <a id="data" class=" data nav-link btn-light linkSidebar d-flex flex-row justify-content-between align-items-center" data-bs-toggle="collapse" href="#collBranch" role="button" aria-expanded="false" aria-controls="collBranch" >
                      <span>Data Master </span>
                      <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="collapse nav-item" id="collBranch">
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('branch.index') }}">Branch</a></li>
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('jabatan.index') }}">Jabatan</a></li>
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('category.index') }}">Category Product</a></li>
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('brand.index') }}">Brand Product</a></li>
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('subbrand.index') }}">Sub Brand Product</a></li>
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('product.index') }}">Product</a></li>
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('displays.index') }}">Display Product</a></li>
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('customer.index') }}">Customer</a></li>
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('outlet.index') }}">Gerai</a></li>
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('staff.index') }}">Staff</a></li>
                      <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('schedule.index') }}">Schedule Visit</a></li>
                    </ul>
                </li>
                <li>
                  <a id="data" class="data nav-link btn-light linkSidebar d-flex flex-row justify-content-between align-items-center" data-bs-toggle="collapse" href="#dropLaporan" role="button" aria-expanded="false" aria-controls="dropLaporan" >
                    <span>Laporan Analisa</span>
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="collapse nav-item" id="dropLaporan">
                    <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('call') }}">Kunjungan staff</a></li>
                    <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('report.display') }}">Display Toko</a></li>
                    <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('report.usedProduct') }}">Produk Yang Digunakan Gerai</a></li>
                    <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('report.sample') }}">Sample Yang Diberikan</a></li>
                    <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('maps') }}">Peta Sebaran Toko dan Gerai</a></li>
                  </ul>
                </li>
                <li>
                  <a id="log" href="{{ route('log.index') }}" class="nav-link btn-light linkSidebar" >
                    Log Activity
                  </a>
                </li>
              </ul>
              <ul class="nav nav-pills flex-column mb-auto">
                <hr>
                <li>
                  <a href="{{ route('logout') }}" class="nav-link btn-light linkSidebar d-flex flex-row justify-content-between align-items-center">
                    <span>Logout</span>
                    <i class="	fa fa-sign-out"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        {{-- FOR MOBILE --}}
        <div class="collapse collapse-horizontal fixed-left sidebarMobileCollapse" id="collapseWidth">  
          <div class="d-flex flex-column flex-shrink-0 p-3  h-75" style="width: 200px">
            <hr>
            <div class="sidebarContainer d-flex flex-column justify-content-between">
              <ul class="nav nav-pills flex-column mb-auto listNav">
                <li class="nav-item">
                  <a id="homeM" href="{{ route('home') }}" class="nav-link btn-light active link-dark" aria-current="page">
                    Home
                  </a>
                </li>
                <li>
                    <a id="dataM" class="dataM nav-link btn-light d-flex flex-row justify-content-between align-items-center" data-bs-toggle="collapse" href="#collBranch" role="button" aria-expanded="false" aria-controls="collBranch">
                      <span>Data Master </span>
                      <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="collapse nav-item" id="collBranch">
                      <li><a class="nav-link dropdown btn-light" href="{{ route('branch.index') }}">Branch</a></li>
                      <li><a class="nav-link dropdown btn-light" href="{{ route('jabatan.index') }}">Jabatan</a></li>
                      <li><a class="nav-link dropdown btn-light" href="{{ route('category.index') }}">Category Product</a></li>
                      <li><a class="nav-link dropdown btn-light" href="{{ route('brand.index') }}">Brand Product</a></li>
                      <li><a class="nav-link dropdown btn-light" href="{{ route('subbrand.index') }}">Sub Brand Product</a></li>
                      <li><a class="nav-link dropdown btn-light" href="{{ route('product.index') }}">Product</a></li>
                      <li><a class="nav-link dropdown btn-light" href="{{ route('displays.index') }}">Display Product</a></li>
                      <li><a class="nav-link dropdown btn-light" href="{{ route('customer.index') }}">Customer</a></li>
                      <li><a class="nav-link dropdown btn-light" href="{{ route('outlet.index') }}">Gerai</a></li>
                      <li><a class="nav-link dropdown btn-light" href="{{ route('staff.index') }}">Staff</a></li>
                      <li><a class="nav-link dropdown btn-light" href="{{ route('schedule.index') }}">Schedule Visit</a></li>
                    </ul>
                </li>
                <li>
                  <a id="dataM" class="dataM nav-link btn-light linkSidebar d-flex flex-row justify-content-between align-items-center" data-bs-toggle="collapse" href="#dropLaporan" role="button" aria-expanded="false" aria-controls="dropLaporan" >
                    <span>Laporan Analisa</span>
                    <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="collapse nav-item" id="dropLaporan">
                    <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('call') }}">Kunjungan staff</a></li>
                    <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('report.display') }}">Display Toko</a></li>
                    <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('report.usedProduct') }}">Produk Yang Digunakan Gerai</a></li>
                    <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('report.sample') }}">Sample Yang Diberikan</a></li>
                    <li><a class="nav-link dropdown btn-light linkSidebar" href="{{ route('maps') }}">Peta Sebaran Toko dan Gerai</a></li>
                  </ul>
                </li>
                <li>
                  <a id="logM" href="{{ route('log.index') }}" class="nav-link btn-light">
                    Log Activity
                  </a>
                </li>
              </ul>
              <ul class="nav nav-pills flex-column mb-auto">
                <hr>
                <li>
                  <a href="{{ route('logout') }}" class="nav-link btn-light d-flex flex-row justify-content-between align-items-center">
                    <span>Logout</span>
                    <i class="	fa fa-sign-out"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- VIEW OUTPUT -->
  @yield('content')
  {{-- END CONTENT CONTAINER--}}

  {{-- FOOTER --}}
  <footer class="footer d-flex flex-row justify-content-between align-items-center">
    <div class="logo">
      <img src="{{asset('images/logo/Sedap-Mantap-Logo.png')}}" alt="Logo" class="logoImage">
      <span>Sedap Mantap</span>
    </div>
    <div class="info">
      <span class="smallText">Copyright 2023. <span class="reserved"> All rights reserved.</span></span>
    </div>
  </footer>
  {{-- END FOOTER --}}
  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      console.log("Geolocation is not supported by this browser.");
    }
  }

  function showPosition(position) {
    document.getElementById("lat").value = position.coords.latitude;
    document.getElementById("lon").value = position.coords.longitude;
    console.log("Latitude: " + position.coords.latitude + 
    " Longitude: " + position.coords.longitude);
  }


  const data = document.getElementById("data");
  const dataM = document.getElementById("dataM");
  const home = document.getElementById("home");
  const homeM = document.getElementById("homeM");


  if(window.location.pathname == "/log"){
    $('#log').addClass('active link-dark')
    $('#logM').addClass('active link-dark')
    home.classList.remove('active', 'link-dark');
    homeM.classList.remove('active', 'link-dark');
  }else if(window.location.pathname == "/call"){
    $('#staff').addClass('active link-dark')
    $('#staffM').addClass('active link-dark')
    home.classList.remove('active', 'link-dark');
    homeM.classList.remove('active', 'link-dark');
  }  else if(window.location.pathname == "/"){
    home.classList.add('active', 'link-dark');
    homeM.classList.add('active', 'link-dark');
    data.classList.remove('active', 'link-dark')
    dataM.classList.remove('active', 'link-dark')
  }  else if(window.location.pathname !== "/log" || "/call"|| "/"){
    data.classList.add('active', 'link-dark')
    dataM.classList.add('active', 'link-dark')
    home.classList.remove('active', 'link-dark');
    homeM.classList.remove('active', 'link-dark');
  }

  getLocation();
</script>
</body>
</html>