<?php require_once ('head.php');?>
<?php require_once ('header.php');?>


<?php

require_once 'helpers.php';



$session->mantenerSesion();


if (check()) {
    redirect('bienvenido.php');
}

if ($_POST && $_FILES) {
    $usuarioViejo = $db->traerUsuario($_POST['email']);

    $identifier_photo = 1;

    if ($usuarioViejo === null) {
        $caller = new Caller();
        $caller->setScore(5);
        
        $user = new User();
        $user->setName($_POST['name'])->setSurname($_POST['surname'])->setEmail($_POST['email'])->setPhone($_POST['phone'])->setBirthdate($_POST['birthdate'])->setIdentifier_photo($identifier_photo)->setPassword($_POST['password']);
        
        $errores = Validator::validarRegister($user);
        if ($errores == null) {
            $caller_id = $db->guardarCaller($caller);
            $user->setCaller_id($caller_id);

            
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $db->guardarUsuario($user);
            $_SESSION['user'] = $user;
            redirect('bienvenido.php');
        }
    } else {

        $errores['email'] = 'El email ya está en uso.';
        echo "<pre>";
        var_dump($errores);
        exit;
    }
}
?>



<!-- <?php 


if(isset($errores) && count($errores) > 0): ?>
<div>

    <ul>
        <?php foreach ($errores as $value): ?>
            <li><?= $value ?></li>
        <?php endforeach; ?>
    </ul>

</div>

<?php endif;?>
 -->


    <main>
        <section id="homeCally">
            <h1>Ganá dinero</h1>
            <h2>Haciendo llamados con Cally!</h2>
            
            <section>
            
            
                <a href="#registerFormi">Quiero ser Caller</a>
                <a href="empresas.php">Cally empresas</a>
                
            </section>
        </section>
        <p id="registrate"></p>

       
        <section id="registerFormi">
            <h2>Quiero ser Caller</h2>
            
        <br>
            <h3>Registrate</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <label>Seleccioná tu ciudad</label>
                <select name="city">
                        <option value="buenos-aires">Buenos Aires</option>
                        <option value="cordoba">Cordoba</option>
                        <option value="rosario">Rosario</option>  
                    </select>
                    <input type="nombre" name="name" id="" placeholder="Nombre" value="<?= (isset($errores['name'])) ? '' : old('name') ?>">
                    <input type="apellido" name="surname" id="" placeholder="Apellido" value="<?= (isset($errores['surname'])) ? '' : old('surname') ?>">
                    <input type="email" name="email" id="" placeholder="E-mail" value="<?= (isset($errores['email'])) ? '' : old('email') ?>">
                    <input type="text" name="phone" id="" placeholder="Celular" value="<?= (isset($errores['phone'])) ? '' : old('phone') ?>">
                    <label class="date">Fecha de nacimiento</label>
                    <input id="date" type="date" name="birthdate" value="<?= (isset($errores['birthdate'])) ? '' : old('birthdate') ?>">
                    <p class="fotoDni">Adjuntar Selfie con foto de DNI ( Debe ser mayor de 18 años )</p><img src="selfie.png" alt="selfie">
                    <input type="file" name="fotoPerfil" accept="image/*" value="<?= (isset($errores['fotoPerfil'])) ? '' : old('fotoPerfil') ?>">

                    <input type="password" name="password" id="" placeholder="Contraseña" value="">
                <button type="submit">Registrarse</button>
            </form>
            <p id="queEsCally"></p>
            
            <p>Procediendo, acepto que Cally o sus representantes podrían contactarme por correo electrónico, teléfono o mensaje de texto (incluyendo sistema de llamadas diarias automáticas) a la dirección de correo o número telefónico que proveo, incluyendo propósitos comerciales.</p>
            
        </section>
        
        <section  class="queEsCally">
            <article >
                <h2>Qué es Cally?</h2>
                <p>Cally es una aplicación Desktop/Mobile que conecta empresas que quieran reducir costos estructurales y personas que quieran generar ingresos haciendo llamados a distintos clientes. Los llamados efectuados por los " Callers ", pueden ser para venta de productos, soporte técnico, encuestas, entre otras opciones. </p>
            </article>
            
            <section id="procesoSeleccion">
        </section>
            
        </section>
        
        
        <section  class="procesoSeleccion">
            <h2>Porqué ser Caller</h2>
            <section class="packLogosProceso">
                <article>
                    <img src="img/videollamada.png" alt="">
                    <h3>Entrevista online</h3>
                    <p>Aplicá a tu próximo trabajo. Programá una entrevista mediante videollamada para darte de alta en Cally. </p>
                </article>
                <article>
                    <img src="img/llamados.png" alt="">
                    <h3>Recibí llamadas</h3>
                    <p>Luego de ser aprobado, Cally pone a tu disposición miles de llamados para que puedas empezar a generar ingresos, sin horarios y desde cualquier parte.</p>
                </article>
                <article>
                    <img src="img/reputacion.png" alt="">
                    <h3>Reputación</h3>
                    <p>A medida que ganes experiencia, si tu reputación es positiva, vas a generar mas ganancias, por lo tanto, vas a recibir mejores ofertas de trabajo.</p>
                </article>
            </section>
            <section class="botonRegistro">
                <h2>¿Querés aumentar tus ingresos?</h2>
                <a href="#registrate">Registrate</a>
            </section>
            <p id="dondeEstamos"></p>
        </section>
            <section class="dondeEstamos">
                <h2>¿Dónde estamos?</h2>
                <section class="packBanderas">
                    <section class="banderaPais">
                        <p>Argentina</p>
                        <img alt="Bandera de Argentina" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/512px-Flag_of_Argentina.svg.png">
                    </section>
                    <section class="banderaPais">
                        <p>Chile</p>
                        <img alt="Bandera de Chile" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Flag_of_Chile.svg/512px-Flag_of_Chile.svg.png">
                    </section>
                    <section class="banderaPais">
                        <p>España</p>
                        <img alt="Bandera de España" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Spain.svg/512px-Flag_of_Spain.svg.png">
                    </section>
                </section>
            </section>
        </main>
    <?php require_once ('footer.php');?>
</body>
</html>