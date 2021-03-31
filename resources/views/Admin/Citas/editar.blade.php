@extends('Admin.templeteAdmin')
@section('titulo') Editar Cita @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Editar cita</h1><br>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="panel panel-primary">
        <div class="panel-heading bg-secondary">

        </div>
        <div class="panel-body bg-info">
            <form action="{{route('cita.actualizar',$cita[0]->id_cita)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Fecha de la cita</label>
                        <input type="date" class="form-control" name="fecha_cita" value="{{$cita[0]->fecha_cita}}">
                        @error('fecha_cita')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Hora de la cita</label>
                        <input type="time" class="form-control" name="hora" value="{{$cita[0]->hora}}">
                        @error('hora')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Elige a tu doctor</label>
                        <select class="form-control" name="id_doctor">
                            @foreach($doctores as $doctor)
                            @if($cita[0]->id_doctor == $doctor->id_doctor)
                            <option value='{{$cita[0]->id_doctor}}' selected> {{$doctor->nombre_doc}} {{$doctor->ap_pat_doc}} {{$doctor->ap_mat_doc}}</option>
                            @else
                            <option value='{{$doctor->id_doctor}}'> {{$doctor->nombre_doc}} {{$doctor->ap_pat_doc}} {{$doctor->ap_mat_doc}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('id_doctor')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Elige al paciente</label>
                        <select class="form-control" name="id_paciente">
                            @foreach($pacientes as $paciente)
                            @if($cita[0]->id_paciente == $paciente->id_paciente)
                            <option value='{{$cita[0]->id_paciente}}' selected> {{$paciente->nombre_pac}} {{$paciente->ap_pat_pac}} {{$paciente->ap_mat_pac}}</option>
                            @else
                            <option value='{{$paciente->id_paciente}}'> {{$paciente->nombre_pac}} {{$paciente->ap_pat_pac}} {{$paciente->ap_mat_pac}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('id_paciente')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Elige el consultorio</label>
                        <select class="form-control" name="id_consultorio">
                            @foreach($consultorios as $consultorio)
                            @if($cita[0]->id_consultorio == $consultorio->id_consultorio)
                            <option value='{{$cita[0]->id_consultorio}}' selected> {{$consultorio->numero}} </option>
                            @else
                            <option value='{{$consultorio->id_consultorio}}'> {{$consultorio->numero}} </option>
                            @endif
                            @endforeach
                        </select>
                        @error('id_consultorio')
                        <p class=" text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group col-sm-2">
                        <label></label>
                        <button class="btn btn-sm btn-block btn-primary" type="submit">
                            Actualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.panel-body -->
        <div class="panel-footer bg-secondary"></div>
        <!-- /.panel-footer-->
    </div>
    <!-- /.panel -->
</section>
<!-- /.content -->

@stop