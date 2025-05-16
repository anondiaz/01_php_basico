<header>
    <div>
        <h1>Nuestros colores preferidos</h1>
        <div>
            <!-- El saludo y el boton de logout solo se muestran si el usuario ha iniciado sesión -->
            <?php if (isset($_SESSION['usuario'])) : ?>
                <span>¡Hola <?= $_SESSION['usuario'] ?>!</span>
                <form action="../logout.php" method="post">
                    <button id="btnLogout" type="submit"><i class="fa-solid fa-door-open"></i></button>
                </form>
            <?php endif; ?>
            <!-- El formulario de idioma se muestra siempre -->
            <?php
            $rutaIdioma = "modulos/idioma.php";
            if (isset($_SESSION['usuario'])) {
                $rutaIdioma = "../modulos/idioma.php";
            }
            ?>
            <!-- Montamos el formulario de idioma -->
            <form action="<?= $rutaIdioma ?>" name="form-idioma" method="post">
                <select name="select-idioma" id="select-idioma">
                    <option value="es">ESP</option>
                    <option value="ca">CAT</option>
                    <option value="en">ENG</option>
                </select>
            </form>
        </div>
    </div>
</header>