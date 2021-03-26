@extends('Admin.templeteAdmin')
@section('titulo') Nuevo Estudio @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Agregar un nuevo estudio</h1><br>
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
            <form action="{{ route('estudio.almacenar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre del estudio médico" name="nombre_est" value="{{ old('nombre_est') }}">
                        @if ($errors->first('nombre_est'))
                        <p class="text-danger">{{$errors->first('nombre_est')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Descripcion</label>
                        <textarea class="form-control" name="descripcion_est" rows="5" placeholder="Escribe una descripcion del estudio, minimo 50 caracteres">{{ old('descripcion_est') }}</textarea>
                        @if ($errors->first('descripcion_est'))
                        <p class="text-danger">{{$errors->first('descripcion_est')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
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