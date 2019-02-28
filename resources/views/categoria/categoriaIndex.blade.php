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
                        <th>
                            <b>Editar</b>
                        </th>
                        <th>
                            <b>Eliminar</b>
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
                            <td>
                                <a href="{{route('categoria.show', $categoria->id)}}" class="btn btn-primary">Editar</a>
                            </td>
                            <td>
                                <form action="{{route('categoria.destroy', $categoria->id)}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
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