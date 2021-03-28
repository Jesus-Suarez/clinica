@extends('Admin.templeteAdmin')
@section('titulo') Tratamientos @endsection

@section('contenido_admin')

<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Lista de Tratamientos</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">

            <a href="nuevoTratamiento" class="btn btn-primary btn-circle btn-lg">
                <i class="fa fa-list fa-file"></i>
            </a><span class="text-primary"></span>

            <a href="TratamientosElim" class="btn btn-warning pull-right">
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
                            <th>Clave del tratamiento</th>
                            <th>Descripcion del tratamieinto</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tratamiento as $trat)
                        <tr>
                            <td>{{$trat->id_tratamiento}}</td>
                            <td>{{$trat->descripcion_trat}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('modificaTratamiento',['id_tratamiento'=>$trat->id_tratamiento])}}" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger " href="{{route('desactivarTratamiento',['id_tratamiento'=>$trat->id_tratamiento])}}" title="Eliminar">
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