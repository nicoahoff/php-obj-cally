<?php
require_once 'autoloader.php';

$session = new Session();
$db = new MySQL();

function dd(...$param)
{
    echo "<pre>";
    die(var_dump($param));
}

function old ($campo)
{
    if (isset($_POST[$campo])) {
        return $_POST[$campo];
    }
}

function redirect ($url)
{
    header('Location: ' . $url);exit;
}

function check()
{
    return isset($_SESSION['user']);
}

function guest()
{
    return !check();
}

function user()
{
    if (check()) {
        return $_SESSION['user'];
    } else {
        return false;
    }
}
?>