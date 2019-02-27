<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'clave',
        'sku',
        'skuVnpk',
        'provedor',
        'categoria',
        'descripcion',
        'descripcionE',
        'costo',
        'iva_costo',
        'ieps_costo',
        'total_costo',
        'precio_Mayoreo',
        'iva_Precio_Mayoreo',
        'ieps_Precio_Mayoreo',
        'total_Precio_Mayoreo',
        'precio_Medio_Mayoreo',
        'iva_Precio_Medio_Mayoreo',
        'ieps_Precio_Medio_Mayoreo',
        'total_Precio_Medio_Mayoreo',
        'precio_Retail',
        'iva_Precio_Retail',
        'ieps_Precio_Retail',
        'total_Precio_Retail',
        'existencia',
        'unidad_Medida',
    ];
    public function provedorF(){
        return $this->belongsTo(Provedor::class, 'provedor');
    }

    public function categoriaF(){
        return $this->belongsTo(Categoria::class, 'categoria');
    }

    public function unidad_MedidaF(){
        return $this->belongsTo(UnidadMedida::class, 'unidad_Medida');
    }
}
