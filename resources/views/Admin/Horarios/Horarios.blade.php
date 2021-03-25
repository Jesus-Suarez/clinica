@extends('Admin.templeteAdmin')
@section('titulo') Horarios @endsection

@section('contenido_admin')

<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Lista de Horarios</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">

            <a href="nuevoHorario" class="btn btn-primary btn-circle btn-lg">
                <i class="fa fa-list fa-file"></i>
            </a><span class="text-primary"></span>

            <a href="HorariosElim" class="btn btn-warning pull-right">
                <i class="fa fa-list fa-rotate-left"></i>
                <span class="text">Restaurar registros</span>
            </a>
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
                                <a class="btn btn-primary " href="{{route('modificaHorario',['id_horario'=>$hor->id_horario])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger " href="{{route('desactivarHorario',['id_horario'=>$hor->id_horario])}}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
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