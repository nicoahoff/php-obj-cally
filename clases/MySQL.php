<?php

class MySQL extends Database {

    private $db;

    public function __construct() {
        $dsn =
            'mysql:host=localhost;dbname=cally;port=3306';
            $db_user = 'root';
            $db_pass = '';
            $opt = [ PDO::ATTR_ERRMODE
            => PDO::ERRMODE_EXCEPTION ];
        try {
            $this->db = new PDO($dsn, $db_user, $db_pass, $opt);
        }
        catch( PDOException $Exception ) {

        }
    }

    public function guardarUsuario(User $user) {
        $query = $this->db->prepare("INSERT INTO `users` (`name`, `surname`, `email`, `password`, `phone`, `birthdate`, `identifier_photo`, `created_at`,`caller_id`) VALUES ('".$user->getName()."', '".$user->getSurname()."', '".$user->getEmail()."', '".$user->getPassword()."', '".$user->getPhone()."', '".$user->getBirthdate()."', '".$user->getIdentifier_photo()."', NOW(), :caller_id)");
        $query->bindValue(':caller_id', $user->getCaller_id());
        $query->execute();
    }
    public function traerUsuario(String $email) {
        $query = $this->db->query("SELECT * FROM users WHERE email='$email'");

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($result != null) {
            $user = new User();
            $user
            ->setId($result[0]['id'])
            ->setName($result[0]['name'])
            ->setSurname($result[0]['surname'])
            ->setEmail($result[0]['email'])
            ->setPassword($result[0]['password'])
            ->setPhone($result[0]['phone'])
            ->setBirthdate($result[0]['birthdate'])
            ->setIdentifier_photo($result[0]['identifier_photo']);


            
            return $user;
        }

        return null;
    }
    public function traerUsuarios() {
        
    }

    public function migrate() {
        $query = "
        CREATE TABLE IF NOT EXISTS `users` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `name` varchar(16) NOT NULL,
            `lastName` varchar(16) NOT NULL,
            `username` varchar(26) NOT NULL,
            `email` varchar(100) NOT NULL,
            `date` date NOT NULL,
            `password` varchar(64) NOT NULL,
            `comfirmPassword` varchar(64) DEFAULT NULL,
            `profilePic` varchar(60) DEFAULT NULL
        )";

        $stmt = $this->pdo->prepare($query);
        $tableCreated = $stmt->execute();

        if ($tableCreated) {
            echo 'Tabla usuarios creada correctamente.<br><br>';
            sleep(0.2);
            $json = new JSON();
            $users = $json->traerUsuario();

            $count = 0;
            $exist = 0;

            foreach ($users as $user) {
                echo ' - Creando nuevo usuario...<br>';
                if ($this->traerUsuario($user->getEmail()) !== null) {
                    $cout++;
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    $stmt = $this->pdo->prepare('INSERT INTO users (name, lastName, username, email, date, password, comfirmPassword, profilePic) 
                    VALUES (:name, :lastName, :username, :email, :date, :password, :comfirmPassword, :profilePic)');
                    $stmt->bindValue(':name', $user->getName());
                    $stmt->bindValue(':lastName', $user->getLastName());
                    $stmt->bindValue(':username', $user->getUsername());
                    $stmt->bindValue(':email', $user->getEmail());
                    $stmt->bindValue(':date', $user->getDate());
                    $stmt->bindValue(':password', ($user->getPassword() == null) ? '' : $user->getPassword());
                    $stmt->bindValue(':comfirmPassword', ($user->getComfirmPassword() == null) ? '' : $user->getComfirmPassword());
                    $stmt->bindValue(':profilePic', $user->getFotoPerfil());
                    $userCreated = $stmt->execute();
                    if ($userCreated) {
                        echo 'Usuario ' . $user->getEmail() . ' creado correctamente.<br>';
                    }
                } else {
                    $exist++;
                    echo 'Ya hay un usuario creado con ese mail.<br>';
                }
            }

            echo "<br>Se crearon $count usuarios correctamente";
            echo "<br> $exist usuarios ya existian";
        } else {
           echo 'Hubo un error al crear la tabla usuarios';
        }


    }



    public function guardarCaller(Caller $caller){

        $query = $this->db->prepare("INSERT INTO `callers`(`last_checkout`, `score`) VALUES (DEFAULT, :score)");
        $query->bindValue(":score", $caller->getScore());
        $query->execute();
        return $this->db->lastInsertId();



    }

}

?>