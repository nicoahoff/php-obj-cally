<?php 
    require_once 'helpers.php';

    if (check()) {
        redirect('bienvenido.php');
    }

    
    if ($_POST) {
        $verifica = Validator::validarLogin($db, $_POST['email'], $_POST['password']);

        if ($verifica) {
            $usuario = $db->traerUsuario($_POST['email']);
            
            $session->crearSesion($usuario);

            redirect('bienvenido.php');
        } else {
            $errores['email'] = "Usuario o contraseña incorrecto";
        }
    }
    require_once 'head.php';
    require_once 'header.php';
?>

<?php
if(isset($errores) && count($errores) > 0): ?>
<div>
    <ul>
        <?php foreach ($errores as $value): ?>
            <li><?= $value ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
<br><br><br>
<section id="formLogin">
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="email" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '' &&  (isset($errores['email'])) ? '' : old('email') ?> "> 
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="password">
        <label for="recordar">Recordarme</label>
        <input type="checkbox" name="recordar" id="recordar">
        <button type="submit" class="regIndex">Loguearse</button>
    </form>
</section>
<br>
<br>
<br>

<?php require_once 'footer.php'; ?>

