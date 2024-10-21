<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  response()->json([
            "data" => Estudiante::all(),
            "mensaje" => "Estudiantes listados con exito"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $e = Estudiante::create($inputs);
        return response()->json([
            "data"=>$e,
            "mensaje"=>"Estudiante actualizado con exito",
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $e=Estudiante::find($id);
        if(isset($e)){
            return response()->json([
                "data"=>$e,
                "mensaje"=>"Estudiante encontrado con exito",
            ]);
        }else{
            return response()->json([
                "error"=>true,
                "mensaje"=>"No existe el estudiante.",   
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $e=Estudiante::find($id);
        if(isset($e)){
            $e->nombre = $request->nombre;
            $e->apellido = $request->apellido;
            $e->foto = $request->foto;
            if ($e->save()){
                return response()->json([
                "data"=>$e,
                "mensaje"=>"Estudiante actualizado con exito",
                ]);
            }
        }else{
            return response()->json([
                "error"=>true,
                "mensaje"=>"No se actualizo el estudiante.",   
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $e = Estudiante::find($id);
        if(isset($e)){
            $res=Estudiante::destroy($id);
            if($res){
            return response()->json([
                "data"=>$e,
                "mensaje"=>"Estudiante eliminado con exito",
            ]);
        }else{
            return response()->json([
                "data"=>$e,
                "mensaje"=>"No existe el estudiante",   
            ]);
            }
        }else{
            return response()->json([
                "error"=>true,
                "mensaje"=>"No existe el estudiante"
            ]);
        }
    }
}