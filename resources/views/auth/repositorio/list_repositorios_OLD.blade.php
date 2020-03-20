@extends('template.header')

@section('content')

<?php 
$array_permisos = array("0");
if (isset(\Auth::user()->permisos)) {
 if(\Auth::user()->permisos!='N;'){
     $array_permisos =  unserialize(\Auth::user()->permisos);
  }
   
}
?>




  <section class="forms">
  <div class="container-fluid">
          
          <!--<header> 
            <h1 class="h3 display">Forms            </h1>
          </header>-->
  <div class="row">

  <div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>REPOSITORIO CGGSCYPJ CDMX</h4>
    </div>
    <div class="card-body">


 <?php if(in_array(2, $array_permisos)):?>

      <div class="row">
      
       <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-30">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="mr-5">MI REPOSITORIO </div>
              </div>
              <a class="card-footer clearfix small z-1" href="{{url('/repositorios/misarchivos')}}">
                <span class="float-left">Ver Repositorio</span>
                <span class="float-right">
                  <i class="fa fa-chevron-right"></i>
                </span>
              </a>
            </div>
          </div>

    </div>
           

 <?php endif?>



   


<?php if(in_array(3, $array_permisos)):?>

 <div class="row">

 @foreach($listusuarios as $usuario)
                    
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-user"></i>
                </div>
                <div class="mr-5">{{$usuario->name}} </div>
              </div>
              <a class="card-footer clearfix small z-1" href="{{url('/repositorios/repositoriousuarios').'/'.$usuario->id}}">
                <span class="float-left">Ver Repositorio</span>
                <span class="float-right">
                  <i class="fa fa-chevron-right"></i>
                </span>
              </a>
            </div>
          </div>
     


 @endforeach

  </div>
        
  <?php endif?>           




    </div>
    </div>
  </div>

  </div>
  </div>
  </section>









@endsection





@section('js')  
 
@endsection





@section('customjs')








@endsection





