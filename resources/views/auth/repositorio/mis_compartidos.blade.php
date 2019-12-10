@extends('template.header')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/sl-1.3.0/datatables.min.css"/>


  <section class="forms">
  <div class="container-fluid">
        
         
  <div class="row">

  <div class="col-lg-12">

     <div class="card">
      <div class="card-header d-flex align-items-center">
      <h4>ARCHIVOS COMPARTIDOS </h4>
    </div>

    <div class="card-body">

       @if( Session::has('mensaje') )
                   <div class="alert alert-{{ Session::get('mensaje')['color'] }} alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                       {{ Session::get('mensaje')['mensaje'] }}
                   </div>
        @endif


 



   <!--CONTENIDO-->






     

  </div>
  </div>
  </section>







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






