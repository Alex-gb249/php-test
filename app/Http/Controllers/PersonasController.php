<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonasController extends Controller
{
    public function store(Request $request){
        $request -> validate([
            'nombre' => 'required|min:3',
            'cedula' => 'required|min:8',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required'
        ]);

        $persona = new Persona;
        $persona->nombre = $request->nombre;
        $persona->cedula = $request->cedula;
        $persona->fecha_nacimiento = $request->fecha_nacimiento;
        $persona->sexo = $request->sexo;
        $persona->save();

        return redirect()->route('personas')->with('success', 'Persona creada correctamente.');
    }

    public function index(){
        $personas = Persona::all();
        return view('personas.index', ['personas' => $personas]);
    }
}