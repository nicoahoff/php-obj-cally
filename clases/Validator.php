<?php
abstract class Validator {
    
    public static function validarRegister (User $usuario)
    {
        $errores = [];

        if (empty($usuario->getName())) {
            $errores['name'] = 'El nombre está vacío.';
            
            $errores['name'] = 'El nombre debe tener 15 caracteres o menos.';
        


        if (empty($usuario->getSurname())) {
            $errores['surname'] = 'El apellido está vacío.';
            
        } elseif (strlen($usuario->getSurname()) < 4) {
            $errores['surname'] = 'El apellido debe tener 8 caracteres o más.';
            
        } elseif (strlen($usuario->getSurname()) > 15) {
            $errores['surname'] = 'El apellido debe tener 15 caracteres o menos.';
        }
        
        
        if (empty($usuario->getEmail())) {
            $errores['email'] = 'El email está vacío.';
              
        } elseif (!filter_var($usuario->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = 'El email no es correcto';
        }

        if (empty($usuario->getPhone())) {
            $errores['phone'] = 'El teléfono está vacío.';
            
        } elseif (strlen($usuario->getPhone()) < 4) {
            $errores['phone'] = 'El teléfono debe tener 8 caracteres o más.';
            
        }



        if (empty($usuario->getBirthdate())) {
            $errores['date'] = 'Debes completar tu fecha de nacimiento';
             
        }


        if (!self::validarFoto($_FILES['fotoPerfil'])) {
            $errores['fotoPerfil'] = 'Hubo un error al subir la foto.';
        }




        if (empty($usuario->getPassword())) {
            $errores['password'] = 'El password está vacío.';
 
        } elseif (strlen($usuario->getPassword()) < 8) {
            $errores['password'] = 'El password debe tener 8 caracteres o más.';

        } elseif (strlen($usuario->getPassword()) >= 16) {
            var_dump(strlen($usuario->getPassword()));exit;
            $errores['password'] = 'El password debe tener 15 caracteres o menos.';
        }
        
       
       
        
        return $errores;
    }
}
    
    
    public static function validarFoto (Array $foto)
    {
        if ($foto["error"] !== UPLOAD_ERR_OK) {
            return false; 
        }
        return true;
    }
    
    static function validarLogin(Database $db, String $email, String $password)
    {
        $usuario = $db->traerUsuario($email);
        
        if ($usuario !== null) {
            return password_verify($password, $usuario->getPassword());
        }
        
        return false;
    }
}

?>