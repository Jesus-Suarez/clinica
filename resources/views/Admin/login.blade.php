<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container px-4">
        <h1>Bienvenido a Digital Clinic.</h1>
        <div class="row gx-5">
            <div class="col">

                @if (Session::has('message'))
                <p class="alert alert-danger">
                    {{Session::get('message')}}
                </p>
                @endif

                <div class="p-3 border bg-light">
                    <form action="{{route('login.acceder')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" name="email" value="{{old('email')}}">
                            <label for="floatingEmail">Correo electronico</label>
                        </div>
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="{{old('password')}}">
                            <label for="floatingPassword">Contraseña</label>
                        </div>
                        <br>

                        <div class="d-grid gap-2">
                            <button class="btn btn-sm btn-outline-primary" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>