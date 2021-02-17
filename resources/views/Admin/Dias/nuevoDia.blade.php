@extends('Admin.templeteAdmin')
@section('titulo') Nuevo Dia de trabajo @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Asignar dia de trabajo</h1><br>
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
            <form role="form" action="{{route('guardaDia')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Dia de trabajo.</label>
                        <select class="form-control" name="nombre_dia"">
                            <option value="0">--- Elige un dia de trabajo ---</option>
                            <option value="Lunes" @if(old('nombre_dia') == 'Lunes') {{'selected'}} @endif>Lunes</option>
                            <option value="Martes" @if(old('nombre_dia') == 'Martes') {{'selected'}} @endif>Martes</option>
                            <option value="Miercoles" @if(old('nombre_dia') == 'Miercoles') {{'selected'}} @endif>Miercoles</option>
                            <option value="Jueves" @if(old('nombre_dia') == 'Jueves') {{'selected'}} @endif>Jueves</option>
                            <option value="Viernes" @if(old('nombre_dia') == 'Viernes') {{'selected'}} @endif>Viernes</option>
                            <option value="Sabado" @if(old('nombre_dia') == 'Sabado') {{'selected'}} @endif>Sabado</option>
                            <option value="Domingo" @if(old('nombre_dia') == 'Domingo') {{'selected'}} @endif>Domingo</option>
                        </select>
                        @if ($errors->first('nombre_dia'))
                        <p class="text-danger">{{$errors->first('nombre_dia')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Doctor</label>
                        <select class="form-control" name="id_doctor"">
                            <option value="0">--- Asignar Doctor ---</option>
                            <option value="1" {{ old('id_doctor') == 1 ? 'selected' : '' }}>Andrea Vazquez</option>
                            <option value="2" {{ old('id_doctor') == 2 ? 'selected' : '' }}>Carlos Vallarta</option>
                            <option value="3" {{ old('id_doctor') == 3 ? 'selected' : '' }}>Gaby Hernan</option>
                            <option value="4" {{ old('id_doctor') == 4 ? 'selected' : '' }}>Arturo Reyes</option>
                        </select>
                        @if ($errors->first('id_doctor'))
                        <p class="text-danger">{{$errors->first('id_doctor')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Horario</label>

                        <select class="form-control" name="id_horario"">
                            <option value="0">--- Asignar Horario ---</option>
                            <option value="1" {{ old('id_horario') == 1 ? 'selected' : '' }}>10:00:00 - 16:30:00</option>
                            <option value="2" {{ old('id_horario') == 2 ? 'selected' : '' }}>08:00:00 - 14:30:00</option>
                            <option value="3" {{ old('id_horario') == 3 ? 'selected' : '' }}>06:00:00 - 12:30:00</option>
                            <option value="4" {{ old('id_horario') == 4 ? 'selected' : '' }}>07:00:00 - 13:30:00</option>
                        </select>
                        @if ($errors->first('id_horario'))
                        <p class="text-danger">{{$errors->first('id_horario')}}</p>
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