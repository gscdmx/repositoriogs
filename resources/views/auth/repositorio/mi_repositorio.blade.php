@extends('template.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.css"/>


  <section class="forms">
  <div class="container-fluid">
        
         
  <div class="row">

  <div class="col-lg-12">

     <div class="card">
      <div class="card-header d-flex align-items-center">
      <h4>MIS CARPETAS </h4>
    </div>

    <div class="card-body">

       @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
        @endif


          <div class="form-group row">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#example">CREAR CARPETA</a>
          </div>
        </div>
  





    <div class="row">

    @foreach($miscarpetas as $carpeta)
                       
             <div class="col-xl-3 col-sm-6 mb-3">
               <div class="card text-white bg-primary o-hidden h-100">
                 <div class="card-body">
                   <div class="card-body-icon">
                     <i class="fa fa-user"></i>
                   </div>
                   <div class="mr-5">{{$carpeta->nombre_carpeta}}  </div>
                 </div>
                 <a class="card-footer clearfix small z-1" href="{{url('/repositorios/misarchivos2').'/'.$carpeta->id}}">
                   <span class="float-left">Ver archivos</span>
                   <span class="float-right">
                     <i class="fa fa-chevron-right"></i>
                   </span>
                 </a>
               </div>
             </div>
        


    @endforeach

     </div>






     

  </div>
  </div>
  </section>







<!-- Modal para crear nombre a la carpeta-->
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Crear carpeta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">


        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/repositorio/guardarcarpeta') }}">
        @csrf
        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Nombre de la Carpeta:</label>
          <div class="col-sm-10">
            <!--<input type="text" class="form-control">-->
            <textarea id="nombre_carpeta" name="nombre_carpeta" class="form-control" ></textarea>
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button  type="submit"  class="btn btn-primary">Guardar</button>
      </div>

    </form>
    </div>
  </div>
</div>



@endsection



@section('js')  
 
@endsection



@section('customjs')


<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.js"></script>

<script type="text/javascript">
  

  $(document).ready( function () {
    $('#archivoslist').DataTable();
} );

</script>



@endsection






