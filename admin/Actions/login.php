<?php
require_once __DIR__ . '/../../Bootstrap/autoload.php';

$email    = $_POST['email'];
$password = $_POST['password'];

$auth = (new Auth());
if ($auth->signIn($email, $password)) {
    $_SESSION['message_correct'] = "Se inicio sesión correctamente.";
    header("Location: ../index.php?v=Manage");
    exit;
} else {
    $_SESSION['message_error'] = "Error al iniciar sesión, datos incorrectos o no existentes. 
    Por favor intente de nuevo.";
    $_SESSION['data_form'] = $_POST;
    header("Location: ../index.php?v=Login");
    exit;
}