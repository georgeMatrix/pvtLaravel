<?php

namespace App\Http\Controllers;

use App\Provedor;
use Illuminate\Http\Request;

class ProvedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provedores = Provedor::all();
        return view('provedor/provedorIndex')->with('provedores', $provedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provedor/provedorEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provedor = new Provedor;
        $provedor->nombre = $request->nombre;
        $provedor->razon_social = $request->razon_social;
        $provedor->rfc = $request->rfc;
        $provedor->direccion = $request->direccion;
        $provedor->telefono = $request->telefono;
        $provedor->contacto = $request->contacto;
        $provedor->save();
        return redirect()->route('provedor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function show(Provedor $provedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Provedor $provedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provedor  $provedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provedor $provedor)
    {
        //
    }
}
