@extends('Admin.templeteAdmin')
@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Agregar nuevo médico</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="panel panel-primary">
        <div class="panel-heading bg-secondary">
            <div class="row">
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                    <button class="btn btn-sm btn-primary" type="submit">
                        Restaurar registros
                    </button>
                </div>
            </div>

        </div>
        <div class="panel-body">
            <form role="form" action="{{route('guardaDoctor')}}" method="POST">
                {{csrf_field()}}
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre del médico" name="nombre_doc" value="{{old('nombre_doc')}}">
                        @if ($errors->first('nombre_doc'))
                        <p class="text-danger">{{$errors->first('nombre_doc')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Apellido paterno</label>
                        <input type="text" class="form-control" placeholder="Escribe su apellido paterno" name="ap_pat_doc" value="{{old('ap_pat_doc')}}">
                        @if ($errors->first('ap_pat_doc'))
                        <p class="text-danger">{{$errors->first('ap_pat_doc')}}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Apellido materno</label>
                        <input type="text" class="form-control" placeholder="Escribe su apellido materno" name="ap_mat_doc" value="{{old('ap_mat_doc')}}">
                        @if ($errors->first('ap_mat_doc'))
                        <p class="text-danger">{{$errors->first('ap_mat_doc')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Sexo</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="sexo_doc" value="H">Masculino
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="sexo_doc" value="M">Femenino
                            </label>
                        </div>
                        @if ($errors->first('sexo_doc'))
                        <p class="text-danger">{{$errors->first('sexo_doc')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nac" value="{{old('fecha_nac')}}">
                        @if ($errors->first('fecha_nac'))
                        <p class="text-danger">{{$errors->first('fecha_nac')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Telefono </label>
                        <input type="number" class="form-control" placeholder="Ingrese su numero de telefono" name="telefono_doc" value="{{old('telefono_doc')}}">
                        @if ($errors->first('telefono_doc'))
                        <p class="text-danger">{{$errors->first('telefono_doc')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Especialidad</label>
                        
                        <select class="form-control" name="especialidad_id"required>
                            <option value="0">--- Elija una especialidad ---</option>
                            <option>Dermatologo</option>
                            <option>Cirujano</option>
                            <option>Ginecologo</option>
                            <option>Cardiologo</option>
                        </select>
                        @if ($errors->first('especialidad_id'))
                        <p class="text-danger">{{$errors->first('especialidad_id')}}</p>
                        @endif
                        
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Correo electronico</label>
                        <input type="mail" class="form-control" placeholder="Escribe su correo electronico" name="email_doc" value="{{old('email_doc')}}">
                        @if ($errors->first('email_doc'))
                        <p class="text-danger">{{$errors->first('email_doc')}}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" placeholder="Ingresa su contraseña" name="pass" value="{{old('pass')}}">
                        @if ($errors->first('pass'))
                        <p class="text-danger">{{$errors->first('pass')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Foto</label>
                        <input type="file" class="form-control" placeholder="Agregar una foto">
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