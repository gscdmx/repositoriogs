<!DOCTYPE html>

<?php 

$array_permisos = array("0");

if (isset(\Auth::user()->permisos)) {
 if(\Auth::user()->permisos!='N;'){
     $array_permisos =  unserialize(\Auth::user()->permisos);
  }
   
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CGSCPJ CDMX</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{url('/recursos')}}/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{url('/recursos')}}/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{url('/recursos')}}/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{url('/recursos')}}/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{url('/recursos')}}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{url('/recursos')}}/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{url('/recursos')}}/css/custom.css">
    <!-- Favicon-->
    <!--<link rel="shortcut icon" href="img/favicon.ico">-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->




  </head>
  <body>
    
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="{{url('/recursos')}}/img/user.png" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">{{ Auth::user()->name }}</h2><!--<span>Web Developer</span>-->
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="{{url('/home')}}" class="brand-small text-center"> <strong>CD</strong><strong class="text-primary">MX</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Menú</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="{{url('/home')}}"> <i class="icon-padnote"></i>°INICIO</a></li>
            <li><a href="{{url('/repositorios/list')}}"> <i class="icon-list"></i>Repositorio</a></li>
                        
          
           
             <?php if(in_array(1, $array_permisos)):?>
             <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>Usuarios </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{url('/nuevoUsuario')}}">Nuevo usuario</a></li>
                <li><a href="{{url('/listadosUsuarios')}}">Listado de usuarios</a></li>
              </ul>
            </li>
             <?php endif?>
             
             
           
            
         
             
          
       
      
          </ul>
        </div>
        
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>CGSCPJ </span><strong class="text-primary">CDMX</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                
                
                <!-- Log out-->
                <li class="nav-item"><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link logout"> <span class="d-none d-sm-inline-block">Salir</span><i class="fa fa-sign-out"></i></a>
                                                   
                                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                       {{ csrf_field() }}
                                                   </form>


                                                   </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
   
      <!-- Header Section-->

      <!-- Statistics Section-->

      <!-- Updates Section -->


      @yield('content')

<!--<center>
    <font id="font_footer"><strong>Jefatura de Gobierno Coordinación General del Gabinete de Seguridad Ciudadana y Procuración de Justicia   <?php echo date('Y');?> <br />
      Plaza de la Constitución No. 2 &bull; Colonia Centro &bull; Delegación Cuauhtémoc &bull; C.P.   06068 &bull; México, CDMX  &bull; Conmutador: (55) 53458026</strong></font>
  </center>-->





       <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
           <div class="col-sm-15">
            <center> <p>Jefatura de Gobierno Coordinación General del Gabinete de Seguridad Ciudadana y Procuración de Justicia   <?php echo date('Y');?></p></center>
              <center><p>Plaza de la Constitución No. 2 &bull; Colonia Centro &bull; Delegación Cuauhtémoc &bull; C.P.   06068 &bull; México, CDMX  &bull; Conmutador: (55) 53458026</p></center>
            </div>
            <div class="col-sm-15 text-right">
              <p><a href="https://bootstrapious.com" class="external">CDMX</a></p>
        </div>
      </footer>
    </div>

     @yield('js')

   


    <!-- JavaScript files-->
    <script src="{{url('/recursos')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('/recursos')}}/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="{{url('/recursos')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/recursos')}}/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="{{url('/recursos')}}/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="{{url('/recursos')}}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{url('/recursos')}}/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{url('/recursos')}}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{url('/recursos')}}/js/charts-home.js"></script>
    <!-- Main File-->
    <script src="{{url('/recursos')}}/js/front.js"></script>

    <script src="{{url('/recursos')}}/js/charts-custom.js"></script>


     @yield('customjs')

  </body>
</html>