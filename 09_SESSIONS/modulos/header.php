<header>
    <h1>Nuestros colores preferidos</h1>
    
    <?php
    if($_SESSION['usuario']) :?>
    <span>Hola <?= $_SESSION['usuario'] ?></span>
    <form action="../logout.php" method="post">
        <button type="submit">Cerrar sesion <i class="fa-solid fa-door-open"></i></button>
    </form>
    <?php else: ?>
    <form action="acceder.php" method="post">
        <button type="submit">Iniciar sesion</button>
        
    </form>
    <?php endif; ?>
</header>

<style>

</style>