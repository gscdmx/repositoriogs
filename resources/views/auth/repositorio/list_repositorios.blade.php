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
      
       <div class="col-xl-3 col-sm-3 mb-3">
      
              <div class="card-body" >
               
                <a class="card-footer clearfix small z-1" href="{{url('/repositorios/misarchivos')}}" >
                <div class="mr-5"><img class="card-img-top o-hidden h-30" style="width: 5rem height: 5rem;" src="{{url('recursos/img/carpeta.png')}}"  alt="Card image cap">Mi repositorio</div>

                <span class="float-left o-hidden h-30" style="color: #000000a1"></span>
                <span class="float-right" >  
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
              <div class="card-body">
              <a class="card-footer clearfix small z-1" href="{{url('/repositorios/repositoriousuarios').'/'.$usuario->id}}" >
                <div class="mr-5"><i class="fa fa-user"></i> {{$usuario->name}}<img class="card-img-top o-hidden h-30" style="width: 10rem height: 5rem;" src="{{url('recursos/img/carpeta.png')}}"  alt="Card image cap"> </div>
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








