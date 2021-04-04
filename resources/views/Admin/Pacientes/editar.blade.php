p @extends('Admin.templeteAdmin')
@section('titulo') Edita paciente @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Editar paciente</h1><br>
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
            <form action="{{ route('paciente.actualizar', $paciente->id_paciente) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingresa el nombre del paciente" name="nombre_pac" value="{{$paciente->nombre_pac}}">
                        @error ('nombre_pac')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Apellido paterno</label>
                        <input type="text" class="form-control" placeholder="Escribe su apellido paterno" name="ap_pat_pac" value="{{$paciente->ap_pat_pac}}">
                        @if ($errors->first('ap_pat_pac'))
                        <p class="text-danger">{{$errors->first('ap_pat_pac')}}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Apellido materno</label>
                        <input type="text" class="form-control" placeholder="Escribe su apellido materno" name="ap_mat_pac" value="{{$paciente->ap_mat_pac}}">
                        @if ($errors->first('ap_mat_pac'))
                        <p class="text-danger">{{$errors->first('ap_mat_pac')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Sexo</label>
                        @if($paciente->sexo_pac == 'M')
                        <div class="radio">
                            <label>
                                <input type="radio" name="sexo_pac" value="M" checked>Masculino
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="sexo_pac" value="F">Femenino
                            </label>
                        </div>

                        @else
                        <div class="radio">
                            <label>
                                <input type="radio" name="sexo_pac" value="M">Masculino
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="sexo_pac" value="F" checked>Femenino
                            </label>
                        </div>
                        @endif
                        @if ($errors->first('sexo_pac'))
                        <p class="text-danger">{{$errors->first('sexo_pac')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="fecha_nac" value="{{$paciente->fecha_nac}}">
                        @if ($errors->first('fecha_nac'))
                        <p class="text-danger">{{$errors->first('fecha_nac')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Telefono </label>
                        <input type="number" class="form-control" placeholder="Ingrese los 10 digitos de su telefono" name="telefono_pac" value="{{$paciente->telefono_pac}}">
                        @if ($errors->first('telefono_pac'))
                        <p class="text-danger">{{$errors->first('telefono_pac')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Estado</label>
                        <input type="text" class="form-control" placeholder="Ingrese el estado donde vive" name="estado" value="{{$paciente->estado}}">
                        @if ($errors->first('estado'))
                        <p class="text-danger">{{$errors->first('estado')}}</p>
                        @endif
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Municipio</label>
                        <input type="text" class="form-control" placeholder="Ingrese el municipio donde vive" name="municipio" value="{{$paciente->municipio}}">
                        @if ($errors->first('municipio'))
                        <p class="text-danger">{{$errors->first('municipio')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Código postal</label>
                        <input type="text" class="form-control" placeholder="Ingrese el CP (Ej. 52030)" name="cp" value="{{$paciente->cp}}">
                        @if ($errors->first('cp'))
                        <p class="text-danger">{{$errors->first('cp')}}</p>
                        @endif
                    </div>

                    <div class="form-group col-sm-6">
                        <label>Calle</label>
                        <input type="text" class="form-control" placeholder="Ingrese el nombre de la calle donde vive" name="calle" value="{{$paciente->calle}}">
                        @if ($errors->first('calle'))
                        <p class="text-danger">{{$errors->first('calle')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Numero</label>
                        <input type="text" class="form-control" placeholder="Numero de la calle donde vive" name="numero" value="{{$paciente->numero}}">
                        @if ($errors->first('numero'))
                        <p class="text-danger">{{$errors->first('numero')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Correo electronico</label>
                        <input type="email" class="form-control" placeholder="Escribe su correo electronico" name="email_pac" value="{{$paciente->email_pac}}">
                        @if ($errors->first('email_pac'))
                        <p class="text-danger">{{$errors->first('email_pac')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    @if ($paciente->foto_pac)
                    <div class="form-group col-sm-3">
                        <img src="{{ Storage::url($paciente->foto_pac) }}" class="img-thumbnail img-responsive" alt="Responsive image">
                    </div>
                    @endif
                    <div class="form-group col-sm-3">
                        <label>Cambiar foto</label>
                        <input type="file" class="form-control-file" name="foto_pac" accept="image/png, .jpeg, .jpg, image/gif">
                        @if ($errors->first('foto_pac'))
                        <p class="text-danger">{{$errors->first('foto_pac')}}</p>
                        @endif
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" placeholder="Ingresa su contraseña" name="pass_pac" value="password">
                        @if ($errors->first('password'))
                        <p class="text-danger">{{$errors->first('pass_pac')}}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-sm btn-block btn-primary">Actualizar
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