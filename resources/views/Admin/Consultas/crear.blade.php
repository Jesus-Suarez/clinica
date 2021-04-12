@extends('Admin.templeteAdmin')
@section('titulo') Nueva Cita @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header dropdown-toggle">
            <center>Crear nueva consulta No. Folio 324</center>
        </h1>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="panel panel-primary">
        <div class="panel-heading bg-secondary">
            <div class="row">
                <div class="form-group col-sm-1">
                </div>
                <div class="form-group col-sm-6">
                    <label>Paciente:</label>
                    <div class="form-inline">
                        <button type="submit" class="btn btn-info">Nuevo +</button>
                        <div class="form-group">
                            <div class="input-group">
                                <select class="form-control" name="id_cita">
                                    <option value=" 1" {{ old('id_cita') == 1 ? 'selected' : '' }}>Cita 1232 --- Pac. Uriel Aguilar</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Cambiar</button>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label>Medico que atiende:</label>
                    <input type="number" class="form-control" name="costo" disabled placeholder="Med. Oscar Jimenez Reyes">
                    @if ($errors->first('costo'))
                    <p class="text-danger">{{$errors->first('costo')}}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="panel-body bg-info">
            <form action="{{route('consulta.almacenar')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-2">
                    </div>
                    <div class="form-group col-sm-8">
                        <label>Diagnostico / Acontecimientos</label>
                        <textarea class="form-control" name="descripcion_est" rows="4" placeholder="Escribe tu diagnostico aquí">{{ old('descripcion_est') }}</textarea>
                        @if ($errors->first('descripcion_est'))
                        <p class="text-danger">{{$errors->first('descripcion_est')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-4">
                        <label>Estudios:</label>
                        <div class="form-inline">
                            <button type="submit" class="btn btn-info">Crear</button>
                            <select class="form-control" name="id_estudio">
                                <option value="">--- Selecciona un estudio ---</option>
                                <option value=" 1">Estudio 1</option>
                                <option value="2">Estudio 2</option>
                                <option value="3">Estudio 3</option>
                            </select>
                            @if ($errors->first('id_estudio'))
                            <p class="text-danger">{{$errors->first('id_estudio')}}</p>
                            @endif
                            <button type="submit" class="btn btn-success">+</button>
                        </div>
                    </div>

                    <div class="form-group col-sm-4">
                        <label>Tratamientos:</label>
                        <div class="form-inline">
                            <button type="submit" class="btn btn-info">Crear</button>
                            <select class="form-control" name="id_trat">
                                <option value="">--- Selecciona un tratamiento ---</option>
                                <option value=" 1">Tratamiento 1</option>
                                <option value="2">Tratamiento 2</option>
                                <option value="3">Tratamiento 3</option>
                            </select>
                            @if ($errors->first('id_trat'))
                            <p class="text-danger">{{$errors->first('id_trat')}}</p>
                            @endif
                            <button type="submit" class="btn btn-success">+</button>
                        </div>
                    </div>

                    <div class="form-group col-sm-4">
                        <label>Medicamentos:</label>
                        <div class="form-inline">
                            <button type="submit" class="btn btn-info">Crear</button>
                            <select class="form-control" name="id_med">
                                <option value="">--- Selecciona un medicamento---</option>
                                <option value=" 1">Medicamento 1</option>
                                <option value="2">Medicamento 2</option>
                                <option value="3">Medicamento 3</option>
                            </select>
                            @if ($errors->first('id_med'))
                            <p class="text-danger">{{$errors->first('id_med')}}</p>
                            @endif
                            <button type="submit" class="btn btn-success">+</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-4">
                        <table class="table">
                            <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Estudio 1</td>
                                    <td>
                                        <button class=" btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Estudio 2</td>
                                    <td>
                                        <button class=" btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-sm-4">
                        <table class="table">
                            <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Tratamieto 1</td>
                                    <td>
                                        <button class=" btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Tratamieto 2</td>
                                    <td>
                                        <button class=" btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group col-sm-4">
                        <table class="table">
                            <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Medicamento 1</td>
                                    <td>
                                        <button class=" btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Medicamento 2</td>
                                    <td>
                                        <button class=" btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-3"></div>
                    <div class="form-group col-sm-6">
                        <div class="form-group form-group-lg">
                            <label>Costo:</label>
                            <div class="form-inline">
                                <input type="text" name="" id="" class="form-control input-lg" placeholder="Costo de la consulta">
                                <button class="btn btn-success  btn-lg">Guardar e imprimir</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- /.panel-body -->
    <div class="panel-footer bg-secondary"></div>
    <!-- /.panel-footer-->
    </div>
    <!-- /.panel -->
</section>
<!-- /.content -->

@stop