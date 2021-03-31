@extends('Admin.templeteAdmin')
@section('titulo') Nueva Cita @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Crear nueva cita</h1><br>
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
            <form action="{{route('cita.almacenar')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Fecha de la cita</label>
                        <input type="date" class="form-control" name="fecha_cita" value="{{old('fecha_cita')}}">
                        @error('fecha_cita')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Hora de la cita</label>
                        <input type="time" class="form-control" name="hora" value="{{old('hora')}}">
                        @error('hora')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Elige a tu doctor</label>
                        <select class="form-control" name="id_doctor">
                            <option value="">--- Elige un doctor ---</option>
                            @foreach($doctores as $doctor)
                            <option value='{{$doctor->id_doctor}}' @if(old('id_doctor')==$doctor->id_doctor ) {{'selected'}} @endif>{{$doctor->nombre_doc}} {{$doctor->ap_pat_doc}} {{$doctor->ap_mat_doc}}</option>
                            @endforeach
                        </select>
                        @error('id_doctor')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Elige al paciente</label>
                        <select class="form-control" name="id_paciente">
                            <option value="">--- Elige al paciente ---</option>
                            @foreach($pacientes as $paciente)
                            <option value='{{$paciente->id_paciente}}' @if(old('id_paciente')==$paciente->id_paciente ) {{'selected'}} @endif>{{$paciente->nombre_pac}} {{$paciente->ap_pat_pac}} {{$paciente->ap_mat_pac}}</option>
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
                            <option value="">--- Selecciona el consultorio ---</option>
                            @foreach($consultorios as $consultorio)
                            <option value='{{$consultorio->id_consultorio}}' @if(old('id_consultorio')==$consultorio->id_consultorio ) {{'selected'}} @endif>{{$consultorio->numero}}</option>
                            @endforeach
                        </select>
                        @error('id_consultorio')
                        <p class=" text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group col-sm-2">
                        <label></label>
                        <button class="btn btn-sm btn-block btn-primary" type="submit">
                            Guardar
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