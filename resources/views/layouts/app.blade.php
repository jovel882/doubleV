<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME', 'DoubleVTest') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('includes')
</head>
<body>
    <!-- Cabezote -->
    <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <a href="{{ route('home') }}" target="_self" class="text-white">
                        <i class="fa-brands fa-github-alt display-1"></i>
                    </a>
                </div>
                <div class="col-6 text-end">
                    <h1 class="title">Usuarios GitHub</h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Área de contenido -->
    <main class="content">
        <div class="container py-4">
            @yield('content')
        </div>
    </main>

    <!-- Pie de página -->
    <footer class="footer">
        <div class="container">
            <div class="row py-3">
                <div class="col-md-6 text-center text-md-start align-self-center display-6">
                    <span class="author">John Fredy Velasco Bareño</span>
                </div>
                <div class="col-md-6 text-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-4 text-center text-md-end py-3">
                                <a href="mailto:jovel882@gmail.com" target="_blank" class="text-info">
                                    <i class="fa-solid fa-square-envelope display-6"></i>
                                </a>
                            </div>
                            <div class="col-md-4 text-center text-md-end py-3">
                                <a href="https://github.com/jovel882" target="_blank" class="text-info">
                                    <i class="fa-brands fa-square-github display-6"></i>
                                </a>
                            </div>
                            <div class="col-md-4 text-center text-md-end py-3">
                                <a href="https://www.linkedin.com/in/jovel882/" target="_blank" class="text-info">
                                    <i class="fa-brands fa-linkedin display-6"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    @stack('js')
</body>
</html>