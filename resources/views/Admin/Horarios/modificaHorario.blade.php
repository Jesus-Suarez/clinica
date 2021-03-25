@extends('Admin.templeteAdmin')
@section('titulo') Modificar Horario @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Modificar horario</h1><br>
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
            <form role="form" action="{{route('updateHorario')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">

                        <input name="id_horario" type="hidden" value="{{$consulta->id_horario}}">

                        <label>Elige la hora de inicio</label>
                        <input type="time" class="form-control" name="hora_inicio" value="{{$consulta->hora_inicio}}">
                        @if ($errors->first('hora_inicio'))
                        <p class="text-danger">{{$errors->first('hora_inicio')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Elige la hora de fin</label>
                        <input type="time" class="form-control" name="hora_fin" value="{{$consulta->hora_fin}}">
                        @if ($errors->first('hora_fin'))
                        <p class="text-danger">{{$errors->first('hora_fin')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <label></label>
                    <button class="btn btn-sm btn-block btn-primary" type="submit">
                        Guardar
                    </button>
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