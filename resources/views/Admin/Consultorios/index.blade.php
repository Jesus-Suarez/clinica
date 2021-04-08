@extends('Admin.templeteAdmin')
@section('titulo') Consultorios @endsection

@section('contenido_admin')
<?php
$sessionTipo = session('sessionTipo');
?>
<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Consultorios activos</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">

            <a href="{{ route('consultorio.crear') }}" class="btn btn-primary btn-circle btn-lg" title="Nuevo consultorio">
                <i class="fa fa-list fa-file"></i>
            </a><span class="text-primary"></span>
            @if ($sessionTipo == 'admin')
            <a href="{{ route('consultorio.desactivados') }}" class="btn btn-warning pull-right">
                <i class="fa fa-list fa-rotate-left"></i>
                <span class="text">Restaurar registros</span>
            </a>
            @endif
        </nav>
    </div>
    <div class="panel-body">
        @if (Session::has('message'))
        <p class="alert alert-info">
            {{Session::get('message')}}
        </p>
        @endif
        @if (Session::has('message2'))
        <p class="alert alert-danger">
            {{Session::get('message2')}}
        </p>
        @endif
        @if (Session::has('message3'))
        <p class="alert alert-warning">
            {{Session::get('message3')}}
        </p>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-responsive table-hover table-striped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th>Clave</th>
                            <th>Numero</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consultorios as $consultorio)
                        <tr>
                            <td>{{$consultorio->id_consultorio}}</td>
                            <td>{{$consultorio->numero}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('consultorio.editar', $consultorio) }}" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            @if ($sessionTipo == 'admin')
                            <td>
                                <form method="POST" action="{{ route('consultorio.desactivar', $consultorio->id_consultorio) }}" title="Eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button class=" btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br>

@stop