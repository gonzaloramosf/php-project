<?php
require_once __DIR__ . '/../../Bootstrap/autoload.php';

// POST data
$id          = $_POST['item_id'];
$item        = $_POST['item'];
$resume      = $_POST['resume'];
$price       = $_POST['price'];
$description = $_POST['description'];
$image       = $_FILES['image'];
$image_title = $_POST['image_title'];
$stock       = $_POST['stock'];

$itemExist = (new Item())->getItemById($id);

if (!$itemExist) {
    $_SESSION['message_error'] = "Item a eliminar no encontrado en la base de datos.";
    header("Location: ../index.php?v=Manage");
    exit;
}

// validate
$validate = new ItemValidation([
    'item'        => $item,
    'resume'      => $resume,
    'price'       => $price,
    'description' => $description,
    'image'       => $image,
    'image_title' => $image_title,
    'stock'       => $stock
]);

if($validate->errorsExist()) {
    // before redirecting, saving form data and errors in session variable
    $_SESSION['errors'] = $validate->getErrors();
    $_SESSION['data_form'] = $_POST;

    header("Location: ../index.php?v=EditItem&id=" . $id);
    exit;
}

// upload image
if(!empty($image['tmp_name'])) {
    $imageName = date('YmdHIs_') . $image['name'];
    move_uploaded_file($image['tmp_name'], __DIR__ . '/../../Images/' . $imageName);
}

try {
    $itemExist->edit([
        'user_fk'     => 1,
        'brand_fk'    => 1,
        'item'        => $item,
        'resume'      => $resume,
        'price'       => $price,
        'description' => $description,
        'image'       => $imageName ?? $itemExist->getImage(),
        'image_title' => $image_title,
        'stock'       => $stock
    ]);

    if (!empty($imageName)) {
        unlink(__DIR__ . '/../../Images/' . $itemExist->getImage());
    }

    $_SESSION['message_correct'] = "Se edito el producto <b>" . $item . "</b> correctamente.";
    // redirecting
    header("Location: ../index.php?v=Manage");
    exit;
} catch(\Exception $e) {
    $_SESSION['message_error'] = "Error al editar el producto. Por favor,
    intente de nuevo.";
    $_SESSION['data_form'] = $_POST;
    header("Location: ../index.php?v=EditItem" . $id);
    exit;
}