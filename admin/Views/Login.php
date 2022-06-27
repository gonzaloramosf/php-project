<?php
    $dataForm = $_SESSION['data_form'] ?? [];
    unset($_SESSION['data_form']);
?>
<section class="w-100 m-auto mt-5 login">
    <h1> Iniciar sesión </h1>
    <p> Ingresa tu usuario para ingresar al panel donde podras eliminar y editar los productos de la web.</p>
    <form action="Actions/login.php" method="post" class="mt-4">
        <div class="mb-3">
            <label for="email" class="form-label"> Correo </label>
            <input type="email" id="email" name="email" class="form-control"
                   value="<?= $dataForm['email'] ?? null;?>"
            />
        </div>
        <div class="">
            <label for="password" class="form-label"> Contraseña </label>
            <input type="password" id="password" name="password" class="form-control" />
        </div>
        <input type="submit" class="btn btn-primary w-100 mt-4" value="Login"/>
    </form>
</section>