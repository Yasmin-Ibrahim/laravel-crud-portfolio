<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard Portofolio Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/fontawesome-free-7.0.0-web/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body>

<!-- ======= Header ======= -->
  <header id="header" class="header bg-header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="\" class="logo d-flex align-items-center">
        <div class="port">
            <i class="fa-regular fa-address-card"></i>
        </div>
        <span class="d-none d-lg-block">Portofolio</span>
      </a>
    </div><!-- End Logo -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar bg-sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="\">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('client.index')}}">
          <i class="fa-solid fa-users"></i>
          <span>clients</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('about.index')}}">
          <i class="fa-regular fa-handshake"></i>
          <span>About me</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('skill.index')}}">
          <i class="fa-solid fa-wand-magic-sparkles"></i>
          <span>Skills</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('project.index')}}">
          <i class="fa-solid fa-diagram-project"></i>
          <span>Projects</span>
        </a>
      </li>

      <li class="nav-item nav-item-contacts">
        <a class="nav-link collapsed" href="{{route('contact.index')}}">
          <i class="fa-solid fa-envelope"></i>
          <span>contacts</span>
        </a>
      </li>

      <a href="{{route('portfolio')}}" class="Portfolio" target="_blank">Portfolio</a>

    </ul>

  </aside>

  <div class="pt-5">
        @yield('content')
  </div>

  <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>

</body>

</html>
