@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mostrar</h1>
@stop

@section('content')
<p>Editar Departamento</p>
<form method="post" id="DepartmentForm"  action="{{route('employee.update',$department['id'])}}">
    {{csrf_field()}}
    @if (session('success'))
    <div class="alert alert-success" role="success">
      {{ session('success') }}
    </div>
    @endif
    <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="code">Código</label>
                        <input type="text" class="form-control" placeholder="código" name="code"  value="{{ $department['code'] }}">
                        @if ($errors->has('code'))
                        <span class="error text-danger" for="input-name">{{ $errors->first('code') }}</span>
                    @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ $department['name'] }}" >
                        @if ($errors->has('name'))
                        <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                    @endif
                    </div>
                    <div class="col-sm-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" placeholder="Descripción" name="description"  value="{{ $department['description'] }}" >

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

@stop

@section('js')

@stop
