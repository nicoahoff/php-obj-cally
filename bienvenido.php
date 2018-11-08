<?php 
require_once 'helpers.php';

$session->mantenerSesion();

if (guest()) {
    redirect('login.php');
}

require_once 'head.php'; 
require_once 'header.php'; 
?>

<section class="bienvenido-usuario">
    <h1>Bienvenido <?= user()->getName() ?></h1>
    <br>
    <p><?= user()->getEmail()?></p>
    <p><?= user()->getPhone()?></p>
</section>
<br>





<?php require_once 'footer.php'; ?>