@extends('Admin.templeteAdmin')
@section('titulo') Doctores @endsection

@section('contenido_admin')

<!-- Reporte de usuarios -->
<br><br><br><br>
<div class="panel shadow mb-4">
    <div class="panel-header py-3">
        <center>
            <h2 class="m-0 font-weight-bold text-primary">Lista de Doctores</h2><br>
        </center>
        <nav class="navbar navbar-light bg-light">

            <a href="nuevoDoctor" class="btn btn-primary btn-circle btn-lg">
                <i class="fa fa-list fa-file"></i>
            </a><span class="text-primary"></span>

            <a href="DoctoresElim" class="btn btn-warning pull-right">
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
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Telefono</th>
                            <th>Especialidad</th>
                            <th>Correo</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consulta as $doc)
                        <tr>
                            <!-- <td><img src="{{ asset('archivos/'.$doc->foto_doc) }}}" height=50 width=50></td>  -->
                            <td>{{$doc->id_doctor}}</td>
                            <td>{{$doc->nombre_doc}} {{$doc->ap_pat_doc}} {{$doc->ap_mat_doc}}</td>
                            <td>{{\Carbon\Carbon::parse($doc->fecha_nac)->age}} años</td>
                            <td>
                                @if($doc->sexo_doc == "H")
                                Masculino
                                @else
                                Femenino
                                @endif
                            </td>
                            <td>{{$doc->telefono_doc}}</td>
                            <td>{{$doc->espec}}</td>
                            <td>{{$doc->email_doc}}</td>
                            <td>
                                <a class="btn btn-primary " href="{{route('modificaDoctor',['id_doctor'=>$doc->id_doctor])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger " href="{{route('desactivarDoctor',['id_doctor'=>$doc->id_doctor])}}">
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