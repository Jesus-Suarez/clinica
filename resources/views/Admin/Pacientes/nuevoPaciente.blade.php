 @extends('Admin.templeteAdmin')
 @section('titulo') Nuevo Paciente @endsection

 @section('contenido_admin')

 <div class="row">
     <div class="col-lg-12">
         <br><br>
         <h1 class="page-header dropdown-toggle">Agregar nuevo paciente</h1><br>
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
             <form role="form" action="{{route('guardaPaciente')}}" method="POST" enctype="multipart/form-data">
                 {{csrf_field()}}
                 <div class="row">
                     <div class="form-group col-sm-6">
                         <label>Nombre</label>
                         <input type="text" class="form-control" placeholder="Ingresa el nombre del paciente" name="nombre_pac" value="{{old('nombre_pac')}}">
                         @if ($errors->first('nombre_pac'))
                         <p class="text-danger">{{$errors->first('nombre_pac')}}</p>
                         @endif
                     </div>
                     <div class="form-group col-sm-6">
                         <label>Apellido paterno</label>
                         <input type="text" class="form-control" placeholder="Escribe su apellido paterno" name="ap_pat_pac" value="{{old('ap_pat_pac')}}">
                         @if ($errors->first('ap_pat_pac'))
                         <p class="text-danger">{{$errors->first('ap_pat_pac')}}</p>
                         @endif
                     </div>
                 </div>
                 <div class="row">
                     <div class="form-group col-sm-6">
                         <label>Apellido materno</label>
                         <input type="text" class="form-control" placeholder="Escribe su apellido materno" name="ap_mat_pac" value="{{old('ap_mat_pac')}}">
                         @if ($errors->first('ap_mat_pac'))
                         <p class="text-danger">{{$errors->first('ap_mat_pac')}}</p>
                         @endif
                     </div>
                     <div class="form-group col-sm-6">
                         <label>Sexo</label>
                         <div class="radio">
                             <label>
                                 <input type="radio" name="sexo_pac" value="H" {{ (old('sexo_pac') == "H") ? "checked" : "" }}>Masculino
                             </label>
                         </div>
                         <div class="radio">
                             <label>
                                 <input type="radio" name="sexo_pac" value="M" {{ (old('sexo_pac') == "M") ? "checked" : "" }}>Femenino
                             </label>
                         </div>
                         @if ($errors->first('sexo_pac'))
                         <p class="text-danger">{{$errors->first('sexo_pac')}}</p>
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
                         <input type="number" class="form-control" placeholder="Ingrese los 10 digitos de su telefono" name="telefono_pac" value="{{old('telefono_pac')}}">
                         @if ($errors->first('telefono_pac'))
                         <p class="text-danger">{{$errors->first('telefono_pac')}}</p>
                         @endif
                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-sm-6">
                         <label>Estado</label>
                         <input type="text" class="form-control" placeholder="Ingrese el estado donde vive" name="estado" value="{{old('estado')}}">
                         @if ($errors->first('estado'))
                         <p class="text-danger">{{$errors->first('estado')}}</p>
                         @endif
                     </div>

                     <div class="form-group col-sm-6">
                         <label>Municipio</label>
                         <input type="text" class="form-control" placeholder="Ingrese el municipio donde vive" name="municipio" value="{{old('municipio')}}">
                         @if ($errors->first('municipio'))
                         <p class="text-danger">{{$errors->first('municipio')}}</p>
                         @endif
                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-sm-6">
                         <label>Código postal</label>
                         <input type="text" class="form-control" placeholder="Ingrese el CP (Ej. 52030)" name="cp" value="{{old('cp')}}">
                         @if ($errors->first('cp'))
                         <p class="text-danger">{{$errors->first('cp')}}</p>
                         @endif
                     </div>

                     <div class="form-group col-sm-6">
                         <label>Calle</label>
                         <input type="text" class="form-control" placeholder="Ingrese el nombre de la calle donde vive" name="calle" value="{{old('calle')}}">
                         @if ($errors->first('calle'))
                         <p class="text-danger">{{$errors->first('calle')}}</p>
                         @endif
                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-sm-6">
                         <label>Numero</label>
                         <input type="text" class="form-control" placeholder="Numero de la calle donde vive" name="numero" value="{{old('numero')}}">
                         @if ($errors->first('numero'))
                         <p class="text-danger">{{$errors->first('numero')}}</p>
                         @endif
                     </div>
                     <div class="form-group col-sm-6">
                         <label>Correo electronico</label>
                         <input type="mail" class="form-control" placeholder="Escribe su correo electronico" name="email_pac" value="{{old('email_pac')}}">
                         @if ($errors->first('email_pac'))
                         <p class="text-danger">{{$errors->first('email_pac')}}</p>
                         @endif
                     </div>
                 </div>

                 <div class="row">
                     <div class="form-group col-sm-6">
                         <label>Foto</label>
                         <input type="file" class="form-control" name="foto_pac" accept="image/png, .jpeg, .jpg, image/gif">
                         @if ($errors->first('foto_pac'))
                         <p class="text-danger">{{$errors->first('foto_pac')}}</p>
                         @endif
                     </div>
                     <div class="form-group col-sm-6">
                         <label>Contraseña</label>
                         <input type="password" class="form-control" placeholder="Ingresa su contraseña" name="pass_pac" value="{{old('pass_pac')}}">
                         @if ($errors->first('pass_pac'))
                         <p class="text-danger">{{$errors->first('pass_pac')}}</p>
                         @endif
                     </div>
                 </div>
                 <div class="row">
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