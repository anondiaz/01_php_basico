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
    header {
     background-color: #202020;
    color: antiquewhite;
    margin-bottom: 2rem;
    div {
display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 90%;
    margin: 0 auto;
    button {
        background-color: transparent;
        border: 1px solid white;
        border-radius: 5px;
        
    }
span {
    display: flex;
    font-size: 1.2rem;
    a {
        text-decoration: none;
        color: inherit;
    }
}    
}
    
    
   
}

h1 {
    text-align: center;
    margin: 2rem 0;
}
</style>