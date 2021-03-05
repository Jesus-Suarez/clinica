<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('titulo')</title>
    <!-- icono -->
    <link href="{{ asset('img/logo.jpg') }}" rel="icon">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('css/admin/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/admin/startmin.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('css/admin/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">DigitalClinic</a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="{{ asset('index') }}"><i class="fa fa-home fa-fw"></i> Sitio Web</a></li>
            </ul>

            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown navbar-inverse">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Jesus Suarez <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil de Usuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <img src="{{ asset('img/logo.jpg') }}" height="30" width="30" class=" rounded" alt="">

                        </li>
                        <li>
                            <a href="{{ asset('') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ asset('Doctores') }}"><i class="fa fa-users fa-fw"></i> Doctores</a>
                        </li>
                        <li>
                            <a href="{{ asset('Especialidades') }}"><i class="fa fa-tag fa-fw"></i> Especialidades</a>
                        </li>
                        <li>
                            <a href="{{ asset('nuevoPaciente') }}"><i class="fa fa-user-plus fa-fw"></i> Pacientes</a>
                        </li>
                        <li>
                            <a href="{{ asset('nuevaCita') }}"><i class="fa fa-check fa-fw"></i> Citas</a>
                        </li>
                        <li>
                            <a href="{{ asset('nuevaConsulta') }}"><i class="fa fa-book fa-fw"></i> Consultas</a>
                        </li>
                        <li>
                            <a href="{{ asset('Tratamientos') }}"><i class="fa fa-signal fa-fw"></i> Tratamientos</a>
                        </li>
                        <li>
                            <a href="{{ asset('Horarios') }}"><i class="fa fa-clock-o fa-fw"></i> Horarios</a>
                        </li>
                        <li>
                            <a href="{{ asset('nuevoDia') }}"><i class="fa fa-times-circle fa-fw"></i> Dias</a>
                        </li>
                        <li>
                            <a href="{{ asset('nuevoEstudio') }}"><i class="fa fa-list fa-fw"></i> Estudios</a>
                        </li>
                        <li>
                            <a href="{{ asset('nuevaConsulta_trat') }}"><i class="fa fa-check-square-o fa-fw"></i> Consultas Tratamientos</a>
                        </li>
                        <li>
                            <a href="{{ asset('nuevoMedicamento') }}"><i class="fa fa-arrows fa-fw"></i> Medicamentos</a>
                        </li>
                        <li>
                            <a href="{{ asset('nuevoConsultorio') }}"><i class="fa fa-eye fa-fw"></i> Consultorios</a>
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('contenido_admin')
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/admin/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('js/admin/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/admin/startmin.js') }}"></script>

</body>

</html>