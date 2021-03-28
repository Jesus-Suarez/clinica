@extends('Admin.templeteAdmin')
@section('titulo') Edita consultorio @endsection

@section('contenido_admin')

<div class="row">
    <div class="col-lg-12">
        <br><br>
        <h1 class="page-header dropdown-toggle">Edita consultorio</h1><br>
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
            <form action="{{route('consultorio.actualizar', $consultorio->id_consultorio)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Numero de consultorio</label>
                        <input type="text" class="form-control" placeholder="Ingresa numero de consultorio (A-01)" name="numero" value="{{$consultorio->numero}}">
                        @error ('numero')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                </div>


                <div class="row">
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