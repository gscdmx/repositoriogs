@extends('template.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.css"/>
<!--<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">-->
<!--<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>-->

<!--SELECT 2-->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />




<section class="forms">
        <div class="container-fluid">
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
                                                                   <td>
                                                                     <a href="{{url('/archivos_repositorio').'/'.$archivo->nombre_archivo}}" class="btn btn-primary" download>Descargar</a>
                                                                    <!--esto iria en un if dependiendo el permiso-->
                                                                     <a href="{{url('/repositorios/compartidos').'/'.$archivo->nombre_archivo}}" class="btn btn-primary getIDcompartir" data-id="{{$archivo->id}}" data-toggle="modal" data-target="#modal_compartirr">Compartir</a>
                                                                    <!---->
                                                                  </td> 
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
</section>




<!-- Modal para compartir archivo nuevo-->
<div class="modal fade" id="modal_compartirr" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                      <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Compartir</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                    </button>
                                                          </div>

           <div class="modal-body">
                    <!--<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('/repositorio/shared_file')}}">-->
                           @csrf 
                           <input type="hidden" name="IDcapeta" id="IDcapeta" value="{{$id_carpeta}}">
                           
                           <div class="line"></div>
                           <div class="form-group row">
                          <label class="col-sm-2 form-control-label">Compartir a:</label>
          
                                  <div class="col-sm-12">
                                      

                                      <select  class="form-control select2_custom select2-w-100" id="compartir_a" name="compartir_a[]" multiple="multiple">

                                         <option value="">Selecciona...</option>
                                        @foreach($user as $us)
                                         <option value="{{$us->id}}">{{$us->name}}</option>
                                        @endforeach
             
                                      </select>


                                      <input type="hidden" name="id_file" id="id_file">



                                    </div>
                                  </div>
                               </div>
                             <div class="modal-footer">
                           <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                        <button  type="button" id="guardar_compartir" class="btn-save btn btn-primary btn-sm">Guardar</button>
                     </div>
               <!-- </form>-->
           </div>
      </div>
</div>

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

                          <input type="hidden" name="IDcapeta" id="IDcapeta" value="{{$id_carpeta}}">
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
                          <input type="file" id="archivo" name="archivo"  accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf, .rar, ">
                          <!--este es el mensaje de validacion-->
                              @if ($errors->has('archivo')) <p  style="color: red">{{ $errors->first('archivo') }}</p>
                              @endif
                  
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
<!--SELECT 2-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

<script type="text/javascript">
  

  $(document).ready( function () {
    $('#archivoslist').DataTable();
} );

</script>


<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$('#modal_compartirr').multiselect({});
});




$( ".getIDcompartir" ).click(function() {
 var id=$(this).data('id');
 $('#id_file').val(id);
});


$( "#guardar_compartir" ).click(function() {

//cerrar modal
$('#modal_compartirr').modal('hide')

  $.ajax({
    url: "{{url('/repositorio/shared_file')}}",
    type: "POST",
    data: { 
        "_token": "{{ csrf_token() }}",  
        "compartir_a": $('#compartir_a').val(),
        "id_file":  $('#id_file').val()
        }
  }).done(function(response) {

   if(response==1){
    swal("Archivos compartidos con éxito!!!","", "success");
   }

  });

  


});



    $('.select2_custom').select2({ 
    dropdownAutoWidth : true,
    width: 'auto'
});

     $('.select2-w-100').parent().find('span')
        .removeClass('select2-container')
        .css("width", "100%")
        .css("flex-grow", "1")
        .css("box-sizing", "border-box")
        .css("display", "inline-block")
        .css("margin", "0")
        .css("position", "relative")
        .css("vertical-align", "middle")

</script>


@endsection











