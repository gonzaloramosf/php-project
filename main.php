<?php
    $routes = [
        'Home' => [
            'title' => 'Home page',
        ],
        'Items' => [
            'title' => 'Items',
        ],
        'ItemDetail' => [
          'title' => 'Item details'
        ],
        'Contact' => [
            'title' => 'Contact',
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
    <link href="MainStyles.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1 class="visually-hidden">Cocodrile Shop</h1>
    </header>
    <nav>
        <div>
            <a href="main.php?v=Home" class="logo"> Cocodrile Shop</a>
        </div>
        <div class="container row navbar navbar-expand navbar-dark bg-light">
            <ul class="justify-content-end collapse navbar-collapse navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="main.php?v=Home" class="nav-link text-secondary"> Home </a>
                </li>
                <li class="nav-item">
                    <a href="main.php?v=Items" class="nav-link text-secondary"> Items </a>
                </li>
                <li class="nav-item">
                    <a href="main.php?v=Contact" class="nav-link text-secondary"> Contact </a>
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
    <footer>
        <div>
            <ul>
                <li> Datos: </li>
                <li> Gonzalo Ramos Farinho </li>
                <li> Comisión A, Mañana </li>
                <li> Programación II </li>
                <li> Escuela Da Vinci 2022 </li>
            </ul>
            <ul>
                <li> Secciones: </li>
                <li>
                    <a href="main.php?v=Home" class="text-secondary"> Home </a>
                </li>
                <li>
                    <a href="main.php?v=Items" class="text-secondary"> Items </a>
                </li>
                <li>
                    <a href="main.php?v=Contact" class="text-secondary"> Contact </a>
                </li>
            </ul>
            <ul>
                <li> Redes sociales: </li>
                <li>
                    <a href="https://www.linkedin.com/" class="text-secondary"> Linkedin </a>
                </li>
                <li>
                    <a href="https://github.com/gonzaloramosf?tab=repositories" class="text-secondary"> GitHub </a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/" class="text-secondary"> Twitter </a>
                </li>
            </ul>
        </div>
    </footer>
</body>
</html>