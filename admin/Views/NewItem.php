<?php
    $errors   = $_SESSION['errors'] ?? [];
    $dataForm = $_SESSION['data_form'] ?? [];

    // removing all session variables
    unset($_SESSION['errors'], $_SESSION['data_form']);
?>
<section class="edit m-auto">
    <h2 class="text-center"> Agregar nuevo producto </h2>

    <form class="text-light" method="post" action="Actions/new-item.php" enctype="multipart/form-data">
        <div class="mt-3">
            <label class="form-label" for="item">Título</label>
            <input type="text"
                   id="item"
                   class="form-control"
                   name="item"
                   value="<?= $dataForm['item'] ?? null; ?>"
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
                    <?php endif;?>><?= $dataForm['resume'] ?? null; ?></textarea>
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
                    value="<?= $dataForm['price'] ?? null; ?>"
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
                    <?php endif;?>><?= $dataForm['description'] ?? null; ?></textarea>
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
            <label class="form-label" for="image">Imagen</label>
            <input
                    type="file"
                    id="image"
                    class="form-control"
                    name="image"
                    value="<?= $dataForm['image'] ?? null; ?>"
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
        <div class="mt-3">
            <label class="form-label" for="image_title">Título imagen</label>
            <input
                    type="text"
                    id="image_title"
                    class="form-control"
                    name="image_title"
                    value="<?= $dataForm['image_title'] ?? null; ?>"
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
                    value="<?= $dataForm['stock'] ?? null; ?>"
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
        <div class="mb-3">
            <input class="w-100 mt-4 btn btn-success"
                   type="submit" id="submit" name="submit" value="Publicar producto"/>
        </div>
    </form>
</section>