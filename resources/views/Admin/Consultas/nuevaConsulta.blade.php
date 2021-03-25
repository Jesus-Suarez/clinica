@extends('Admin.templeteAdmin')
@section('titulo') Nueva Cita @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Crear nueva consulta</h1><br>
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
            <form role="form" action="{{route('guardaConsulta')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Precio de la consulta</label>
                        <input type="number" class="form-control" name="costo" value="{{old('costo')}}" placeholder="Precio de la consulta">
                        @if ($errors->first('costo'))
                        <p class="text-danger">{{$errors->first('costo')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Elige a cual cita pertenece</label>
                        <select class="form-control" name="id_cita">
                            <option value="">--- Selecciona la cita ---</option>
                            <option value=" 1" {{ old('id_cita') == 1 ? 'selected' : '' }}>Cita 1</option>
                            <option value="2" {{ old('id_cita') == 2 ? 'selected' : '' }}>Cita 2</option>
                            <option value="3" {{ old('id_cita') == 3 ? 'selected' : '' }}>Cita 3</option>
                        </select>
                        @if ($errors->first('id_cita'))
                        <p class="text-danger">{{$errors->first('id_cita')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Elige el tratamiento</label>
                        <select class="form-control" name="id_tratamiento"">
                            <option value="">--- Selecciona un doctor ---</option>
                            <option value=" 1" {{ old('id_tratamiento') == 1 ? 'selected' : '' }}>Jesus suarez alvarez</option>
                            <option value="2" {{ old('id_tratamiento') == 2 ? 'selected' : '' }}>Uriel Aguilar de la Crux</option>
                            <option value="3" {{ old('id_tratamiento') == 3 ? 'selected' : '' }}>Oscar Jimenez Reyes</option>
                        </select>
                        @if ($errors->first('id_tratamiento'))
                        <p class="text-danger">{{$errors->first('id_tratamiento')}}</p>
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