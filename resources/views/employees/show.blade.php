@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mostrar</h1>
@stop

@section('content')
<p>Editar Empleado</p>
<form method="post" id="employeeForm"  action="{{route('employee.update',$employee['id'])}}">
    {{csrf_field()}}
    @if (session('success'))
    <div class="alert alert-success" role="success">
      {{ session('success') }}
    </div>
    @endif
    <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-3">
                        <label for="first_name">Nombres</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="first_name" value="{{ $employee['first_name']}}" >
                        @if ($errors->has('first_name'))
                            <span class="error text-danger" for="input-name">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                    <div class="col-sm-3">
                        <label for="last_name">Apellidos</label>
                        <input type="text" class="form-control" placeholder="apellidos" name="last_name"  value="{{ $employee['last_name']}} ">
                        @if ($errors->has('last_name'))
                        <span class="error text-danger" for="input-name">{{ $errors->first('last_name') }}</span>
                    @endif
                    </div>
                    <div class="col-sm-3">
                        <label for="birth_date">Fecha de nacimiento</label>
                        <input type="date" class="form-control" placeholder="Fecha de nacimiento" name="birth_date"  value="{{ $employee['birth_date'] }} ">
                    </div>
                    <div class="col-sm-3">
                        <label for="department_id">Departamento</label>
                        <select class="form-control" name="department_id" id="department_id">
                            <option value="">Selecciona Departamento</option>
                                @foreach($departments as $department)
                                    @if($department->id == $employee->department_id)
                                        <option value="{{$department->id}}" selected>{{ $department->name}}</option>
                                    @else
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endif
                                @endforeach
                        </select>
                        @if ($errors->has('department_id'))
                        <span class="error text-danger" for="input-name">{{ $errors->first('department_id') }}</span>
                    @endif
                    </div>

                </div>
                <br>
                <div class="text-right m-t-15">
                    <a class='btn btn-primary form-button' href="{{ route('employee.index') }}">Regresar</a>
                    <button class="btn btn-success form-button">Guardar</button>
                </div>

    </div>
</form>

@stop

@section('css')

@stop

@section('js')

@stop
