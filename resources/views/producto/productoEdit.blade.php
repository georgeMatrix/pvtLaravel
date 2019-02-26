@extends('layoutABC.layout')
@section('contenido')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Producto</h4>
                    <p class="card-category">Completa los campos</p>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'producto.store', 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('clave', 'Escribe la clave') !!}
                                {!! Form::text('clave', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('sku', 'Escribe el sku') !!}
                                {!! Form::text('sku', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('skuVnpk', 'Escribe el skuVnpk') !!}
                                {!! Form::text('skuVnpk', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::select('provedor', 'Selecciona el provedor') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::select('categoria', 'Selecciona la categoria') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::select('descripcion', 'Selecciona la descripcion') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::select('unidad_medida', 'Selecciona la unidad de medida') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('descripcionE', 'Escribe la descripcion extendida') !!}
                                {!! Form::text('descripcionE', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('costo', 'Escribe el costo') !!}
                                {!! Form::text('costo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('iva_costo', 'Escribe el costo') !!}
                                {!! Form::text('iva_costo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ieps_costo', 'Escribe el ieps costo') !!}
                                {!! Form::text('ieps_costo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('total_costo', 'Escribe el total costo') !!}
                                {!! Form::text('total_costo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('precio_mayoreo', 'Escribe el precio mayoreo') !!}
                                {!! Form::text('precio_mayoreo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('iva_precio_mayoreo', 'Escribe el iva precio mayoreo') !!}
                                {!! Form::text('iva_precio_mayoreo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ieps_precio_mayoreo', 'Escribe el ieps precio mayoreo') !!}
                                {!! Form::text('ieps_precio_mayoreo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('total_precio_mayoreo', 'Escribe el total precio mayoreo') !!}
                                {!! Form::text('total_precio_mayoreo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('precio_medio_mayoreo', 'Escribe el precio medio mayoreo') !!}
                                {!! Form::text('precio_medio_mayoreo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('iva_precio_medio_mayoreo', 'Escribe el precio iva precio medio mayoreo') !!}
                                {!! Form::text('iva_precio_medio_mayoreo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ieps_precio_medio_mayoreo', 'Escribe el precio ieps precio medio mayoreo') !!}
                                {!! Form::text('ieps_precio_medio_mayoreo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('total_precio_medio_mayoreo', 'Escribe el total precio medio mayoreo') !!}
                                {!! Form::text('total_precio_medio_mayoreo', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('precio_retail', 'Escribe el precio retail') !!}
                                {!! Form::text('precio_retail', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('iva_precio_retail', 'Escribe el iva precio retail') !!}
                                {!! Form::text('iva_precio_retail', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('ieps_precio_retail', 'Escribe el ieps precio retail') !!}
                                {!! Form::text('ieps_precio_retail', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('total_precio_retail', 'Escribe el total precio retail') !!}
                                {!! Form::text('total_precio_retail', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('existencia', 'Escribe la existencia') !!}
                                {!! Form::text('existencia', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
                    <div class="clearfix"></div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img" src="../assets/img/faces/marc.jpg" />
                    </a>
                </div>
                <div class="card-body">
                    <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                    <h4 class="card-title">Alec Thompson</h4>
                    <p class="card-description">
                        Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                    </p>
                    <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
            </div>
        </div>
    </div>
@endsection