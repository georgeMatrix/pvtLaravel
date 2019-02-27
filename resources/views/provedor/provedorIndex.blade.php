@extends('layoutABC.layout')
@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Provedor</h4>
                <p class="card-category"> Tabla de Provedor<a href="{{route('provedor.create')}}" class="btn btn-danger pull-right">Agregar Nuevo</a></p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            <b>Nombre</b>
                        </th>
                        <th>
                            <b>Razon Social</b>
                        </th>
                        <th>
                            <b>RFC</b>
                        </th>
                        <th>
                            <b>Direccion</b>
                        </th>
                        <th>
                            <b>Telefono</b>
                        </th>
                        <th>
                            <b>Contacto</b>
                        </th>
                        <th>
                            <b>Editar</b>
                        </th>
                        </thead>
                        <tbody>
                        @foreach($provedores as $provedor)
                            <tr>
                                <td>
                                    {{$provedor->nombre}}
                                </td>
                                <td>
                                    {{$provedor->razon_social}}
                                </td>
                                <td>
                                    {{$provedor->rfc}}
                                </td>
                                <td>
                                    {{$provedor->direccion}}
                                </td>
                                <td>
                                    {{$provedor->telefono}}
                                </td>
                                <td>
                                    {{$provedor->contacto}}
                                </td>
                                <td>
                                    <a href="{{route('provedor.show', $provedor->id)}}" class="btn btn-primary">Editar</a>
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