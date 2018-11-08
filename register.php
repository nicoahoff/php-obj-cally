<?php 
// Requerimos los archivos necesarios.
require_once 'helpers.php';


// Redirigimos en el caso de que estemos logueados para evitar el acceso a esta página.
if (check()) {
    redirect('bienvenido.php');
}

// En el caso de que recibamos datos por POST y un archivo, registramos al usuario.
if ($_POST && $_FILES) {
    // Primero nos fijamos que el usuario no exista en la base de datos, de no existir, nos devuelve null.
    $usuarioViejo = $db->traerUsuario($_POST['email']);

    // Si el usuario efectivamente no se encontró, se procede a crear el usuario.
    if ($usuarioViejo === null) {
        // Creamos el usuario con los datos de $_POST
        $usuario = new User($_POST['ciudad'],$_POST['name'], $_POST['lastname'], $_POST['email'], $_POST['phone'], $_POST['date'], $_POST['password']);
        $usuario->setFotoPerfil($db->guardarFoto($_FILES['fotoPerfil']));
        
        // Validamos los datos del usuario que creamos anteriormente
        $errores = Validator::validarRegister($usuario);
        
        // Si en la validación no hubo errores, hasheamos la contraseña del usuario, lo guardamos en base de datos (json), iniciamos la sesión del mismo y redirigimos hacia la páginas de bienvenido.
        if (count($errores) === 0) {
            $usuario->setPassword(password_hash($usuario->getPassword(), PASSWORD_DEFAULT));
            $db->guardarUsuario($usuario);
            $_SESSION['usuario'] = $usuario;
            redirect('bienvenido.php');
        }
    } else {

        // De haberse encontrado el usuario, devolvemos un error.
        $errores['email'] = 'El email ya está en uso.';
    }
}
?>

<?php require_once 'header.php'; ?>

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

<form action="" method="post" enctype="multipart/form-data">
    <label for="username">Nombre de Usuario</label>
    <input type="text" name="username" placeholder="username" value="<?= (isset($errores['username'])) ? '' : old('username') ?>">
    <label for="email">E-Mail</label>
    <input type="email" name="email" placeholder="email" value="<?= (isset($errores['email'])) ? '' : old('email') ?>">
    <label for="password">Contraseña</label>
    <input type="password" name="password" placeholder="password">
    <label for="file">Foto de Perfil</label>
    <input type="file" name="fotoPerfil">
    <button type="submit">Registrarme</button>
</form>


<?php require_once 'footer.php'; ?>