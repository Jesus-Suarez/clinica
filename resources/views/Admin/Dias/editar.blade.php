@extends('Admin.templeteAdmin')
@section('titulo') Edita día de trabajo @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Editar el día de trabajo</h1><br>
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
            <form action="{{ route('dia.actualizar', $dia[0]->id_dia) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Dia de trabajo.</label>
                        <select class="form-control" name="nombre_dia">
                            @foreach($dias as $di)
                            @if($dia[0]->id_dia == $di->id_dia)
                            <option value='{{$dia[0]->nombre_dia}}' selected> {{$dia[0]->nombre_dia}}</option>
                            @else
                            <option value='{{$di->nombre_dia}}'> {{$di->nombre_dia}}</option>
                            @endif
                            @endforeach
                        </select>
                        @if ($errors->first('nombre_dia'))
                        <p class=" text-danger">{{$errors->first('nombre_dia')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Doctor</label>
                        <select class="form-control" name="id_doctor">
                            @foreach($doctores as $doctor)
                            @if($dia[0]->id_doctor == $doctor->id_doctor)
                            <option value='{{$doctor->id_doctor}}' selected> {{$doctor->nombre_doc}}</option>
                            @else
                            <option value='{{$doctor->id_doctor}}'> {{$doctor->nombre_doc}}</option>
                            @endif
                            @endforeach
                        </select>

                        @if ($errors->first('id_doctor'))
                        <p class=" text-danger">{{$errors->first('id_doctor')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Horario</label>

                        <select class="form-control" name="id_horario"">
                            @foreach($horarios as $horario)
                            @if($dia[0]->id_horario == $horario->id_horario)
                            <option value='{{$horario->id_horario}}' selected>De {{$horario->hora_inicio}} a {{$horario->hora_fin}}</option>
                            @else
                            <option value='{{$horario->id_horario}}'>De {{$horario->hora_inicio}} a {{$horario->hora_fin}}</option>
                            @endif
                            @endforeach
                        </select>
                        @if($errors->first('id_horario'))
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