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
            <form action="{{route('dia.almacenar')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Dia de trabajo.</label>
                        <select class="form-control" name="nombre_dia">
                            <option value="">--- Elige un dia de trabajo ---</option>
                            <option value="Lunes" @if(old('nombre_dia')=='Lunes' ) {{'selected'}} @endif>Lunes</option>
                            <option value="Martes" @if(old('nombre_dia')=='Martes' ) {{'selected'}} @endif>Martes</option>
                            <option value="Miercoles" @if(old('nombre_dia')=='Miercoles' ) {{'selected'}} @endif>Miercoles</option>
                            <option value="Jueves" @if(old('nombre_dia')=='Jueves' ) {{'selected'}} @endif>Jueves</option>
                            <option value="Viernes" @if(old('nombre_dia')=='Viernes' ) {{'selected'}} @endif>Viernes</option>
                            <option value="Sabado" @if(old('nombre_dia')=='Sabado' ) {{'selected'}} @endif>Sabado</option>
                            <option value="Domingo" @if(old('nombre_dia')=='Domingo' ) {{'selected'}} @endif>Domingo</option>
                        </select>
                        @if ($errors->first('nombre_dia'))
                        <p class="text-danger">{{$errors->first('nombre_dia')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Doctor</label>
                        <select class="form-control" name="id_doctor">
                            <option value="">--- Elige un doctor ---</option>
                            @foreach($doctores as $doctor)
                            <option value='{{$doctor->id_doctor}}' @if(old('id_doctor')==$doctor->id_doctor ) {{'selected'}} @endif>{{$doctor->nombre_doc}} {{$doctor->ap_pat_doc}} {{$doctor->ap_mat_doc}}</option>
                            @endforeach
                        </select>
                        @if ($errors->first('id_doctor'))
                        <p class=" text-danger">{{$errors->first('id_doctor')}}</p>
                        @endif
                    </div>
                </div>

                <div class=" row">
                    <div class="form-group col-sm-6">
                        <label>Horario</label>

                        <select class="form-control" name="id_horario">
                            <option value="">--- Asignar Horario ---</option>
                            @foreach($horarios as $horario)
                            <option value='{{$horario->id_horario}}' @if(old('id_horario')==$horario->id_horario ) {{'selected'}} @endif>De {{$horario->hora_inicio}} a {{$horario->hora_fin}}</option>
                            @endforeach
                        </select>
                        @if ($errors->first('id_horario'))
                        <p class=" text-danger">{{$errors->first('id_horario')}}</p>
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