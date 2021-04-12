@extends('Admin.templeteAdmin')
@section('titulo') Citas @endsection

@section('contenido_admin')
<?php
$sessionTipo = session('sessionTipo');
?>
<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Citas</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">

            <a href="{{ route('cita.crear') }}" class="btn btn-primary btn-circle btn-lg" title="Dar de alta nueva cita">
                <i class="fa fa-list fa-file"></i>
            </a><span class="text-primary"></span>
            @if ($sessionTipo == 'admin')
            <a href="{{ route('cita.desactivados') }}" class="btn btn-warning pull-right">
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
                            <th>fecha</th>
                            <th>hora</th>
                            <th>Doctor a cargo</th>
                            <th>Contacto del doctor</th>
                            <th>Paciente</th>
                            <th>Contacto del paciente</th>
                            <th>Consultorio</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($citas as $cita)
                        <tr>
                            <td>{{$cita->id_cita}}</td>
                            <td>{{$cita->fecha_cita}}</td>
                            <td>{{$cita->hora}}</td>
                            <td>{{$cita->nombre_doc}} {{$cita->ap_pat_doc}}</td>
                            <td>{{$cita->telefono_doc}}</td>
                            <td>{{$cita->nombre_pac}} {{$cita->ap_pat_pac}}</td>
                            <td>{{$cita->telefono_pac}}</td>
                            <td>{{$cita->numero}}</td>
                            @if ($sessionTipo == 'admin')
                            <td>
                                <a class="btn btn-primary" href="{{ route('cita.editar', $cita->id_cita) }}" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('cita.desactivar', $cita->id_cita) }}" title="Eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button class=" btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <td colspan="9">
                            <center>No hay citas para mostrar</center>
                        </td>
                        @endforelse
                        </form>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<br>

@stop