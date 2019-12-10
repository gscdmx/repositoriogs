<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>cdmx</title>
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
   <!-- <link rel="shortcut icon" href="{{url('/recursos')}}/img/favicon.ico">-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner">
            <div class="logo text-uppercase">
               
                <img src="{{url('recursos/img/Logo-cdmx_2019.png')}}" height="9%" width="60%">
                <span></span><p><strong  class="text-primary" >REPOSITORIO</strong></p>
                 <p><strong  align="center"  class="text-secundary"  style="color:#000000"; >CGGSCYPJ</strong></p>
                 
                <!-- <span></span><strong class="text-primary">REPOSITORIO</strong>
                 <strong class="text-secundary">GSCYPJ</strong>-->
            </div>
            <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>-->
            <form method="POST" action="{{ route('login') }}" class="text-left form-validate">
              {{ csrf_field() }}
               <div class="form-group-material">
                <input id="email" type="text" name="email" required data-msg="Por favor ingresa tu usuario" class="input-material">
                <label for="login-email" class="label-material">Usuario</label>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

              </div>
              <div class="form-group-material">
                <input id="password" type="password" name="password" required data-msg="Por favor ingresa tu clave" class="input-material">
                <label for="login-password" class="label-material">Password</label>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

              </div>
              <div class="form-group text-center">


                <button class="btn btn-primary" >Ingresar</button>
                <!-- This should be submit button but I replaced it with <a> for demo purposes-->
              </div>
            </form><!--<a href="#" class="forgot-pass">olvide mi contraseña</a><small>Crear cuenta </small><a href="register.html" class="signup">Signup</a>-->
          </div>
          <div class="copyrights text-center">
            <p>  <a href="https://www.gabinetedeseguridad.cdmx.gob.mx/" class="external">Gabinete de Seguridad Ciudadana CDMX</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{url('/recursos')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('/recursos')}}/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="{{url('/recursos')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/recursos')}}/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="{{url('/recursos')}}/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="{{url('/recursos')}}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{url('/recursos')}}/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="{{url('/recursos')}}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="{{url('/recursos')}}/js/front.js"></script>
  </body>
</html>
