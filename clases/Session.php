<?php
class Session {
    
    public function __construct() {
        session_start();
    }
    
    public function crearSesion(User $usuario) {
        
        $_SESSION['user'] = $usuario;
        

        if (isset($_POST['recordar'])) {

            $time = time() + 3600 * 24 * 7;
            setcookie("user", json_encode($usuario), $time);         
            setcookie("email", $usuario->getEmail(), $time);

        } else {
            setcookie("email", null, time()-1);
        }
        
    }
    
    public function cerrarSesion() {
        
        session_destroy();

        setcookie('user', null, time()-1);
    }
    
    public function leerCookie($campo) {
        
        if (isset($_COOKIE[$campo])) {
            
            if (json_decode($_COOKIE[$campo]) !== NULL) {
                
                return json_decode($_COOKIE[$campo], true);
            }
            
            return $_COOKIE[$campo];
        }
        
        return false;
    }
    
    public function mantenerSesion() {

        if (isset($_COOKIE['user']) && !isset($_SESSION['user'])) {
            
            $_SESSION['user'] = leerCookie('user');
            
            setcookie('user', $_COOKIE['user'], time()+3600*24*7);
        }
    }
}

?>