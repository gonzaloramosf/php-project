<?php
    require_once __DIR__ . '/../Classes/Item.php';
    $item = (new Item())->getItemById($_GET['id']);
?>
<section class="container">
    <div class="row mt-5">
        <div class="col-lg-7 text-center">
            <img class="img-fluid" src="Images/<?=$item->getImage();?>" alt="<?=$item->getImageTitle();?>"/>
        </div>
        <div class="col-lg-5">
            <h2 class="border-bottom mb-2"><?= $item->getItem(); ?></h2>
            <h4><?= $item->getResume(); ?></h4>
            <h5 class="mt-5"> Descripcion: </h5>
            <p> <?= $item->getDescription(); ?> </p>
            <h5 class="mt-5"> Precio: <?= $item->getPrice(); ?></h5>
            <button class="btn btn-success cartButton"> Agregar al carrito </button>
        </div>
    </div>
</section>


