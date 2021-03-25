@extends('Admin.templeteAdmin')
@section('titulo') Pacientes @endsection

@section('contenido_admin')

<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Lista de Pacientes</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">

            <a href="nuevoDoctor" class="btn btn-primary btn-circle btn-lg">
                <i class="fa fa-list fa-file"></i>
            </a><span class="text-primary"></span>

            <a href="{{ route('paciente.desactivados') }}" class="btn btn-warning pull-right">
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
                <table class="table table-responsive table-hover table-striped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th>Clave</th>
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pacientes as $paciente)
                        <tr>
                            <td>{{$paciente->id_paciente}}</td>
                            <td>Aqui va la foto</td>
                            <td>{{$paciente->nombre_pac}} {{$paciente->ap_pat_pac}} {{$paciente->ap_mat_pac}}</td>
                            <td>{{\Carbon\Carbon::parse($paciente->fecha_nac)->age}} años</td>
                            <td>{{$paciente-> email_pac}}</td>
                            <td>{{$paciente->telefono_pac}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('paciente.editar', $paciente) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('paciente.desactivar', $paciente->id_paciente) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class=" btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
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