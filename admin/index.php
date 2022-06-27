<?php
require_once __DIR__ . '/../Bootstrap/autoload.php';
$routes = [
    'Login' => [
        'title' => 'Iniciar sesión',
    ],
    'Manage' => [
        'title' => 'Manejar productos',
    ],
    'NewItem' => [
        'title' => 'Agregar producto',
    ],
    'EditItem' => [
        'title' => 'Editar producto',
    ],
    'NotFoundPage' => [
    'title' => 'Página no encontrada',
    ]
];
$view = $_GET['v'] ?? 'Dashboard';
if(!isset($routes[$view])) {
    $view = 'NotFoundPage';
}
$currentRoute = $routes[$view];

// messages error or correct
$messageCorrect = $_SESSION['message_correct'] ?? null;
$messageError   = $_SESSION['message_error'] ?? null;

unset($_SESSION['message_correct'], $_SESSION['message_error']);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Cocodrile Administrator Panel - <?=$currentRoute['title'];?></title>
    <!-- CSS only Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- mainStyles -->
    <link href="../MainStyles.css" rel="stylesheet">
</head>
<body class="bg-secondary">
<header>
    <h1 class="visually-hidden">Cocodrile Shop</h1>
</header>
<nav class="bg-dark">
    <div>
        <span class="logo"> Cocodrile Shop</span>
    </div>
    <div class="container row navbar navbar-expand navbar-dark bg-dark">
        <ul class="justify-content-end collapse navbar-collapse navbar-nav ms-auto">
            <li class="nav-item">
                <a href="index.php?v=Manage" class="nav-link text-secondary"> Manage </a>
            </li>
        </ul>
    </div>
</nav>
<main class="container mt-3 mb-5">
    <?php
    if ($messageError !== null) : ?>
    <div> <p class="text-danger" role="alert"> <?= $messageError ?> </p> </div>
    <?php
    endif;
    ?>
    <?php
    if ($messageCorrect !== null) : ?>
        <div> <p class="text-success bg-light w-50 p-1 border" role="alert"> <?= $messageCorrect ?> </p> </div>
    <?php
    endif;
    ?>

    <?php
    if (file_exists('./Views/' . $view . '.php')) {
        require __DIR__ . '/Views/' . $view . '.php';
    } else {
        require __DIR__ . '/Views/NotFoundPage.php';
    }
    ?>
</main>
<script src="js/delete-item.js"></script>
</body>
</html>