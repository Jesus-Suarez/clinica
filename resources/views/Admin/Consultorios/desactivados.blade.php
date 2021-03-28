@extends('Admin.templeteAdmin')
@section('titulo') Consultorios desactivados @endsection

@section('contenido_admin')

<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Consultorios desactivados</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">

            <a href="{{ route('consultorio.index') }}" class="btn btn-primary pull-right btn-circle btn-lg" title="Regresar">
                <i class="fa fa-list fa-rotate-left"></i>
                <span class="text"></span>
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
                            <th>Numero</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($consultorios as $consultorio)
                        <tr>
                            <td>{{$consultorio->id_consultorio}}</td>
                            <td>{{$consultorio->numero}}</td>
                            <td>
                                <a href="{{ route('consultorio.activar', $consultorio->id_consultorio) }}" class="btn btn-warning" title="Activar"><i class="fa fa-retweet"></i></a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('consultorio.eliminar', $consultorio->id_consultorio) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class=" btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty

                        <td colspan="3">
                            <center>No hay consultorios desactivados para mostrar</center>
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