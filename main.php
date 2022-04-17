<?php
    $routes = [
        'Home' => [
            'title' => 'Home page',
        ],
        'Products' => [
            'title' => 'Products',
        ],
        'Login' => [
            'title' => 'Login',
        ],
        'Register' => [
            'title' => 'Register',
        ],
        'NotFoundPage' => [
            'title' => 'Not found page',
        ],
    ];
    $view = $_GET['v'] ?? 'Home';
    if(!isset($routes[$view])) {
        $view = 'NotFoundPage';
    }
    $currentRoute = $routes[$view];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cocodrile - <?=$currentRoute['title'];?></title>
    <!-- CSS only Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <!-- mainStyles -->
    <link href="Styles/MainStyles.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1 class="visually-hidden">Cocodrile</h1>
    </header>
    <nav>
        <div class="container row navbar navbar-expand navbar-dark bg-light">
            <ul class="collapse navbar-collapse navbar-nav text-center ms-auto">
                <li class="nav-item">
                    <a href="main.php?v=Home" class="nav-link text-secondary"> Home </a>
                </li>
                <li class="nav-item">
                    <a href="main.php?v=Products" class="nav-link text-secondary"> Products </a>
                </li>
                <li class="nav-item">
                    <a href="main.php?v=Login" class="nav-link text-secondary"> Login </a>
                </li>
                <li class="nav-item">
                    <a href="main.php?v=Register" class="nav-link text-secondary"> Register </a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="container">
        <?php
            if (file_exists('./Views/' . $view . '.php')) {
                require __DIR__ . '/Views/' . $view . '.php';
            } else {
                require __DIR__ . '/Views/NotFoundPage.php';
            }
        ?>
    </main>
    <footer class="bg-light text-secondary mt-4">
        <div class="container row m-auto justify-content-center">
            <ul class="col-lg-4 my-5">
                <li> Datos: </li>
                <li> Gonzalo Ramos Farinho </li>
                <li> Comisión A, Mañana </li>
                <li> Interacción con dispositivos móviles </li>
                <li> Escuela Da Vinci 2021 </li>
            </ul>
            <ul class="col-lg-4 my-5">
                <li> Secciones: </li>
                <li> Home </li>
                <li> Características </li>
                <li> Tipos de cafe </li>
                <li> Video </li>
                <li> Contactanos </li>
            </ul>
            <ul class="col-lg-4 my-5">
                <li> Redes sociales: </li>
            </ul>
        </div>
    </footer>
    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous">
    </script>
</body>
</html>