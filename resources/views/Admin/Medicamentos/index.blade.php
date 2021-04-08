@extends('Admin.templeteAdmin')
@section('titulo') Medicamentos @endsection

@section('contenido_admin')
<?php
$sessionTipo = session('sessionTipo');
?>
<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Lista de Medicamentos</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">

            <a href="{{ route('medicamento.crear') }}" class="btn btn-primary btn-circle btn-lg" title="Dar de alta nuevo medicamento">
                <i class="fa fa-list fa-file"></i>
            </a><span class="text-primary"></span>
            @if ($sessionTipo == 'admin')
            <a href="{{ route('medicamento.desactivados') }}" class="btn btn-warning pull-right">
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
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Costo</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($medicamentos as $medicamento)
                        <tr>
                            <td>{{$medicamento->id_medicamento}}</td>
                            <td>
                                @if ($medicamento->foto_med)
                                <img src="{{ Storage::url($medicamento->foto_med) }}" width="50px" class="img-thumbnail img-responsive" alt="Responsive image">
                                @else
                                <img src="{{ asset('archivos/Sinfoto.png') }}" width="50px" class="img-thumbnail img-responsive" alt="Responsive image">
                                @endif
                            </td>
                            <td>{{$medicamento->nombre_med}}</td>
                            <td>{{$medicamento->cant_disp}}</td>
                            <td>$ {{$medicamento->costo}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('medicamento.editar', $medicamento) }}" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            @if ($sessionTipo == 'admin')
                            <td>
                                <form method="POST" action="{{ route('medicamento.desactivar', $medicamento->id_medicamento) }}" title="Eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button class=" btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <td colspan="5">
                            <center>No hay pacientes para mostrar</center>
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