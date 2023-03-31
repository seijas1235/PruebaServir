@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Departamento</h1>
@stop

@section('content')
    <p>Nuevo Departamento</p>
    <form method="POST" id="EmpleadoForm"  action="{{route('department.save')}}">
        {{csrf_field()}}
        <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="code">Código</label>
                            <input type="text" class="form-control" placeholder="código" name="code" value=" {{old('code') }}">
                            @if ($errors->has('code'))
                                <span class="error text-danger" for="input-name">{{ $errors->first('code') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name')}}" >
                            @if ($errors->has('name'))
                                <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <label for="description">Descripción</label>
                            <input type="text" class="form-control" placeholder="Descripción" name="description"  value="{{ old('description')}} ">
                        </div>
                    </div>
                    <br>
                    <div class="text-right m-t-15">
                        <a class='btn btn-primary form-button' href="{{ route('department.index') }}">Regresar</a>
                        <button class="btn btn-success form-button">Guardar</button>
                    </div>

        </div>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
