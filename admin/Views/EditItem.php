<?php
    $errors   = $_SESSION['errors'] ?? [];
    $dataForm = $_SESSION['data_form'] ?? [];

    // removing all session variables
    unset($_SESSION['errors'], $_SESSION['data_form']);

    $item = (new Item())->getItemById($_GET['id']);
?>
<section class="m-auto edit">
    <h2 class="text-center"> Editar un producto </h2>

    <form class="text-light d-flex flex-column" method="post" action="Actions/edit-item.php" enctype="multipart/form-data">
        <input type="hidden" name="item_id" value="<?= $item->getItemId();?>">
        <div class="mt-3">
            <label class="form-label" for="item">Título</label>
            <input type="text"
                   id="item"
                   class="form-control"
                   name="item"
                   value="<?= $dataForm['item'] ?? $item->getItem(); ?>"
                   <?php if(isset($errors['item'])):?> aria-describedby="error-title"
            /> <?php endif;?>
            <?php
            if (isset($errors['item'])):?>
                <div id="error-title">
                    <p class="text-danger"> <span class="visually-hidden"> Error: </span><i class="bi bi-x x-size"></i><?= $errors['item']; ?> </p>
                </div>
            <?php
            endif;
            ?>
        </div>
        <div class="mt-3">
            <label class="form-label" for="resume">Resumen</label>
            <textarea
                    rows="2"
                    id="resume"
                    class="form-control"
                    name="resume"
                    <?php if(isset($errors['resume'])):?> aria-describedby="error-resume"
                    <?php endif;?>><?= $dataForm['resume'] ?? $item->getResume(); ?></textarea>
            <?php
            if (isset($errors['resume'])):?>
                <div id="error-resume">
                    <p class="text-danger"> <span class="visually-hidden"> Error: </span><i class="bi bi-x x-size"></i><?= $errors['resume']; ?> </p>
                </div>
            <?php
            endif;
            ?>
        </div>
        <div class="mt-3">
            <label class="form-label" for="price">Precio</label>
            <input
                    type="number"
                    id="price"
                    class="form-control"
                    name="price"
                    value="<?= $dataForm['price'] ?? $item->getPrice(); ?>"
                    <?php if(isset($errors['price'])):?> aria-describedby="error-price"
            /> <?php endif;?>
            <?php
            if (isset($errors['price'])):?>
                <div id="error-price">
                    <p class="text-danger"> <span class="visually-hidden"> Error: </span><i class="bi bi-x x-size"></i><?= $errors['price']; ?> </p>
                </div>
            <?php
            endif;
            ?>
        </div>
        <div class="mt-3">
            <label class="form-label" for="description">Descripción</label>
            <textarea
                    rows="8"
                    id="description"
                    class="form-control"
                    name="description"
                    <?php if(isset($errors['description'])):?> aria-describedby="error-description"
                    <?php endif;?>><?= $dataForm['description'] ?? $item->getDescription(); ?></textarea>
            <?php
            if (isset($errors['description'])):?>
                <div id="error-description">
                    <p class="text-danger"> <span class="visually-hidden"> Error: </span><i class="bi bi-x x-size"></i><?= $errors['description']; ?> </p>
                </div>
            <?php
            endif;
            ?>
        </div>
        <div class="mt-3">
            <h2> Imagen seleccionada: <?= $item->getImageTitle();?> </h2>
            <p> Si no se selecciona otra, se deja por defecto la anterior.</p>
            <div class="d-flex edit-mobile">
                <?php if (!empty($item->getImage()) && file_exists(__DIR__ . '/../../Images/' . $item->getImage())) :
                    ?>
                    <div>
                        <img class="edit-image" src="<?= '../Images/' . $item->getImage();?>" alt="" />
                    </div>
                <?php
                endif;
                ?>
                <div class="d-flex flex-column w-75 ms-3">
                    <label class="form-label visually-hidden" for="image">Imagen</label>
                    <input
                            type="file"
                            id="image"
                            class="form-control  choose-image"
                            name="image"
                            value="<?= $dataForm['image'] ?? $item->getImage(); ?>"
                            <?php if(isset($errors['image'])):?> aria-describedby="error-image"
                    /> <?php endif;?>
                    <?php
                    if (isset($errors['image'])):?>
                        <div id="error-image">
                            <p class="text-danger"> <span class="visually-hidden"> Error: </span><i class="bi bi-x x-size"></i><?= $errors['image']; ?> </p>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <label class="form-label" for="image_title">Título imagen</label>
            <input
                    type="text"
                    id="image_title"
                    class="form-control"
                    name="image_title"
                    value="<?= $dataForm['image_title'] ?? $item->getImageTitle(); ?>"
                    <?php if(isset($errors['image_title'])):?> aria-describedby="error-image_title"
            /> <?php endif;?>
            <?php
            if (isset($errors['image_title'])):?>
                <div id="error-image_title">
                    <p class="text-danger"> <span class="visually-hidden"> Error: </span><i class="bi bi-x x-size"></i><?= $errors['image_title']; ?> </p>
                </div>
            <?php
            endif;
            ?>
        </div>
        <div class="mt-3">
            <label class="form-label" for="stock">Cantidad disponible</label>
            <input
                    type="number"
                    id="stock"
                    class="form-control"
                    name="stock"
                    value="<?= $dataForm['stock'] ?? $item->getStock(); ?>"
                    <?php if(isset($errors['stock'])):?> aria-describedby="error-stock"
            /> <?php endif;?>
            <?php
            if (isset($errors['stock'])):?>
                <div id="error-stock">
                    <p class="text-danger"> <span class="visually-hidden"> Error: </span><i class="bi bi-x x-size"></i><?= $errors['stock']; ?> </p>
                </div>
            <?php
            endif;
            ?>
        </div>
        <div>
            <input class="w-100 mt-4 btn btn-success"
                   type="submit" id="submit" name="submit" value="Editar"/>
        </div>
    </form>
</section>