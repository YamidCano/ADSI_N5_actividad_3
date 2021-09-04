<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    @livewireStyles

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light  border-bottom"> <button class="navbar-toggler"
                type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span
                    class="navbar-toggler-icon"></span> </button>
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="{{ asset('img') }}/logo.png" alt="" width="40" height="40"
                    class="d-inline-block align-text-top mr-9">
                <span class="fs-4 ml-2">APP ASISTENCIA</span>
            </a>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav nav-pills ml-md-auto">
                    <li class="nav-item">
                        <a href="{{ route('Registros') }} " class="nav-link {{ Request()->is('/') ? 'active' : '' }}"
                            aria-current="page">Registros</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Aprendices') }}"
                            class="nav-link {{ Request()->is('Aprendices') ? 'active' : '' }}">Aprendices</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Instructores') }}"
                            class="nav-link {{ Request()->is('Instructores') ? 'active' : '' }}">Instructores</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Jornadas') }}"
                            class="nav-link {{ Request()->is('Jornadas') ? 'active' : '' }}">Jornadas</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('Fichas') }}"
                            class="nav-link {{ Request()->is('Fichas') ? 'active' : '' }}">Fichas</a>
                    </li>
                </ul>
            </div>
        </nav>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    @livewireScripts

    @stack('js')

    <script>
        Livewire.on('alert', function(message) {
            Swal.fire(
                '¡Buen trabajo!',
                message,
                'success'
            )
        });

        window.livewire.on('Store', () => {
                $('#Store').modal('hide');
            });

            window.livewire.on('update', () => {
                $('#update').modal('hide');
            });
    </script>
</body>

</html>
