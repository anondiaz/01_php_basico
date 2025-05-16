<!-- Preparamos el formulario de login
Este formulario se mostrará si el usuario no ha iniciado sesión -->
<form action="login.php" method="post">
    <fieldset>
        <h2>Iniciar sesión</h2>
        <div>
            <label for="usuario">Nombre:</label>
            <input type="text" name="usuario" id="usuario" minlength="4" maxlength="15">
            <p class="condiciones-input">Mínimo 4 caracteres y máximo 15</p>
            <p id="errorUsuario"></p>
        </div>
        <div>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" minlength="4" maxlength="10">
            <p class="condiciones-input">Mínimo 4 caracteres y máximo 10</p>
            <p id="errorPassword"></p>
        </div>
        <!-- Los enlaces de abajo son para los usuarios que no tienen cuenta o no recuerdan la contraseña. -->
        <div class="div-enlaces">
            <a href="index.php?formulario=crear-cuenta">No tengo cuenta todavía</a>
            <a href="index.php?formulario=reset">No recuerdo la contraseña</a>
        </div>
        <!-- Los botones de abajo son para enviar el formulario o borrarlo. -->
        <div class="botones">
            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
        </div>
    </fieldset>
</form>