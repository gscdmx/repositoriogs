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
        //
        $misarchivos= \App\tbRepositorio::select('tb_repositorios.*')
                     ->where('tb_repositorios.id_user_subio',\Auth::user()->id)
                     ->get();
        return view('auth.repositorio.mi_repositorio',compact('misarchivos'));
    }


       public function save_archivo(Request $request)
    {
        //

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
                         'id_user_subio' => \Auth::user()->id
                       ]); 


            //GUARDAR ARCHIVO SI EXISTE       
        if($request['archivo']!=null){
            $request['archivo']->move($destinationPath,$pdf_nombre);
        }
               
               
                  $mensaje = array('mensaje'=>'Archivo Guardado', 'color'=> 'success');
                 return Redirect::to('/repositorios/misarchivos')->with('mensaje', $mensaje);
         



         }



    }


      public function repositorio_usuarios($id)
    {
        //
        $misarchivos= \App\tbRepositorio::select('tb_repositorios.*')
                     ->where('tb_repositorios.id_user_subio',$id)
                     ->get();
        return view('auth.repositorio.repositorio_usuarios',compact('misarchivos'));
    }


    



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
