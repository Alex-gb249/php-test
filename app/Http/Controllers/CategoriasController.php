<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias_sin_ordernar = Categoria::all();

        // Algoritmo para ordenar (más bien, para separar la info de tanta cosa)

        $categorias = array();
        foreach ($categorias_sin_ordernar as $i => $catego) {
            $categorias[$catego["id"]] = array(
                $catego["nombre"]
            );

            foreach ($catego->tiendas as $j => $tienda) {
                $categorias[$catego["id"]][1][$tienda["id"]] = $tienda["nombre"];
                
            }
            asort($categorias[$catego["id"]][1]); // Esto ordena las tiendas dentro de la categoría
        }
        
        asort($categorias); // Esto ordena las categorías

        // dd($categorias); // Para ver la matriz bien bonita

        // Fin algoritmo

        return view('categorias.index', ['categorias' => $categorias]);
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
        $request->validate([
            'nombre' => 'required|unique:categorias|min:3|max:255',
            'color' => 'required|min:4|max:7'
        ]);

        $categoria = new Categoria;
        $categoria->nombre = $request->nombre;
        $categoria->color = $request->color;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria creada exitosamente.');
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
        $categoria = Category::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->color = $request->color;
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Categoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria eliminada correctamente');
    }
}
