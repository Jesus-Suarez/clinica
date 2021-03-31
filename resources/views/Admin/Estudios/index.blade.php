@extends('Admin.templeteAdmin')
@section('titulo') Estudios @endsection

@section('contenido_admin')

<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Lista de estudios disponibles</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">

            <a href="{{ route('estudio.crear') }}" class="btn btn-primary btn-circle btn-lg" title="Crear nuevo estudio">
                <i class="fa fa-list fa-file"></i>
            </a><span class="text-primary"></span>

            <a href="{{ route('estudio.desactivados') }}" class="btn btn-warning pull-right">
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
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($estudios as $estudio)
                        <tr>
                            <td>{{$estudio->id_estudio}}</td>
                            <td>{{$estudio->nombre_est}}</td>
                            <td>{{$estudio->descripcion_est}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('estudio.editar', $estudio) }}" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('estudio.desactivar', $estudio->id_estudio) }}" title="Eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button class=" btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="5">
                            <center>No hay estudios para mostrar</center>
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