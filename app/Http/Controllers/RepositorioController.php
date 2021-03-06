<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Redirect;

class RepositorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function vista_repositorios()
    {
        //


         $listusuarios= \App\User::select('users.id','users.name')
                       ->where('users.id','!=',\Auth::user()->id)
                       ->get();
        return view('auth.repositorio.list_repositorios',compact('listusuarios'));
    }

      public function mi_repositorio()
    {   

        //return "prueba";
        //
        $misarchivos= \App\tbRepositorio::select('tb_repositorios.*')
                     ->where('tb_repositorios.id_user_subio',\Auth::user()->id)
                     ->get();


        $miscarpetas= \App\tbCarpetas::select('tb_carpetas.nombre_carpeta','tb_carpetas.id')
                    ->where('tb_carpetas.id_usuario',\Auth::user()->id)//trae nombre de la carpeta del usuario con el que esta en sesión 
                   ->get();

        return view('auth.repositorio.mi_repositorio',compact('misarchivos','miscarpetas'));
    }


 public function mi_repositorio2($id) 
    {
       
        $misarchivos= \App\tbRepositorio::select('tb_repositorios.*')
                     //->join('tb_repositorios.nombre_archivo','=','tb_carpetas.id_carpeta')
                     ->where('tb_repositorios.id_user_subio',\Auth::user()->id)
                     ->where('tb_repositorios.id_carpeta',$id)
                     ->get();
       $id_carpeta=$id;

     

       $user=\App\User::select('name','id')->get();
      
        return view('auth.repositorio.mi_archivoencarpeta',compact('misarchivos','id_carpeta','user'));
    }

///////////////////////////




   public function compartidos(){



    $misarchivos= \App\tbRepositorio::select('tb_repositorios.*')
                  ->join('tb_compartidos','tb_compartidos.id_archivo','=','tb_repositorios.id')
                 ->where('tb_compartidos.id_user_compartio',\Auth::user()->id)
                 ->get();


   // dd($misarchivos);
     

    
      return view('auth.repositorio.mis_compartidos',compact('misarchivos'));

   }


/////////////////////////////
       public function save_archivo(Request $request)
    {


   

         //validaciones
     $validator = Validator::make($request->all(), [
                 'archivo' => 'required'
             ]);

       if ($validator->fails()) {

           $messages = $validator->messages();
           // en caso de error de validacion ridirige
           return Redirect::to('/repositorios/misarchivos')->withInput()->withErrors($validator);

         }else if ($validator->passes()){

        
        //obtener extencion 
        $extension = $request->file('archivo')->extension();


        /*si existe el documento*/
        if($request['archivo']!=null){
        //$extension_archivo = $request['archivo']->getClientOriginalExtension(); // getting image extension esto es algo pero creo no funcionaba
        $pdf_nombre = rand(11111,99999).'.'.$extension; // renameing image

        
        $destinationPath = 'archivos_repositorio/';//
        }else{
        $pdf_nombre=null;

        }
        /*fin existe el documento*/

           $inserto = \App\tbRepositorio::create([  
                         'nombre_archivo' => $pdf_nombre,
                         'descripcion'=>$request['descripcion'],
                         'id_carpeta' =>$request['IDcapeta'],
                         'id_user_subio' => \Auth::user()->id,
                       ]); 


            //GUARDAR ARCHIVO SI EXISTE       
        if($request['archivo']!=null){
            $request['archivo']->move($destinationPath,$pdf_nombre);
        }
               
               
                  $mensaje = array('mensaje'=>'Archivo Guardado', 'color'=> 'success');
                 return Redirect::to('/repositorios/misarchivos')->with('mensaje', $mensaje);
         



         }



    }


////////////////////////////creacion de carpetas///////////////////////////////



     public function vista_carpetas()
    {
         $carpusuarios= \App\User::select('users.id','users.name')
                       ->where('users.id','!=',\Auth::user()->id)
                       ->get();
        return view('auth.repositorio.mi_repositorio',compact('carpusuarios'));
    }


     public function mi_carpeta()
    {
    
     // return json_encode($miscarpetas); DO
       return view('auth.repositorio.mi_repositorio',compact('miscarpetas'));
    }



    public function save_carpeta(Request $request)
    {
        

          $validator = Validator::make($request->all(), [
                 
                 'nombre_carpeta' => 'required'
             ]);
        
               $inserto = \App\tbCarpetas::create([ 
                     
                       'nombre_carpeta' => $request['nombre_carpeta'],                   
                       'id_usuario'=> \Auth::user()->id
                    ]); 

            
                        $mensaje = array('mensaje'=>'¡Carpeta creada con éxito!', 'color'=> 'success');
                 return Redirect::to('/repositorios/misarchivos')->with('mensaje', $mensaje);
         

    }

           


   public function repositorio_usuarios($id)
    {
        //
        $misarchivos= \App\tbRepositorio::select('tb_repositorios.*')
                     ->where('tb_repositorios.id_user_subio',$id)
                     ->get();
        return view('auth.repositorio.repositorio_usuarios',compact('misarchivos'));
    }




    

     public function save_shared_file(Request $request)
    {

          
     $usuarios= $request['compartir_a'];



     foreach ($usuarios as $id) {
      
        $inserto = \App\tbCompartido::create([ 
                     
                       'id_archivo' =>  $request['id_file'],
                       'id_user_compartio'=> $id,                  
                       'id_user_subio'=> \Auth::user()->id,
                    ]); 




     }

     return 1;



    }




 public function manual(){




    
      return view('auth.repositorio.manual');

   }

















}
