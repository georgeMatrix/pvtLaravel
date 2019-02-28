<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;
use App\Provedor;
use App\UnidadMedida;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        $provedores = Provedor::all();
        $categorias = Categoria::all();
        $unidadMedidas = UnidadMedida::all();
        return view('producto/productoIndex')->with('productos', $productos)->with('provedores', $provedores)->with('categorias', $categorias)->with('unidadMedidas', $unidadMedidas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provedor = Provedor::pluck('nombre', 'id');
        $categoria = Categoria::pluck('nombre', 'id');
        $unidadMedida = UnidadMedida::pluck('nombre', 'id');
        return view('producto/productoCreate')->with('provedor', $provedor)->with('categoria', $categoria)->with('unidadMedida', $unidadMedida);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        $producto->clave = $request->clave;
        $producto->sku = $request->sku;
        $producto->skuVnpk = $request->skuVnpk;
        $producto->provedor = $request->provedor;
        $producto->categoria = $request->categoria;
        $producto->descripcion = $request->descripcion;
        $producto->descripcionE = $request->descripcionE;
        $producto->costo = $request->costo;
        $producto->iva_costo = $request->iva_costo;
        $producto->ieps_costo = $request->ieps_costo;
        $producto->total_costo = $request->total_costo;
        $producto->precio_Mayoreo = $request->precio_Mayoreo;
        $producto->iva_Precio_Mayoreo = $request->iva_Precio_Mayoreo;
        $producto->ieps_Precio_Mayoreo = $request->ieps_Precio_Mayoreo;
        $producto->total_Precio_Mayoreo = $request->total_Precio_Mayoreo;
        $producto->precio_Medio_Mayoreo = $request->precio_Medio_Mayoreo;
        $producto->iva_Precio_Medio_Mayoreo = $request->iva_Precio_Medio_Mayoreo;
        $producto->ieps_Precio_Medio_Mayoreo = $request->ieps_Precio_Medio_Mayoreo;
        $producto->total_Precio_Medio_Mayoreo = $request->total_Precio_Medio_Mayoreo;
        $producto->precio_Retail = $request->precio_Retail;
        $producto->iva_Precio_Retail = $request->iva_Precio_Retail;
        $producto->ieps_Precio_Retail = $request->ieps_Precio_Retail;
        $producto->total_Precio_Retail = $request->total_Precio_Retail;
        $producto->existencia = $request->existencia;
        $producto->unidad_Medida = $request->unidad_Medida;
        $producto->activo_inactivo = 1;
        $producto->save();
        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        $provedor = Provedor::pluck('nombre', 'id');
        $categoria = Categoria::pluck('nombre', 'id');
        $unidadMedida = UnidadMedida::pluck('nombre', 'id');
        return view('producto.productoEdit')->with('producto', $producto)->with('provedor', $provedor)->with('categoria', $categoria)->with('unidadMedida', $unidadMedida);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->clave = $request->clave;
        $producto->sku = $request->sku;
        $producto->skuVnpk = $request->skuVnpk;
        $producto->provedor = $request->provedor;
        $producto->categoria = $request->categoria;
        $producto->descripcion = $request->descripcion;
        $producto->descripcionE = $request->descripcionE;
        $producto->costo = $request->costo;
        $producto->iva_costo = $request->iva_costo;
        $producto->ieps_costo = $request->ieps_costo;
        $producto->total_costo = $request->total_costo;
        $producto->precio_Mayoreo = $request->precio_Mayoreo;
        $producto->iva_Precio_Mayoreo = $request->iva_Precio_Mayoreo;
        $producto->ieps_Precio_Mayoreo = $request->ieps_Precio_Mayoreo;
        $producto->total_Precio_Mayoreo = $request->total_Precio_Mayoreo;
        $producto->precio_Medio_Mayoreo = $request->precio_Medio_Mayoreo;
        $producto->iva_Precio_Medio_Mayoreo = $request->iva_Precio_Medio_Mayoreo;
        $producto->ieps_Precio_Medio_Mayoreo = $request->ieps_Precio_Medio_Mayoreo;
        $producto->total_Precio_Medio_Mayoreo = $request->total_Precio_Medio_Mayoreo;
        $producto->precio_Retail = $request->precio_Retail;
        $producto->iva_Precio_Retail = $request->iva_Precio_Retail;
        $producto->ieps_Precio_Retail = $request->ieps_Precio_Retail;
        $producto->total_Precio_Retail = $request->total_Precio_Retail;
        $producto->existencia = $request->existencia;
        $producto->unidad_Medida = $request->unidad_Medida;
        $producto->save();
        return redirect()->route('producto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return back();
    }
}
