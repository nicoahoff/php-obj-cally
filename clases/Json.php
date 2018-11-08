<?php

class Json extends Database {
    
    public $archivo;

    public function __construct(String $archivo) {
        $this->archivo = $archivo;
    }
    public function guardarUsuario(User $usuario)
    {

        $user = [
            "ciudad" => $usuario->getCiudad(),
            "name" => $usuario->getName(),
            "lastname" => $usuario->getLastName(),
            "email" => $usuario->getEmail(),
            "phone" => $usuario->getPhone(),
            "date" => $usuario->getDate(),
            "fotoPerfil" => $usuario->getFotoPerfil(),
            "password" => $usuario->getPassword()
            
        ];

        $usuarioJson = json_encode($user);

        file_put_contents($this->archivo, $usuarioJson . PHP_EOL, FILE_APPEND);
    }
    
    public function traerUsuarios()
    {
        $arrayUsuarios = [];

        $archivo = fopen($this->archivo, 'r');

        while(($linea = fgets($archivo)) !== false) {
            $usuario = json_decode($linea, true);
            $arrayUsuarios[] = new User($usuario['ciudad'],$usuario['name'],$usuario['lastname'], $usuario['email'], $usuario['phone'], $usuario['date'], $usuario['fotoPerfil'], $usuario['password']);
        }
        

        fclose($archivo);
        
        return $arrayUsuarios;
    }
    
    public function traerUsuario($email)
    {
        $usuario = null;
        
        $archivo = fopen($this->archivo, 'r');
        
        while(($linea = fgets($archivo)) !== false) {
            $usuarioActual = json_decode($linea, true);
            
            if ($usuarioActual['email'] === $email) {
                $usuario = $usuarioActual;
                break;
            }
        }
        
        fclose($archivo);
        
        if ($usuario !== null) {
            return new User($usuario['ciudad'],$usuario['name'],$usuario['lastname'], $usuario['email'], $usuario['phone'], $usuario['date'], $usuario['fotoPerfil'],$usuario['password']);
        }
        return $usuario;
    }    
}


?>