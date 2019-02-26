@extends('layoutABC.layout')
@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Categoria</h4>
                <p class="card-category"> Tabla de Categorias<a href="{{route('categoria.create')}}" class="btn btn-danger pull-right">Agregar Nuevo</a></p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            <b>Nombre</b>
                        </th>
                        <th>
                            <b>Descripcion</b>
                        </th>
                        </thead>
                        <tbody>
                        @foreach($categorias as $categoria)
                        <tr>
                            <td>
                                {{$categoria->nombre}}
                            </td>
                            <td>
                                {{$categoria->descripcion}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection()