@extends('template.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.css"/>


  <section class="forms">
  <div class="container-fluid">
          
          <!--<header> 
            <h1 class="h3 display">Forms            </h1>
          </header>-->
  <div class="row">

  <div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>Mis archivos </h4>
    </div>
    <div class="card-body">

       @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif


       <div class="form-group row">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Subir Archivo Nuevo</a>
          </div>
        </div>
          
      


        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Listado de archivos</h4>
            </div>

            <div class="form-group row">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#example">crear carpeta</a>
          </div>





            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="archivoslist">
                  <thead>
                    <tr>
                      <th>Descripción</th>
                      <th>Opciones</th>
                     
                    </tr>
                  </thead>
                  <tbody>


                     @foreach($misarchivos as $archivo)
                    
                    <tr>
                      
                      <td>{{$archivo->descripcion}}</td>
                      <td><a href="{{url('/archivos_repositorio').'/'.$archivo->nombre_archivo}}" class="btn btn-primary" download>Descargar</a></td>
                      

                    </tr>

                    @endforeach
                   


                   
                

                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

   

















    </div>
    </div>
  </div>

  </div>
  </div>
  </section>



<!-- Modal para subir archivo nuevo-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Subir Documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/repositorio/guardararchivo') }}">
        @csrf
        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Descripción del Archivo:</label>
          <div class="col-sm-10">
            <!--<input type="text" class="form-control">-->
            <textarea id="descripcion" name="descripcion" class="form-control" ></textarea>
          </div>
        </div>


         <div class="form-group row">
          <label class="col-sm-2 form-control-label">Subir archivo: </label>
          <div class="col-sm-10">
        <input type="file" id="archivo" name="archivo"  accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
        <!--este es el mensaje de validacion-->
            @if ($errors->has('archivo')) <p  style="color: red">{{ $errors->first('archivo') }}</p> @endif

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






<!-- Modal para crear nombre a la carpeta-->
<div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     
      <div class="modal-body">


        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/repositorio/guardararchivo') }}">
        @csrf
        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Nombre de la Carpeta:</label>
          <div class="col-sm-10">
            <!--<input type="text" class="form-control">-->
            <textarea id="carpeta" name="carpeta" class="form-control" ></textarea>
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








