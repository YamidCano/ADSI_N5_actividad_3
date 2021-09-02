<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @livewireStyles
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/2560px-Bootstrap_logo.svg.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
              <span class="fs-4 ml-5">Bootstrap</span>
            </a>
            <ul class="nav nav-pills">
              <li class="nav-item"><a href="{{route('registro')}}" class="nav-link active" aria-current="page">Registros</a></li>
              <li class="nav-item"><a href="{{route('aprendices')}}" class="nav-link">aprendices</a></li>
              <li class="nav-item"><a href="{{route('instructor')}}" class="nav-link">instructor</a></li>
              <li class="nav-item"><a href="{{route('jornada')}}" class="nav-link">jornada</a></li>
            </ul>
          </header>
        <!-- End Navbar-->
        <div class="p-2 bd-highlight">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </div>
    </div>
    <!--Footer-->
    <footer class="footer bg-primary" style="position: fixed;bottom: 0;width: 100%;">
        <div class="container">
            <div class="flex-row-reverse mt-2 mb-2 row align-items-center ">
                <div class="text-center text-white col-md-12 col-sm-12">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> &copy; Bootstrap - Todos los derechos reservados
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    @livewireScripts
</body>

</html>
