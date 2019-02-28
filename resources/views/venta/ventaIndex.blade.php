@extends('layoutABC.layout')
@section('contenido')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-warning">
                <div class="row">
                    <!--    <div class="col-md-2">
                            <button id="modalProducto" class="btn btn-primary" data-toggle="modal"
                                    data-target="#productosModal">Productos
                            </button>
                        </div>-->
                    <div class="col-md-2">
                        <button id="cobro" onclick="btnCobro();" class="btn btn-primary">COBRO
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <H3 th:text="'Fecha de Venta: ' + ${#dates.format(#dates.createNow(), 'dd / MMM / yyyy / HH:mm')}"></H3>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive table-responsive-md">
                <table class="table table-hover" id="tablaVentaTitulo">
                    <thead class="text-warning">
                    <tr>
                        <th>
                            <div>Clave</div>
                        </th>
                        <th>
                            <div>Cantidad</div>
                        </th>
                        <th>
                            <div>Cantidad E.</div>
                        </th>
                        <th>
                            <div>Descripcion</div>
                        </th>
                        <th>
                            <div>Tipo de venta</div>
                        </th>
                        <th>
                            <div>Precio</div>
                        </th>
                        <th>
                            <div>Importe</div>
                        </th>
                        <th>
                            <div>Opcion</div>
                        </th>

                    </tr>
                    </thead>
                    <tbody id="cuerpoVentaTitulo">
                    <tr id="lineaVentaTitulo">
                        <!--<td><input type="text" class="form-control" name="clave" id="clave0" onfocusout="siguienteRegistro(this);"></td>-->
                        <td><input style="height: 50px; width: 130px; font-size: 30px; font-weight: bold"
                                   type="text" class="form-control" name="clave" id="clave0"
                                   onkeypress="return soloLetras(event);" onKeyUp="this.value = this.value.toUpperCase();" size="20" maxlength="20">
                            <input type="hidden" id="unidadMedida0">
                            <small style="font-size:100%" id="claveInfo0"
                                   class="form-text text-danger"></small>
                        </td>
                        <td><input style="height: 50px; width: 100px; font-size: 30px; font-weight: bold"
                                   type="text" class="form-control" name="cantidad" id="cantidad0" onKeyPress="return SoloNumeros(event);" size="4" maxlength="4">
                            <small style="font-size:200%" id="existencia0"
                                   class="form-text text-danger"></small>
                        </td>
                        <td><input style="height: 50px; width: 100px; font-size: 30px; font-weight: bold"
                                   type="text" class="form-control" name="cantidadE" id="cantidadE0" onKeyPress="return SoloNumeros(event);" size="4" maxlength="4"
                                   disabled></td>
                        <td><input style="height: 50px; width: 260px; font-size: 30px; font-weight: bold"
                                   type="text" class="form-control" name="descripcion" id="descripcion0"
                                   disabled></td>
                        <td><input style="height: 50px; width: 250px; font-size: 30px; font-weight: bold"
                                   type="text" class="form-control" name="tipoVenta" id="tipoVenta0"
                                   disabled></td>
                        <td><input style="height: 50px; width: 100px; font-size: 30px; font-weight: bold"
                                   type="text" class="form-control" name="precio" id="precio0" disabled>
                        </td>
                        <td><input style="height: 50px; width: 100px; font-size: 30px; font-weight: bold"
                                   type="text" class="form-control" name="importe" id="importe0" disabled>
                        </td>
                        <td>
                            <button class="btn btn-primary" id="btnAgregar0" onclick="agregar();" disabled>
                                Agregar
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div> <!-- Fin de primera tabla -->
            <div class="well" style="width: 100%; height: 400px; overflow: scroll;">
                <div class="card-body table-responsive table-responsive-md">
                    <table class="table table-hover" id="tablaVenta">
                        <tbody id="cuerpoVenta">

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-md-3 col-md-offset-9">
                <label style="height: 80px; width: 100px; font-size: 30px; font-weight: bold"
                       for="">Total:</label><input
                        style="height: 80px; width: 200px; font-size: 50px; font-weight: bold" type="text"
                        id="total" disabled>
            </div>

        </div>
    </div>

@endsection()