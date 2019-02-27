@extends('layoutABC.layout')
@section('contenido')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Provedor</h4>
                    <p class="card-category">Completa los campos</p>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'provedor.store', 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('nombre', 'Escribe su nombre del provedor') !!}
                                {!! Form::text('nombre', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('razon_social', 'Escribe su razon social') !!}
                                {!! Form::text('razon_social', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('rfc', 'Escribe su RFC') !!}
                                {!! Form::text('rfc', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('direccion', 'Escribe su direccion') !!}
                                {!! Form::text('direccion', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('telefono', 'Escribe su telefono') !!}
                                {!! Form::text('telefono', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('contacto', 'Escribe su contacto') !!}
                                {!! Form::text('contacto', null, ['class'=>'form-control']) !!}
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