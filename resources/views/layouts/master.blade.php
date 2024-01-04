<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/gotita_emergiendo.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" href="../assets/css/dataTables.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/> -->
  <link rel="stylesheet" href="../assets/css/select2.min.css">



  <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
 
  
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blucito">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | blucito #1E88E5| green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <img src="../../assets/img/gotita_emergiendo_min.png" alt="Logo">
        </a>
        <br>
        <a class="simple-text logo-normal">
          Micromedición IoT
        </a>
      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">

          @isset($user)
            @if($user->usertype == "admin")        
            <li class="{{ 'dashboard' == request()->path() ? 'active' : '' }}">
              <a href="/dashboard">
                <i class="bi bi-clipboard2-data"></i>
                <p>Panel de resumen</p>
              </a>
            </li>
            @endif
          @endisset
        
          <!--<li>
            <a href="./map.html">
              <i class="now-ui-icons location_map-big"></i>
              <p>Maps</p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li> -->

          @isset($user)
            @if($user->usertype == "admin")    
              <li class="{{ 'role-register' == request()->path() ? 'active' : '' }}">
                <a href="/role-register">
                  <i class="bi bi-people-fill"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            @endif
          @endisset

          @isset($user)
            @if($user->usertype == "admin")    
              <li class="{{ 'device-register' == request()->path() ? 'active' : '' }}">
                <a href="/device-register">
                  <i class="bi bi-cpu"></i>
                  <p>Dispositivos</p>
                </a>
              </li>
            @endif
          @endisset

          @isset($user)
            @if($user->usertype == "admin")  
              <li class="{{ 'instalacion-register' == request()->path() ? 'active' : '' }}">
                <a href="/instalacion-register">
                  <i class="bi bi-house-gear"></i>
                  <p>Instalación</p>
                </a>
              </li>
            @endif
          @endisset

          @isset($user)
            @if($user->usertype == "admin")  
              <li class="{{ 'panel-consumo' == request()->path() ? 'active' : '' }}">
                <a href="/panel-consumo">
                  <i class="bi bi-graph-up"></i>
                  <p>Panel de consumo</p>
                </a>
              </li>
            @endif
          @endisset


          @isset($user)
            @if($user->usertype == "user") 
              <li class="{{ 'user-dashboard' == request()->path() ? 'active' : '' }}">
                <a href="/user-dashboard">
                  <i class="bi bi-clipboard2-data"></i>
                  <p>Historial</p>
                </a>
              </li>
            @endif
          @endisset
      
          @isset($user)
            @if($user->usertype == "user") 
              <li class="{{ 'user-installation' == request()->path() ? 'active' : '' }}"> 
                <a href="/user-installation">
                  <i class="bi bi-house-check"></i>
                  <p>Instalación</p>
                </a>
              </li>
            @endif
          @endisset

        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
      <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand">Hola, {{ Auth::user()->name }}.</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">

          <!-- Search -->
            <!--<form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form> -->

            <ul class="navbar-nav">

            <!--<li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li> --> 
           
          <!-- <li class="nav-item dropdown">
             <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 {{ Auth::user()->name }}
             </a>             
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">           
                       @csrf        
                  </form>
             </div>
           </li> -->


           <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons loader_gear"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  @isset($user)
                  @if($user->usertype == "user")
                  <a class="dropdown-item" href="/user-profile">
                    <i class="bi bi-person"></i>
                    Perfil
                  </a>
                  @endif
                  @endisset
                  <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    {{ __('Salir') }}   
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">           
                    @csrf        
               </form>
                  <!--<a class="dropdown-item" href="#">Another action</a>-->
                </div>
              </li> 

              
              <!-- <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li> -->

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">

        @yield('content')

      </div>


      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <p>Micromedición IoT</p>
              </li>
              <!--<li>
                <a href="http://presentation.creative-tim.com">
                  Acerca de nosotros
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li> -->
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Diseñado por<a href="https://www.invisionapp.com" target="_blank">Invision</a>. Programado por <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script defer src="../assets/js/core/bootstrap.min.js"></script>
  
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <script src="../assets/dataTables.min.js"></script>
  <!--<script> src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"</script>-->

  <!-- Chart JS -->
  <script type="module" src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="../assets/sweetalert.js"></script>


  <script>
      @if (session('status'))
          //alert('{{ session('status') }}');
          swal({
            title: '{{ session('status') }}',
            text: "You clicked the button!",
            //icon: '{{ session('statuscode') }}',
            icon: "success",
            button: "OK",
          });
      @endif
  </script>

  @yield('scripts')
</body>

</html>