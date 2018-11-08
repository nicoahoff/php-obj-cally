<?php require_once ('helpers.php');?>

<body>
    <header>
        <nav id="navHeader">
            <section id="logoCally">
                <img src="img/cally.png" width="120px" alt="logo Cally" >
            </section>
            <ul>
            <?php if(guest()):?>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="#queEsCally">¿Qué es Cally?</a></li>
            <li><a href="#procesoSeleccion">¿Por qué ser Caller?</a></li>
            <li><a href="#dondeEstamos">¿Donde estamos?</a></li>
            <li><a href="#registrate">Registrate</a></li>
            <li><a href="login.php">Iniciar sesión</a></li>
            <?php else:?>
            <li class="nombreHeader"><?= user()->getName()?></li>
            <li><a class="botonIng" href="logout.php">Logout</a></li>
            <?php endif;?>
            </ul>
        </nav>
    </header>