@extends('layoutABC.layout')
@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Unidad de medida</h4>
                <p class="card-category"> Tabla de Provedor<a href="{{route('unidadMedida.create')}}" class="btn btn-danger pull-right">Agregar Nuevo</a></p>
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
                            <b>Decimal</b>
                        </th>
                        <th>
                            <b>Editar</b>
                        </th>

                        </thead>
                        <tbody>
                        @foreach($unidadMedida as $unidadM)
                            <tr>
                                <td>
                                    {{$unidadM->nombre}}
                                </td>
                                <td>
                                    {{$unidadM->descripcion}}
                                </td>
                                <td>
                                    {{$unidadM->Decimal}}
                                </td>
                                <td>
                                    <a href="{{route('unidadMedida.show', $unidadM->id)}}" class="btn btn-primary">Editar</a>
                                </td>
                                <td>
                                    <form action="{{route('unidadMedida.destroy', $unidadM->id)}}" method="post">
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