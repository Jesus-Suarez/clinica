@extends('Admin.templeteAdmin')
@section('titulo') Modificar Tratamiento @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle"> Modificar Tratamiento</h1><br>
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
            <form role="form" action="{{route('updateTratamiento')}}" method="POST">
                {{csrf_field()}}

                <div class="row">
                    <div class="form-group col-sm-6">

                    <input name="id_tratamiento" type="hidden" value="{{$consulta->id_tratamiento}}">

                        <label>Descripción del tratamiento</label>
                        <Textarea name="descripcion_trat" class="form-control" placeholder="Descripcion del tratamiento del paciente">{{$consulta->descripcion_trat}}</Textarea>
                        @if ($errors->first('descripcion_trat'))
                        <p class="text-danger">{{$errors->first('descripcion_trat')}}</p>
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