<?php
require_once __DIR__ . '/../../Bootstrap/autoload.php';

// POST data
$item        = $_POST['item'];
$resume      = $_POST['resume'];
$price       = $_POST['price'];
$description = $_POST['description'];
$image       = $_FILES['image'];
$image_title = $_POST['image_title'];
$stock       = $_POST['stock'];

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

    header("Location: ../index.php?v=NewItem");
    exit;
}

// upload image
$imageName = date('YmdHIs_') . $image['name'];
move_uploaded_file($image['tmp_name'], __DIR__ . '/../../Images/' . $imageName);

try {
    (new Item)->create([
        'user_fk'     => 1,
        'brand_fk'    => 1,
        'item'        => $item,
        'resume'      => $resume,
        'price'       => $price,
        'description' => $description,
        'image'       => $imageName,
        'image_title' => $image_title,
        'stock'       => $stock
    ]);
    $_SESSION['message_correct'] = "Se cargo el producto <b>" . $item . "</b> correctamente.";
    // redirecting
    header("Location: ../index.php?v=Manage");
    exit;
} catch(\Exception $e) {
    $_SESSION['message_error'] = "Error al cargar un producto nuevo. Por favor,
    intente de nuevo.";
    $_SESSION['data_form'] = $_POST;
    header("Location: ../index.php?v=NewItem");
    exit;
}