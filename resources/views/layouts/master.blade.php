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
   <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">-->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

      <!-- Scripts -->
      @vite(['resources/js/app.js'])
  
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
                <p>Dashboard</p>
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
                  <p>Users</p>
                </a>
              </li>
            @endif
          @endisset

          @isset($user)
            @if($user->usertype == "admin")    
              <li class="{{ 'device-register' == request()->path() ? 'active' : '' }}">
                <a href="/device-register">
                  <i class="bi bi-cpu"></i>
                  <p>Devices</p>
                </a>
              </li>
            @endif
          @endisset

          @isset($user)
            @if($user->usertype == "admin")  
              <li class="{{ 'instalacion-register' == request()->path() ? 'active' : '' }}">
                <a href="/instalacion-register">
                  <i class="bi bi-house-gear"></i>
                  <p>Installation</p>
                </a>
              </li>
            @endif
          @endisset


          @isset($user)
            @if($user->usertype == "user") 
              <li class="{{ 'user-dashboard' == request()->path() ? 'active' : '' }}">
                <a href="/user-dashboard">
                  <i class="bi bi-clipboard2-data"></i>
                  <p>Abstract</p>
                </a>
              </li>
            @endif
          @endisset
      
          @isset($user)
            @if($user->usertype == "user") 
              <li class="{{ 'user-installation' == request()->path() ? 'active' : '' }}"> 
                <a href="/user-installation">
                  <i class="bi bi-house-check"></i>
                  <p>Installation</p>
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
            <!-- <a class="navbar-brand" href="#pablo">Table List</a> -->
            <a class="navbar-brand">Hi, {{ Auth::user()->name }}.</a>
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
           
          <li class="nav-item dropdown">
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
           </li>


           <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="now-ui-icons loader_gear"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  @isset($user)
                  @if($user->usertype == "user")
                  <a class="dropdown-item" href="/user-profile">
                    <i class="bi bi-person-fill"></i>
                    Profile
                  </a>
                  @endif
                  @endisset
                  <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                      </svg>
                      Logout     
                  </a>
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
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <!--<li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li> -->
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

  <script src="../assets/dataTables.min.js"></script>
  <!--<script> src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"</script>-->

  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>

  <script src="../assets/sweetalert.js"></script>
  <script>
      @if (session('status'))
          //alert('{{ session('status') }}');
          swal({
            title: '{{ session('status') }}',
            //text: "You clicked the button!",
            icon: '{{ session('statuscode') }}',
            button: "OK",
          });
      @endif
  </script>

  @yield('scripts')
</body>

</html>