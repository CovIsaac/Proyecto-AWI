<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard - Destilado Agave</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body class="d-flex flex-column min-vh-100">
        <header class="bg-dark text-white text-center py-5">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 64 64" class="me-3">
                        <!-- Coloca aquí tu path -->
                        <path d="..."></path>
                    </svg>
                    <div class="text-start">
                        <h1 class="m-0">Destilado Agave</h1>
                        <p class="m-0">El arte del mezcal</p>
                    </div>
                </div>
                <div>
                    <button class="btn btn-light" id="menu-button">
                        &#9776;
                    </button>
                </div>
            </div>
        </header>
        <main class="container my-5 flex-grow-1">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                @foreach($mezcales as $mezcal)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/flavors/' . $mezcal->flavor . '.jpg') }}" class="card-img-top" alt="{{ $mezcal->flavor }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $mezcal->name }}</h5>
                                <p class="card-text">{{ $mezcal->flavor }}</p>
                                <p class="card-text">Precio: $220 MXN</p>
                                <form action="{{ route('add-to-cart', $mezcal->id) }}" method="POST">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <button type="button" class="btn btn-outline-secondary" onclick="decreaseQuantity({{ $mezcal->id }})">-</button>
                                        <input type="number" name="quantity" id="quantity-{{ $mezcal->id }}" class="form-control text-center" value="1" readonly>
                                        <button type="button" class="btn btn-outline-secondary" onclick="increaseQuantity({{ $mezcal->id }})">+</button>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Añadir al Carrito</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
        <footer class="bg-dark text-white text-center py-3 mt-auto">
            <p>&copy; 2024 Destilado Agave. Todos los derechos reservados.</p>
        </footer>
        
        <!-- Barra lateral -->
        <div id="sidebar" class="sidebar">
            <button class="close-btn" id="close-btn">&times;</button>
            @auth
                <a href="{{ url('/profile') }}">Perfil</a>
                <a href="{{ url('/carrito') }}">Carrito</a>
                <a href="{{ route('logout') }}" class="logout-link"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endauth
        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.getElementById('menu-button').addEventListener('click', function() {
                document.getElementById('sidebar').style.width = '250px';
            });

            document.getElementById('close-btn').addEventListener('click', function() {
                document.getElementById('sidebar').style.width = '0';
            });

            function increaseQuantity(id) {
                const quantityInput = document.getElementById('quantity-' + id);
                let quantity = parseInt(quantityInput.value);
                if (quantity < 10) {
                    quantityInput.value = quantity + 1;
                }
            }

            function decreaseQuantity(id) {
                const quantityInput = document.getElementById('quantity-' + id);
                let quantity = parseInt(quantityInput.value);
                if (quantity > 1) {
                    quantityInput.value = quantity - 1;
                }
            }
        </script>
    </body>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .text-start h1 {
            font-size: 3em;
        }

        header .text-start p {
            font-size: 1.5em;
            font-style: italic;
            margin-top: 5px;
        }

        nav ul.nav {
            padding-left: 0;
        }

        nav ul.nav li.nav-item a.nav-link {
            color: #ffffff;
            font-weight: 400;
        }

        nav ul.nav li.nav-item a.nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid #000;
        }

        main {
            flex: 1;
        }

        section h2 {
            font-size: 2em;
            margin-bottom: 20px;
            border-bottom: 2px solid #343a40;
            padding-bottom: 10px;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        footer p {
            margin: 0;
        }

        svg.me-3 {
            width: 50px; /* Ajusta el tamaño del ícono según necesites */
            height: auto;
        }

        img.img-fluid {
            max-width: 100%;
            height: auto;
        }

        .btn-success {
            margin-top: 20px;
        }

        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.25em;
        }

        .card-img-top {
            width: 100%; 
            height: 200px; /* Ajusta la altura según necesites */
            object-fit: cover; /* Esto se asegura de que la imagen mantenga su relación de aspecto mientras llena el contenedor */
        }

        .card-body {
            flex: 1;
        }

        .card-text {
            flex: 1;
            display: flex;
            align-items: flex-end;
        }

        .card-footer {
            background-color: #ffffff;
        }

        img.rounded {
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Estilos para la barra lateral */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            right: 0;
            background-color: #343a40;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 25px;
            color: #ffffff;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
            background-color: rgba(255, 255, 255, 0.1); /* Añade un fondo al hacer hover */
        }

        .sidebar .close-btn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .logout-link {
            font-size: 20px;
            margin-top: auto;
        }

        /* Estilos para el botón de menú */
        #menu-button {
            font-size: 30px;
            background-color: transparent;
            border: none;
            color: #ffffff;
            cursor: pointer;
        }

    </style>
</html>
