@extends('Admin.templeteAdmin')
@section('titulo') Doctores desactivados @endsection

@section('contenido_admin')
<?php
$sessionTipo = session('sessionTipo');
?>
<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Lista de Doctores desactivados</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">
            <a href="{{ route('Doctores') }}" class="btn btn-primary btn-circle btn-lg">
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
                <table class="table table-responsive table-hover table-striped" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Fecha nac.</th>
                            <th>Sexo</th>
                            <th>Telefono</th>
                            <th>Especialidad</th>
                            <th>Correo</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctor as $doc)
                        <tr>
                            <td>{{$doc->id_doctor}}</td>
                            <td>
                                @if ($doc->foto_doc)
                                <img src="{{ Storage::url($doc->foto_doc) }}" width="50px" class="img-thumbnail img-responsive" alt="Responsive image">
                                @else

                                <img src="{{ asset('archivos/Sinfoto.png') }}" width="50px" class="img-thumbnail img-responsive" alt="Responsive image">
                                @endif
                            </td>
                            <td>{{$doc->nombre_doc}} {{$doc->ap_pat_doc}} {{$doc->ap_mat_doc}}</td>
                            <td>{{$doc->fecha_nac}}</td>
                            <td>{{$doc->sexo_doc}}</td>
                            <td>{{$doc->telefono_doc}}</td>
                            <td>{{$doc->espec}}</td>
                            <td>{{$doc->email_doc}}</td>
                            <td>
                                <a class="btn btn-warning " href="{{route('activarDoctor',['id_doctor'=>$doc->id_doctor])}}">
                                    <i class="fa fa-retweet"></i>
                                </a>
                            </td>
                            @if ($sessionTipo == 'admin')
                            <td>
                                <a class="btn btn-danger " href="{{route('eliminarDoctor',['id_doctor'=>$doc->id_doctor])}}">
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