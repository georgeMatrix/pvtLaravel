<?php

namespace App\Http\Controllers;

use App\UnidadMedida;
use Illuminate\Http\Request;

class UnidadMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadMedida = UnidadMedida::all();
        return view('unidadMedida/unidadMedidaIndex')->with('unidadMedida', $unidadMedida);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unidadMedida/unidadMedidaCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidadMedida = new UnidadMedida();
        $unidadMedida->nombre = $request->nombre;
        $unidadMedida->descripcion = $request->descripcion;
        $unidadMedida->decimal = $request->decimal;
        $unidadMedida->save();
        return redirect()->route('unidadMedida.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidadMedida = UnidadMedida::find($id);
        return view('unidadMedida.unidadMedidaEdit')->with('unidadMedida', $unidadMedida);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadMedida $unidadMedida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unidadMedida = UnidadMedida::find($id);
        $unidadMedida->nombre = $request->nombre;
        $unidadMedida->descripcion = $request->descripcion;
        $unidadMedida->decimal = $request->decimal;
        $unidadMedida->save();
        return redirect()->route('unidadMedida.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadMedida $unidadMedida)
    {
        //
    }
}
