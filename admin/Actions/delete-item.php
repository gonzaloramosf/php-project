<?php
require_once __DIR__ . '/../../Bootstrap/autoload.php';

$id = $_GET['id'];

$item = (new Item())->getItemById($id);

if (!$item) {
    $_SESSION['message_error'] = "Item a eliminar no encontrado en la base de datos.";
    header("Location: ../index.php?v=NewItem");
    exit;
}

try {
    // chmod(__DIR__ . '/../../Images/' . $item->getImage(), 0755);
    $item->deleteItem();
    if (!empty($item->getImage()) && file_exists(__DIR__ . '/../../Images/' . $item->getImage())) {
        unlink(__DIR__ . '/../../Images/' . $item->getImage());
    }
    $_SESSION['message_correct'] = "Se elimino el producto <b>" . $item->getItem() . "</b> correctamente.";
    header("Location: ../index.php?v=Manage");
    exit;
} catch(\Exception $e) {
    $_SESSION['message_error'] = "Error al eliminar un producto. Por favor,
    intente de nuevo.";
    header("Location: ../index.php?v=Manage");
    exit;
}