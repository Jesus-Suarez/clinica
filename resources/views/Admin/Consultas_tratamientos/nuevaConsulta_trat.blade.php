
@extends('Admin.templeteAdmin')
@section('titulo') Nueva Consulta Tratamiento @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
       <br><br> <h1 class="page-header dropdown-toggle">Agregar nueva consulta tratamiento</h1><br>
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
            <form role="form" action="{{route('guardaConsulta_trat')}}" method="POST">
                {{csrf_field()}}

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Consulta</label>
                        
                        <select class="form-control" name="id_consulta"">
                            <option value="0">--- Elija una consulta ---</option>
                            <option value="1" {{ old('id_consulta') == 1 ? 'selected' : '' }}>3334</option>
                            <option value="2" {{ old('id_consulta') == 2 ? 'selected' : '' }}>3335</option>
                            <option value="3" {{ old('id_consulta') == 3 ? 'selected' : '' }}>3336</option>
                            <option value="4" {{ old('id_consulta') == 4 ? 'selected' : '' }}>3337</option>
                        </select>
                        @if ($errors->first('id_consulta'))
                        <p class="text-danger">{{$errors->first('id_consulta')}}</p>
                        @endif
                        
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Estudio</label>
                        <select class="form-control" name="id_estudio"">
                            <option value="0">--- Elija un estudio ---</option>
                            <option value="1" {{ old('id_estudio') == 1 ? 'selected' : '' }}>Perfil renal Nitrógeno de urea</option>
                            <option value="2" {{ old('id_estudio') == 2 ? 'selected' : '' }}>Hemograma completo</option>
                            <option value="3" {{ old('id_estudio') == 3 ? 'selected' : '' }}>Resonancia magnetica</option>
                            <option value="4" {{ old('id_estudio') == 4 ? 'selected' : '' }}>Estudio de sangre</option>
                        </select>
                        @if ($errors->first('id_estudio'))
                        <p class="text-danger">{{$errors->first('id_estudio')}}</p>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-sm-6">
                    <label>Medicamento</label>
                        <select class="form-control" name="id_medicamento"">
                            <option value="0">--- Elija un medicamento ---</option>
                            <option value="1" {{ old('id_medicamento') == 1 ? 'selected' : '' }}>Minoxidil</option>
                            <option value="2" {{ old('id_medicamento') == 2 ? 'selected' : '' }}>Paracetamol</option>
                            <option value="3" {{ old('id_medicamento') == 3 ? 'selected' : '' }}>Omeprasol</option>
                            <option value="4" {{ old('id_medicamento') == 4 ? 'selected' : '' }}>Ibuprofeno</option>
                        </select>
                        @if ($errors->first('id_medicamento'))
                        <p class="text-danger">{{$errors->first('id_medicamento')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Cantidad de medicamentos recetados </label>
                        <input type="number" class="form-control" placeholder="Indique cantidad de medicamento recetado (máximo 9)" name="cant_disp" value="{{old('cant_disp')}}">
                        @if ($errors->first('cant_disp'))
                        <p class="text-danger">{{$errors->first('cant_disp')}}</p>
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