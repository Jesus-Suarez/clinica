@extends('Admin.templeteAdmin')
@section('titulo') Horarios desactivados @endsection

@section('contenido_admin')
<?php
$sessionTipo = session('sessionTipo');
?>
<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Lista de Horarios desactivados</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">
            <a href="Horarios" class="btn btn-primary btn-circle btn-lg">
                <i class="fa fa-list fa-rotate-left"></i>
            </a><span class="text-primary"></span>
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
                <table class="table table-hover table-striped table-responsive" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th>Hora de inicio</th>
                            <th>Hora de fin</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($horario as $hor)
                        <tr>
                            <td>{{$hor->hora_inicio}}</td>
                            <td>{{$hor->hora_fin}}</td>
                            <td>
                                <a class="btn btn-warning " href="{{route('activarHorario',['id_horario'=>$hor->id_horario])}}">
                                    <i class="fa fa-retweet"></i>
                                </a>
                            </td>
                            @if ($sessionTipo == 'admin')
                            <td>
                                <a class="btn btn-danger " href="{{route('eliminarHorario',['id_horario'=>$hor->id_horario])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
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