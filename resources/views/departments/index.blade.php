@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Departamentos</h1>
@stop

@section('content')
    <p>Listado Departamentos</p>
    @if (session('success'))
    <div class="alert alert-success" role="success">
      {{ session('success') }}
    </div>
    @endif
    <a class="btn btn-primary pull-right" href="{{route('department.new')}}">
        <i class="fa fa-plus"></i>Agregar Departamento</a>

        <table id="departmens-table" class="table table-striped table-bordered no-margin-bottom dt-responsive nowrap" ellspacing="0" width="98%">
        </table>
        <input type="hidden" name="_token" id="tokenEmployee" value="{{ csrf_token() }}">


@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
@stop

@section('js')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('js/departments/index.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

@stop
