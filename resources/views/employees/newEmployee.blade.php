@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Empleado</h1>
@stop

@section('content')
    <p>Nuevo Empleado</p>
    <form method="POST" id="EmpleadoForm"  action="{{route('employee.save')}}">
        {{csrf_field()}}
        <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="first_name">Nombres</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="first_name" value="{{ old('first_name')}}" >
                            @if ($errors->has('first_name'))
                                <span class="error text-danger" for="input-name">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            <label for="last_name">Apellidos</label>
                            <input type="text" class="form-control" placeholder="apellidos" name="last_name"  value="{{ old('last_name')}} ">
                            @if ($errors->has('last_name'))
                            <span class="error text-danger" for="input-name">{{ $errors->first('last_name') }}</span>
                        @endif
                        </div>
                        <div class="col-sm-3">
                            <label for="birth_date">Fecha de nacimiento</label>
                            <input type="date" class="form-control" placeholder="Fecha de nacimiento" name="birth_date"  value="{{ old('birth_date')}} ">
                        </div>
                        <div class="col-sm-3">
                            <label for="birth_date">Departamento</label>
                            <select class="form-control" name="department_id" id="department_id">
                                <option value="">Selecciona Departamento</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
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
