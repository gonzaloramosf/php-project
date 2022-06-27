<?php
    $items = (new Item())->all();
?>

<section>
    <h1 class="m-5 text-center"> Administrar productos </h1>
    <div class="d-flex justify-content-center m-4">
        <a href="index.php?v=NewItem" class="btn btn-primary opacity-75 w-25"> Agregar un producto </a>
    </div>
    <table class="table table-dark table-striped table-borderless text-center">
        <thead>
            <tr>
                <th> ID</th>
                <th> Imagen </th>
                <th> Title</th>
                <th> Resumen </th>
                <th> Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($items as $item) :
        ?>
            <tr>
                <td><?= $item->getItemId();?></td>
                <td> <img class="table-img" src="<?= "../Images/" . $item->getImage();?>" alt="<?= $item->getImageTitle();?>" /> </td>
                <td><?= $item->getItem();?></td>
                <td><?= $item->getResume();?></td>
                <td class="d-flex justify-content-center">
                    <a class="btn btn-warning me-1 opacity-75" href="index.php?v=EditItem&id=<?= $item->getItemId();?>">
                        Editar
                    </a>

                    <form action="Actions/delete-item.php?id=<?= $item->getItemId();?>"
                          method="post" class="form-delete">
                        <button class="btn btn-danger ms-1 opacity-75" type="submit"> Eliminar </button>
                    </form>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
</section>