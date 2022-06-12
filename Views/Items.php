<?php
    require_once __DIR__ . '/../Bootstrap/autoload.php';
    $items = (new Item())->all();
?>
<section class="container">
    <h2 class="m-3 mb-5 ml-5"> Las mejores zapatillas </h2>
    <div class="row text-center">
    <?php
    foreach ($items as $item):
    ?>
        <div class="col-sm-6 col-md-6 col-lg-4 items">
            <a href="main.php?v=ItemDetail&id=<?= $item->getItemId();?>">
                <h3 class="text-black-50"><?=$item->getItem();?> </h3>
            </a>
            <img class="img-fluid" src="Images/<?=$item->getImage();?>" alt="<?=$item->getImageTitle();?>"/>
            <a href="main.php?v=ItemDetail&id=<?= $item->getItemId();?>">
            <button class="btn btn-dark itemBtn"> Ver Detalles </button>
            </a>
        </div>
    <?php
    endforeach;
    ?>
    </div>
</section>