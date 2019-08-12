@extends('template.header')

@section('content')



  <section class="forms">
        <div class="container-fluid">
          
          <!--<header> 
            <h1 class="h3 display">Forms            </h1>
          </header>-->
          <div class="row">
         



<div class="col-lg-12">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h4>CGSCPJ CDMX</h4>
    </div>
    <div class="card-body">
      <form class="form-horizontal" method="POST" action="{{ url('/guardarUsuario') }}">

      {{ csrf_field() }}




      @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
      @endif




        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Nombre:</label>
          <div class="col-sm-10">
           <input type="text" class="form-control" id="user" name="user">
            <!--<textarea id="motivo" name="motivo" class="form-control" ></textarea>-->
            @if ($errors->has('user')) <p  style="color: red">{{ $errors->first('user') }}</p> @endif
          </div>
        </div>


        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">correo:</label>
          <div class="col-sm-10">
           <input type="text" class="form-control" id="email" name="email">
            <!--<textarea id="motivo" name="motivo" class="form-control" ></textarea>-->
            @if ($errors->has('email')) <p  style="color: red">{{ $errors->first('email') }}</p> @endif
          </div>
        </div>


        <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Clave:</label>
          <div class="col-sm-10">
           <input type="password" class="form-control" id="password" name="password">
            <!--<textarea id="motivo" name="motivo" class="form-control" ></textarea>-->
            @if ($errors->has('password')) <p  style="color: red">{{ $errors->first('password') }}</p> @endif
          </div>
        </div>


         <div class="line"></div>
        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Confirmar clave:</label>
          <div class="col-sm-10">
           <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            @if ($errors->has('password_confirmation')) <p  style="color: red">{{ $errors->first('password_confirmation') }}</p> @endif
            <!--<textarea id="motivo" name="motivo" class="form-control" ></textarea>-->
          </div>
        </div>




       
          
        <!--  <br>
           <div class="form-group row">
          <label class="col-sm-2 form-control-label">Temas Relevantes:</label>
          <div class="col-sm-10">
            
            <textarea id="motivo" name="motivo" class="form-control" ></textarea>
          </div>
        </div>-->
        
        
          <!-- TABLA DE ROLES
                   ================================================-->
                     <div class="row">
                         <div class="col-lg-12">
                             <div class="panel panel-default">
                                 <div class="panel-heading">
                                     Permisos 
                                 </div>
                                 <!-- /.panel-heading -->
                                 <div class="panel-body">
                                    <div class="table-responsive">
                                     <div class="dataTable_wrapper">

                                         <table  class="table table-bordered table-striped">
                                             <thead>
                                                 <tr>
                                                     <th>#</th>
                                                     <th>Permiso</th>
                                                     <th>Descripción</th>
                                                     <th><input name="select_all_app" id="select_all_app" type="checkbox" value="1"/> Todos</th>
                                                 </tr>
                                             </thead>

                                             <tbody>
                                              @foreach ($permisos as $permiso)
                                              <tr>
                                               <td>{{ $permiso->id }}</td>
                                               <td>{{ $permiso->permiso }}</td>
                                                 <td>{{ $permiso->descripcion }}</td>
                                                 <td>
                                                   <input  class="checkBoxClass_app" name="permisos[]" value="{{ $permiso->id }}" type="checkbox" @if(in_array($permiso->id, old('permisos', []))) checked @endif >
                                                 </td>
                                              </tr>
                                               @endforeach
                                              </tbody>


                                         </table>
                                     </div>
                                      </div>

                                     <!-- /.table-responsive -->
                             
                                 </div>
                                 <!-- /.panel-body -->
                             </div>
                             <!-- /.panel -->
                         </div>
                         <!-- /.col-lg-12 -->
                     </div>
                     <!-- /TABLA -->

         


        <div class="line"></div>
        <div class="form-group row">
          <div class="col-sm-4 offset-sm-2">
            <!--<button type="submit" class="btn btn-secondary">Cancel</button>-->
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </form>
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


<script type="text/javascript">

$("#select_all").click(function () {
    $(".checkBoxClass").prop('checked', $(this).prop('checked'));
});

$("#select_all_app").click(function () {
    $(".checkBoxClass_app").prop('checked', $(this).prop('checked'));
});


</script>

@endsection








