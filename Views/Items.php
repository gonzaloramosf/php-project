<?php
    require_once __DIR__ . '/../Classes/Item.php';
    $items = (new Item())->all();
?>

<section>
    <h2>Products</h2>
    <?php
    foreach ($items as $item):
    ?>
        <div>
            <h3><?=$item->getItem();?> </h3>
        </div>
    <?php
    endforeach;
    ?>
</section>
