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
            <form role="form" action="{{route('guardaCita')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Fecha de la cita</label>
                        <input type="date" class="form-control" name="fecha_cita" value="{{old('fecha_cita')}}">
                        @if ($errors->first('fecha_cita'))
                        <p class="text-danger">{{$errors->first('fecha_cita')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Hora de la cita</label>
                        <input type="time" class="form-control" name="hora" value="{{old('hora')}}">
                        @if ($errors->first('hora'))
                        <p class="text-danger">{{$errors->first('hora')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Elige a tu doctor</label>
                        <select class="form-control" name="id_doctor"">
                            <option value="">--- Selecciona un doctor ---</option>
                            <option value=" 1" {{ old('id_doctor') == 1 ? 'selected' : '' }}>Jesus suarez alvarez</option>
                            <option value="2" {{ old('id_doctor') == 2 ? 'selected' : '' }}>Uriel Aguilar de la Crux</option>
                            <option value="3" {{ old('id_doctor') == 3 ? 'selected' : '' }}>Oscar Jimenez Reyes</option>
                        </select>
                        @if ($errors->first('id_doctor'))
                        <p class="text-danger">{{$errors->first('id_doctor')}}</p>
                        @endif
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Elige al paciente</label>
                        <select class="form-control" name="id_paciente"">
                            <option value="">--- Selecciona al paciente ---</option>
                            <option value=" 3" {{ old('id_paciente') == 3 ? 'selected' : '' }}>Oscar Jimenez Reyes</option>
                            <option value="2" {{ old('id_paciente') == 2 ? 'selected' : '' }}>Uriel Aguilar de la Crux</option>
                            <option value="1" {{ old('id_paciente') == 1 ? 'selected' : '' }}>Jesus suarez alvarez</option>
                        </select>
                        @if ($errors->first('id_paciente'))
                        <p class="text-danger">{{$errors->first('id_paciente')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Elige el consultorio</label>
                        <select class="form-control" name="id_consultorio"">
                            <option value="">--- Selecciona el consultorio ---</option>
                            <option value=" 1" {{ old('id_consultorio') == 1 ? 'selected' : '' }}>Consultorio 1</option>
                            <option value="2" {{ old('id_consultorio') == 2 ? 'selected' : '' }}>Consultorio 2</option>
                            <option value="3" {{ old('id_consultorio') == 3 ? 'selected' : '' }}>Consultorio 3</option>
                        </select>
                        @if ($errors->first('id_consultorio'))
                        <p class="text-danger">{{$errors->first('id_consultorio')}}</p>
                        @endif
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