<!doctype html>
<html lang="en">
  <head>
    <title>WiFiCap</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Material Kit CSS -->
    <link href="{{mix('/css/ui.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{mix('/css/ui.css')}}">
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">

    <link rel="stylesheet" href="{{mix('/css/app.css')}}">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-absolute bg-dark fixed-top">
        <div class="container-fluid">
            <div class="navbar-wrapper">
                <div class="navbar-toggle">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="#pablo">Dashboard</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
    
                <ul class="navbar-nav">
    
                @guest
                
                <li class="nav-item">
                    <a class="nav-link" href="/login2">
                        <p>Login</p>
                    </a>
                </li>
    
                @if (Route::has('register'))
    
                <li class="nav-item">
                    <a class="nav-link" href="/register2">
                        <p>Registro</p>
                    </a>
                </li>
                    
                @endif
            @else
    
            <li class="nav-item">
                <a class="nav-link" href="#pablo">
                    <p> {{ Auth::user()->name }} </p>
                </a>
            </li>
                
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
            </li>         
                
            @endguest 
                   
                </ul>
            </div>
        </div>
    </nav>

    <div class="wrapper">
    <div class="sidebar" data-color="red">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
      <div class="logo">
          <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            WiFi-Cap
          </a>
      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">        
          <li class="active ">
              <a href="../dashboard.html">
                  <p>Menú Principal</p>
              </a>
          </li>

          <li>
              <a href="../editar.blade.php">
                  <p>Modificar Perfil</p>
              </a>
          </li>

          <li>
              <a href="../map.html">
                  <p>Alta Invidente</p>
              </a>
          </li>

          <li>
              <a href="../notifications.html">
                  <p>Contactos de emergencia</p>
              </a>
          </li>

          <li>
              <a href="../user.html">
                  <p>Status de Gorra</p>
              </a>
          </li>

        </ul>
      </div>
    </div>
  </div>
</body>
  <!--   Core JS Files   -->
  <script src="{{mix ('/js/ui.js') }}" ></script>
  <script src="{{mix ('/js/ui.js') }}"></script>
  <script src="{{mix ('/js/app.js') }}"></script>

  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.js" type="text/javascript"></script>
</html>