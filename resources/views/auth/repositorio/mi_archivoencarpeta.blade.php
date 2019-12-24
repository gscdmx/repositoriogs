@extends('template.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.css"/>
<!--<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">-->
<!--<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>-->
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
                                                                     <a href="{{url('/repositorios/compartidos').'/'.$archivo->nombre_archivo}}" class="btn btn-primary" data-toggle="modal" data-target="#modal_compartirr">Compartir</a>
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
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">
                           @csrf
                           <input type="hidden" name="IDcapeta" id="IDcapeta" value="{{$id_carpeta}}">
                           
                           <div class="line"></div>
                           <div class="form-group row">
                           <label class="col-sm-2 form-control-label">Compartir a:</label>
          
                                  <div class="col-sm-8">
                                  <select  class="form-control" id="compartir_a" name="compartir_a">

                                         <option value="">Selecciona...</option>
                                         <optgroup label="Equipo CGGSCYPJ">
                                         <option value="tomas@cdmx">Pliego Calvo Tomás</option>
                                         <option value="luz@cdmx">Rosas Lara María de la Luz</option>
                                         <option value="elizabeth@cdmx">Domínguez Guadarrama Elizabeth</option>
                                         <option value="julia@cdmx">Rodríguez León Julia Smaye</option>
                                         <option value="Tonatihu@cdmx">Arteaga Hernández Ollín Tonatihu</option>
                                         <option value="elias@cdmx">Varela Casas Elías </option>
                                         <option value="itzel@cdmx">Ortíz Aguilar Itzel</option>
                                         <option value="presentaciones@cdmx">Presentaciones CGGSCPJ</option>
                                         <option value="victor@cdmx">Vargaz Gómez Víctor Manuel</option>
                                         <option value="juancarlos@cdmx">Cabrera Reyna Juan Carlos</option>
                                         <option value="naomef@cdmx">Aristegui Cituk Naome Fernanda</option>
                                         <option value="claudia@cdmx">Cadena García Claudia Viridiana</option>
                                         <option value=" mariana@cdmx  ">  Esperanza Ramos Mariana </option>
                                         <option value=" david@cdmx  ">  Hernández García David  </option>
                                         <option value=" jesus@cdmx  ">  Sánchez Moreno Jesús  </option>
                                         <option value=" karina@cdmx ">  Arenas Moreno Karina  </option>
                                         </optgroup>
                                         <optgroup label="ÁLVARO OBREGÓN">
                                         <option value=" aob1@cdmx.gob.mx  ">  Patricio Ruiz Idania  </option>
                                         <option value=" aob2@cdmx.gob.mx  ">  Clairin Guillen Adriana </option>
                                         <option value=" aob3@cdmx.gob.mx  ">  Tejeda Morales Ana Cecilia  </option>
                                         <option value=" aob4@cdmx.gob.mx  ">  Ruiz Córdova Daisy Dayan  </option>
                                         </optgroup>
          
                                         <optgroup label="AZCAPOTZALCO">
                                         <option value=" azc1@cdmx.gob.mx  ">  Ojeda Lara Beatriz  </option>
                                         <option value=" azc2@cdmx.gob.mx  ">  Almeida Suarez Aida </option>
                                         <option value=" azc3@cdmx.gob.mx  ">  Vázquez Roa Yessica Fabiola </option>
                                         <option value=" azc4@cdmx.gob.mx  ">  Ana Gloria Lagunas Martínez   </option>
                                         </optgroup>

                                         <optgroup label="BENITO JUÁREZ">
                                         <option value=" bju1@cdmx.gob.mx  ">  Ruiz Canizales Lorena </option>
                                         <option value=" bju2@cdmx.gob.mx  ">  Castillo Romero Ana Lilia </option>
                                         <option value=" bju3@cdmx.gob.mx  ">  Alatorre Campos Mayra Bárbara </option>
                                         <option value=" bju4@cdmx.gob.mx  ">  Leal Velázquez Karla  </option>
                                         <option value=" bju5@cdmx.gob.mx  ">  Correa De Lucio Adriana </option>

                                         </optgroup>
                                         <optgroup label="COYOACÁN">
                                         <option value=" coy1@cdmx.gob.mx  ">  Vázquez Mora Yazmin </option>
                                         <option value=" coy2@cdmx.gob.mx  ">  Pérez Pérez Ingrid Thalía </option>
                                         <option value=" coy3@cdmx.gob.mx  ">  Peña Grimaldo América Genoveva  </option>
                                         <option value=" coy4@cdmx.gob.mx  ">  Cazares Covarrubias Gladis Del Carmen </option>
                                         <option value=" coy5@cdmx.gob.mx  ">  Camacho Escobar Sandra  </option>

                                         </optgroup>
                                         <optgroup label="CUAUHTÉMOC">
                                         <option value=" cuh1@cdmx.gob.mx  ">  Velázquez Vázquez Cynthia Joanna  </option>
                                         <option value=" cuh2@cdmx.gob.mx  ">  Herrera Martínez Leticia  </option>
                                         <option value=" cuh3@cdmx.gob.mx  ">  Tapia Martínez Loreto Virginia  </option>
                                         <option value=" cuh4@cdmx.gob.mx  ">  Navarrete Salazar Liliana </option>
                                         <option value=" cuh5@cdmx.gob.mx  ">  Murcia Pinedo Grace Montserrat  </option>
                                         <option value=" cuh6@cdmx.gob.mx  ">  Gómez Soto Jazmín </option>
                                         <option value=" cuh7@cdmx.gob.mx  ">  Mejía Padilla Diana </option>
                                         <option value=" cuh8@cdmx.gob.mx  ">  Gómez Cruz Victoria Edith </option>

                                         </optgroup>
                                         <optgroup label="CUAJIMALPA">
                                         <option value=" cuj1@cdmx.gob.mx  ">  Vega Sánchez Juana Areli  </option>
                                         <option value=" cuj2@cdmx.gob.mx  ">  Osorio Cruz Leticia </option>
                                         </optgroup>

                                         <optgroup label="GUSTAVO A. MADERO">
                                         <option value=" gam1@cdmx.gob.mx  ">  Hernández García Rubí Fabiola </option>
                                         <option value=" gam2@cdmx.gob.mx  ">  Balderas Islas Martha Evangelina  </option>
                                         <option value=" gam3@cdmx.gob.mx  ">  González García Elvira  </option>
                                         <option value=" gam4@cdmx.gob.mx  ">  Rodríguez López Gabriela  </option>
                                         <option value=" gam5@cdmx.gob.mx  ">  Castillo Viveros Yanet  </option>
                                         <option value=" gam6@cdmx.gob.mx  ">  Aguilar Herrera Norma </option>
                                         <option value=" gam7@cdmx.gob.mx  ">  Carreón Méndez Eréndira </option>
                                         <option value=" gam8@cdmx.gob.mx  ">  Mendoza Del Barrio Patricia Guadalupe   </option>
                                         </optgroup>

                                         <optgroup label="IZTACALCO">
                                         <option value=" izc1@cdmx.gob.mx  ">  Carrillo Castillo Violeta </option>
                                         <option value=" izc2@cdmx.gob.mx  ">  Posada Martínez Dulce María </option>
                                         <option value=" izc3@cdmx.gob.mx  ">  Becerril Estrada Seltzin Samara </option>
                                         </optgroup>

                                         <optgroup label="IZTAPALAPA">
                                         <option value=" izp1@cdmx.gob.mx  ">  Vázquez Zúñiga Marlenee </option>
                                         <option value=" izp2@cdmx.gob.mx  ">  Rodríguez Robles María Isabel </option>
                                         <option value=" izp4@cdmx.gob.mx  ">  García Olguín Paulina Marisela  </option>
                                         <option value=" izp5@cdmx.gob.mx  ">  Palacios Alejo Irma </option>
                                         <option value=" izp6@cdmx.gob.mx  ">  Ramírez Ramírez Marlen  </option>
                                         <option value=" izp7@cdmx.gob.mx  ">  Silva Carranza María Guadalupe  </option>
                                         <option value=" izp8@cdmx.gob.mx  ">  Hernández Martínez Lizett Denisse </option>
                                         <option value=" izp9@cdmx.gob.mx  ">  Hidalgo Rangel María Verónica </option>
                                         <option value=" izp10@cdmx.gob.mx ">  Pantoja Pérez Laura Alicia  </option>
                                         </optgroup>

                                         <optgroup label="MAGDALENA CONTRERAS">
                                         <option value=" mac1@cdmx.gob.mx  ">  González Ruiz Mayra Isabel  </option>
                                         <option value=" mac2@cdmx.gob.mx  ">  Olmos Hernández María Viviana </option>
                                         </optgroup>


                                         <optgroup label="MIGUEL HIDALGO">
                                         <option value=" mih1@cdmx.gob.mx  ">  Cedillo Lara Mary Carmen  </option>
                                         <option value=" mih2@cdmx.gob.mx  ">  Uribe Rivas Jaqueline </option>
                                         <option value=" mih3@cdmx.gob.mx  ">  Ávila Campos María Del Consuelo </option>
                                         <option value=" mih4@cdmx.gob.mx  ">  Roldan Gutiérrez Ana Lidia  </option>
                                         <option value=" mih5@cdmx.gob.mx  ">  Fuentes Hernández Jessica Victoria  </option>
                                         </optgroup>

                                         <optgroup label="MILPA ALTA">
                                         <option value=" mil1@cdmx.gob.mx  ">  Martínez Rojas María Eugenia  </option>
                                         <option value=" mil2@cdmx.gob.mx  ">  Ramírez Caldiño Laura Angélica  </option>
                                         </optgroup>

                                         <optgroup label="TLÁHUAC">
                                         <option value=" tlh1@cdmx.gob.mx  ">  Ortiz Piña María Guadalupe  </option>
                                         <option value=" tlh2@cdmx.gob.mx  ">  Arredondo Amado Idaly </option>
                                         </optgroup>


                                         <optgroup label="TLALPÁN">
                                         <option value=" tlp1@cdmx.gob.mx  ">  Mondragón Guzmán Esthela  </option>
                                         <option value=" tlp2@cdmx.gob.mx  ">  Haro Jiménez Leticia  </option>
                                         <option value=" tlp3@cdmx.gob.mx  ">  Galicia Delgado Ana María </option>
                                         <option value=" tlp4@cdmx.gob.mx  ">  Cordero Meza Juana  </option>
                                         </optgroup>

                                         <optgroup label="VENUSTIANO CARRANZA">
                                         <option value=" vca1@cdmx.gob.mx  ">  López Leyva María del Carmen  </option>
                                         <option value=" vca2@cdmx.gob.mx  ">  Mayra Citlali Cedillo Sanchez </option>
                                         <option value=" vca3@cdmx.gob.mx  ">  Martínez Rivera Erika Juana </option>
                                         <option value=" vca4@cdmx.gob.mx  ">  García Ruiz María Guadalupe </option>
                                         <option value=" vca5@cdmx.gob.mx  ">  Carreto Osorio Rocio Elba </option>
                                         </optgroup>

                                         <optgroup label="XOCHIMILCO">
                                         <option value=" xoc1@cdmx.gob.mx  ">  Reza Rosas María Fabiola  </option>
                                         <option value=" xoc2@cdmx.gob.mx  ">  Enciso Sabino Isabel  </option>
                                         </optgroup>
             
                                      </select>
                                    </div>
                                  </div>
                               </div>
                             <div class="modal-footer">
                           <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                        <button  type="submit"  class="btn-save btn btn-primary btn-sm">Guardar</button>
                     </div>
                </form>
           </div>
      </div>
</div>




 <!-- <div class="form-group row">
          <label class="col-sm-10 form-control-label">Compartir a:</label>
          
          <select multiple="multiple" id="demo" name="compartir_a[]">
<option value="Javascript">Javascript</option>
<option value="Python">Python</option>
<option value="LISP">LISP</option>
<option value="C++">C++</option>
<option value="jQuery">jQuery</option>
<option value="Ruby">Ruby</option>
</select>

        </div>-->


        <!--<html>
  <head>
    <link href="path/to/multiselect.css" media="screen" rel="stylesheet" type="text/css">
  </head>
  <body>
    <select multiple="multiple" id="my-select" name="my-select[]">
      <option value='elem_1'>elem 1</option>
      <option value='elem_2'>elem 2</option>
      <option value='elem_3'>elem 3</option>
      <option value='elem_4'>elem 4</option>
      ...
      <option value='elem_100'>elem 100</option>
    </select>
    <script src="path/to/jquery.multi-select.js" type="text/javascript"></script>
  </body>
</html>-->
        




        <!--<div class="container py-3">
    <h3 class="font-weight-light">4</h3> ejemplio <div class="row py-3">
        <div class="col-md-4 py-2">
            <h4>Basic multi-select</h4>
            <select class="custom-select" id="basic" multiple="multiple">
                <option value="cheese">Cheese</option>
                <option value="tomatoes">Tomatoes</option>
                <option value="mozarella">Mozzarella</option>
                <option value="mushrooms">Mushrooms</option>
                <option value="pepperoni">Pepperoni</option>
                <option value="onions">Onions</option>
            </select>
        </div>
        <div class="col-md-4 py-2">
            <h4>Hide checkboxes</h4>
            <select class="custom-select" id="no_checkboxes" multiple="multiple">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-4 py-2">
            <h4>Single select</h4>
            <select class="custom-select" id="single_select">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-4 py-2">
            <h4>Filter / search</h4>
            <select class="custom-select" id="filtering" multiple="multiple">
                <option value="cheese">Cheese</option>
                <option value="tomatoes">Tomatoes</option>
                <option value="mozzarella">Mozzarella</option>
                <option value="mushrooms">Mushrooms</option>
                <option value="pepperoni">Pepperoni</option>
                <option value="onions">Onions</option>
                <option value="bacon">Bacon</option>
                <option value="potatoes">Potatoes</option>
            </select>
        </div>
        <div class="col-md-4 py-2">
            <h4>Data source</h4>
            <select class="custom-select" id="data_source" multiple="multiple">
            </select>
        </div>
        <div class="col-md-4 py-2">
            <h4>Data (single select)</h4>
            <select class="custom-select" id="data_source_single">
            </select>
        </div>
    </div>
</div>-->
       
        <!--<div class="form-group row">
          <label class="col-sm-2 form-control-label">Compartir a:</label>
          
          <div class="col-sm-8">
            
          <select  class="form-control" id="compartir_a" name="compartir_a">

                    <option value="">Selecciona...</option>
                    <optgroup label="Equipo CGGSCYPJ">
                    <option value="tomas@cdmx">Pliego Calvo Tomás</option>
                    <option value="luz@cdmx">Rosas Lara María de la Luz</option>
                    <option value="elizabeth@cdmx">Domínguez Guadarrama Elizabeth</option>
                    <option value="julia@cdmx">Rodríguez León Julia Smaye</option>
                    <option value="Tonatihu@cdmx">Arteaga Hernández Ollín Tonatihu</option>
                    <option value="elias@cdmx">Varela Casas Elías </option>
                    <option value="itzel@cdmx">Ortíz Aguilar Itzel</option>
                    <option value="presentaciones@cdmx">Presentaciones CGGSCPJ</option>
                    <option value="victor@cdmx">Vargaz Gómez Víctor Manuel</option>
                    <option value="juancarlos@cdmx">Cabrera Reyna Juan Carlos</option>
                    <option value="naomef@cdmx">Aristegui Cituk Naome Fernanda</option>
                    <option value="claudia@cdmx">Cadena García Claudia Viridiana</option>
                    <option value=" mariana@cdmx  ">  Esperanza Ramos Mariana </option>
                    <option value=" david@cdmx  ">  Hernández García David  </option>
                    <option value=" jesus@cdmx  ">  Sánchez Moreno Jesús  </option>
                    <option value=" karina@cdmx ">  Arenas Moreno Karina  </option>
                    </optgroup>
                    <optgroup label="ÁLVARO OBREGÓN">
                    <option value=" aob1@cdmx.gob.mx  ">  Patricio Ruiz Idania  </option>
                    <option value=" aob2@cdmx.gob.mx  ">  Clairin Guillen Adriana </option>
                    <option value=" aob3@cdmx.gob.mx  ">  Tejeda Morales Ana Cecilia  </option>
                    <option value=" aob4@cdmx.gob.mx  ">  Ruiz Córdova Daisy Dayan  </option>
                    </optgroup>
                    
                    <optgroup label="AZCAPOTZALCO">
                    <option value=" azc1@cdmx.gob.mx  ">  Ojeda Lara Beatriz  </option>
                    <option value=" azc2@cdmx.gob.mx  ">  Almeida Suarez Aida </option>
                    <option value=" azc3@cdmx.gob.mx  ">  Vázquez Roa Yessica Fabiola </option>
                    <option value=" azc4@cdmx.gob.mx  ">  Ana Gloria Lagunas Martínez   </option>
                    </optgroup>

                    <optgroup label="BENITO JUÁREZ">
                    <option value=" bju1@cdmx.gob.mx  ">  Ruiz Canizales Lorena </option>
                    <option value=" bju2@cdmx.gob.mx  ">  Castillo Romero Ana Lilia </option>
                    <option value=" bju3@cdmx.gob.mx  ">  Alatorre Campos Mayra Bárbara </option>
                    <option value=" bju4@cdmx.gob.mx  ">  Leal Velázquez Karla  </option>
                    <option value=" bju5@cdmx.gob.mx  ">  Correa De Lucio Adriana </option>

                    </optgroup>
                    <optgroup label="COYOACÁN">
                    <option value=" coy1@cdmx.gob.mx  ">  Vázquez Mora Yazmin </option>
                    <option value=" coy2@cdmx.gob.mx  ">  Pérez Pérez Ingrid Thalía </option>
                    <option value=" coy3@cdmx.gob.mx  ">  Peña Grimaldo América Genoveva  </option>
                    <option value=" coy4@cdmx.gob.mx  ">  Cazares Covarrubias Gladis Del Carmen </option>
                    <option value=" coy5@cdmx.gob.mx  ">  Camacho Escobar Sandra  </option>

                    </optgroup>
                    <optgroup label="CUAUHTÉMOC">
                    <option value=" cuh1@cdmx.gob.mx  ">  Velázquez Vázquez Cynthia Joanna  </option>
                    <option value=" cuh2@cdmx.gob.mx  ">  Herrera Martínez Leticia  </option>
                    <option value=" cuh3@cdmx.gob.mx  ">  Tapia Martínez Loreto Virginia  </option>
                    <option value=" cuh4@cdmx.gob.mx  ">  Navarrete Salazar Liliana </option>
                    <option value=" cuh5@cdmx.gob.mx  ">  Murcia Pinedo Grace Montserrat  </option>
                    <option value=" cuh6@cdmx.gob.mx  ">  Gómez Soto Jazmín </option>
                    <option value=" cuh7@cdmx.gob.mx  ">  Mejía Padilla Diana </option>
                    <option value=" cuh8@cdmx.gob.mx  ">  Gómez Cruz Victoria Edith </option>

                    </optgroup>
                    <optgroup label="CUAJIMALPA">
                    <option value=" cuj1@cdmx.gob.mx  ">  Vega Sánchez Juana Areli  </option>
                    <option value=" cuj2@cdmx.gob.mx  ">  Osorio Cruz Leticia </option>
                    </optgroup>

                    <optgroup label="GUSTAVO A. MADERO">
                    <option value=" gam1@cdmx.gob.mx  ">  Hernández García Rubí Fabiola </option>
                    <option value=" gam2@cdmx.gob.mx  ">  Balderas Islas Martha Evangelina  </option>
                    <option value=" gam3@cdmx.gob.mx  ">  González García Elvira  </option>
                    <option value=" gam4@cdmx.gob.mx  ">  Rodríguez López Gabriela  </option>
                    <option value=" gam5@cdmx.gob.mx  ">  Castillo Viveros Yanet  </option>
                    <option value=" gam6@cdmx.gob.mx  ">  Aguilar Herrera Norma </option>
                    <option value=" gam7@cdmx.gob.mx  ">  Carreón Méndez Eréndira </option>
                    <option value=" gam8@cdmx.gob.mx  ">  Mendoza Del Barrio Patricia Guadalupe   </option>
                    </optgroup>

                    <optgroup label="IZTACALCO">
                    <option value=" izc1@cdmx.gob.mx  ">  Carrillo Castillo Violeta </option>
                    <option value=" izc2@cdmx.gob.mx  ">  Posada Martínez Dulce María </option>
                    <option value=" izc3@cdmx.gob.mx  ">  Becerril Estrada Seltzin Samara </option>
                    </optgroup>

                    <optgroup label="IZTAPALAPA">
                    <option value=" izp1@cdmx.gob.mx  ">  Vázquez Zúñiga Marlenee </option>
                    <option value=" izp2@cdmx.gob.mx  ">  Rodríguez Robles María Isabel </option>
                    <option value=" izp4@cdmx.gob.mx  ">  García Olguín Paulina Marisela  </option>
                    <option value=" izp5@cdmx.gob.mx  ">  Palacios Alejo Irma </option>
                    <option value=" izp6@cdmx.gob.mx  ">  Ramírez Ramírez Marlen  </option>
                    <option value=" izp7@cdmx.gob.mx  ">  Silva Carranza María Guadalupe  </option>
                    <option value=" izp8@cdmx.gob.mx  ">  Hernández Martínez Lizett Denisse </option>
                    <option value=" izp9@cdmx.gob.mx  ">  Hidalgo Rangel María Verónica </option>
                    <option value=" izp10@cdmx.gob.mx ">  Pantoja Pérez Laura Alicia  </option>
                    </optgroup>

                    <optgroup label="MAGDALENA CONTRERAS">
                    <option value=" mac1@cdmx.gob.mx  ">  González Ruiz Mayra Isabel  </option>
                    <option value=" mac2@cdmx.gob.mx  ">  Olmos Hernández María Viviana </option>
                    </optgroup>


                    <optgroup label="MIGUEL HIDALGO">
                    <option value=" mih1@cdmx.gob.mx  ">  Cedillo Lara Mary Carmen  </option>
                    <option value=" mih2@cdmx.gob.mx  ">  Uribe Rivas Jaqueline </option>
                    <option value=" mih3@cdmx.gob.mx  ">  Ávila Campos María Del Consuelo </option>
                    <option value=" mih4@cdmx.gob.mx  ">  Roldan Gutiérrez Ana Lidia  </option>
                    <option value=" mih5@cdmx.gob.mx  ">  Fuentes Hernández Jessica Victoria  </option>
                    </optgroup>

                    <optgroup label="MILPA ALTA">
                    <option value=" mil1@cdmx.gob.mx  ">  Martínez Rojas María Eugenia  </option>
                    <option value=" mil2@cdmx.gob.mx  ">  Ramírez Caldiño Laura Angélica  </option>
                    </optgroup>

                    <optgroup label="TLÁHUAC">
                    <option value=" tlh1@cdmx.gob.mx  ">  Ortiz Piña María Guadalupe  </option>
                    <option value=" tlh2@cdmx.gob.mx  ">  Arredondo Amado Idaly </option>
                    </optgroup>


                    <optgroup label="TLALPÁN">
                    <option value=" tlp1@cdmx.gob.mx  ">  Mondragón Guzmán Esthela  </option>
                    <option value=" tlp2@cdmx.gob.mx  ">  Haro Jiménez Leticia  </option>
                    <option value=" tlp3@cdmx.gob.mx  ">  Galicia Delgado Ana María </option>
                    <option value=" tlp4@cdmx.gob.mx  ">  Cordero Meza Juana  </option>
                    </optgroup>

                    <optgroup label="VENUSTIANO CARRANZA">
                    <option value=" vca1@cdmx.gob.mx  ">  López Leyva María del Carmen  </option>
                    <option value=" vca2@cdmx.gob.mx  ">  Mayra Citlali Cedillo Sanchez </option>
                    <option value=" vca3@cdmx.gob.mx  ">  Martínez Rivera Erika Juana </option>
                    <option value=" vca4@cdmx.gob.mx  ">  García Ruiz María Guadalupe </option>
                    <option value=" vca5@cdmx.gob.mx  ">  Carreto Osorio Rocio Elba </option>
                    </optgroup>

                    <optgroup label="XOCHIMILCO">
                    <option value=" xoc1@cdmx.gob.mx  ">  Reza Rosas María Fabiola  </option>
                    <option value=" xoc2@cdmx.gob.mx  ">  Enciso Sabino Isabel  </option>
                    </optgroup>
             
             </select>



          </div>

        </div>-->



         <!-- <div class="form-group row">
          <label class="col-sm-10 form-control-label">Compartir a:</label>
          
          <select multiple="multiple" id="demo" name="compartir_a[]">
<option value="Javascript">Javascript</option>
<option value="Python">Python</option>
<option value="LISP">LISP</option>
<option value="C++">C++</option>
<option value="jQuery">jQuery</option>
<option value="Ruby">Ruby</option>
</select>

        </div>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
        <button  type="submit"  class="btn-save btn btn-primary btn-sm">Guardar</button>
      </div>

    </form>
    </div>
  </div>
</div>-->








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

<script type="text/javascript">
  

  $(document).ready( function () {
    $('#archivoslist').DataTable();
} );

</script>



@endsection

@section('customjs')


<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$('#modal_compartirr').multiselect({});
});

</script>
@endsection