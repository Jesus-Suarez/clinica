@extends('Admin.templeteAdmin')
@section('titulo') Nuevo medicamento @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Agregar nuevo medicamento</h1><br>
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
            <form role="form" action="{{route('guardaMedicamento')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Nombre del medicamento</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre del médico" name="nombre_med" value="{{old('nombre_med')}}">
                        @if ($errors->first('nombre_med'))
                        <p class="text-danger">{{$errors->first('nombre_med')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Cantidad disponible</label>
                        <input type="number" class="form-control" placeholder="Registra stock (mínimo 100 - máximo 999)" name="cant_disp" value="{{old('cant_disp')}}">
                        @if ($errors->first('cant_disp'))
                        <p class="text-danger">{{$errors->first('cant_disp')}}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Costo</label>        
                        <input type="number" class="form-control" placeholder="Ingresa el costo del medicamento" name="costo" value="{{old('costo')}}">
                        @if ($errors->first('costo'))
                        <p class="text-danger">{{$errors->first('costo')}}</p>
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