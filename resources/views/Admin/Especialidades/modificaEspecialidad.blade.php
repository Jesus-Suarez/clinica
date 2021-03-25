@extends('Admin.templeteAdmin')
@section('titulo') Modificar especialidad @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle"> Modificar especialidad</h1><br>
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
            <form role="form" action="{{route('updateEspecialidad')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">

                        <input name="especialidad_id" type="hidden" value="{{$consulta->especialidad_id}}">

                        <label>Nombre de la especialidad</label>
                        <input type="text" class="form-control" name="nombre_esp" value="{{$consulta->nombre_esp}}" placeholder="Nombre de la especialidad">
                        @if ($errors->first('nombre_esp'))
                        <p class="text-danger">{{$errors->first('nombre_esp')}}</p>
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