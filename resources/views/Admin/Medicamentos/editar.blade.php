@extends('Admin.templeteAdmin')
@section('titulo') Editar medicamento @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Editar medicamento</h1><br>
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
            <form action="{{route('medicamento.actualizar', $consulta->id_medicamento)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Nombre del medicamento</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre del médico" name="nombre_med" value="{{$consulta->nombre_med}}">
                        @error ('nombre_med')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Cantidad disponible</label>
                        <input type="number" class="form-control" placeholder="Registra stock (-máx 5000)" name="cant_disp" value="{{$consulta->cant_disp}}">
                        @error ('cant_disp')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Costo</label>
                        <input type="number" class="form-control" placeholder="Ingresa el costo del medicamento" name="costo" value="{{$consulta->costo}}" step="0.01">
                        @error ('costo')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    @if ($consulta->foto_med)
                    <div class="form-group col-sm-3">
                        <img src="{{ Storage::url($consulta->foto_med) }}" class="img-thumbnail img-responsive" alt="Responsive image">
                    </div>
                    @endif
                    <div class="form-group col-sm-3">
                        <label>Foto</label>
                        <input type="file" class="form-control-file" name="foto_med" accept="image/png, .jpeg, .jpg, image/gif">
                        @if ($errors->first('foto_med'))
                        <p class="text-danger">{{$errors->first('foto_med')}}</p>
                        @endif
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2 col-xs-6">
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