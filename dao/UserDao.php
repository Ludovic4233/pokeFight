<?php
require_once('database.php');

class UserDao {
    private $db_connect;

    public function insert($data){

        //$this->db_connect = connectToDB();
        //var_dump($this->db_connect);
        // var_dump($data);

        $this->db_connect = connectToDB();

        $pseudo = $data['pseudo'];
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        //hacher le mot de passe
        $mdp = $data['password'];
        $password = hash("sha256", $mdp);

        $sth = $this->db_connect->prepare("
                    INSERT INTO user(pseudo,firstname,lastname,password)
                    VALUES (:pseudo, :firstname, :lastname, :password)
                ");
        try{
            $sth->execute(array(
                ':pseudo' => $pseudo,
                ':firstname' => $firstname,
                ':lastname' => $lastname,
                ':password' => $password
            ));
            $_SESSION['pseudo'] = $pseudo;
            return TRUE;
        }
        catch(PDOException $e){
            echo "Erreur: ". $e->getMessage();
        }
    }

    public function verify($data)
    {

        $dbConnexion = connectToDB();
        $pseudo = $data['pseudo'];

        $sth = $dbConnexion->prepare("
        SELECT pseudo,password,id_user
        FROM `user`
        WHERE pseudo = :pseudo
    ");
        $sth->execute(
            array(
                ':pseudo' => $pseudo
            )
        );
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        if ($result == FALSE) {
                
            return TRUE;
        
        } 
    }


    public function connect($data){
        $this->db_connect = connectToDB();
        $pseudo = $data['pseudo'];
        $mdp = $data['password'];
        $password = hash("sha256", $mdp);

        $sth = $this->db_connect->prepare("SELECT * FROM `user` WHERE pseudo = :pseudo AND password = :password;");

        try{
            $sth->execute(array(
                ':pseudo' => $pseudo,
                ':password' => $password
            ));
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            echo"<pre>";
            //var_dump($result);
            //vérification des informations d'authentification de l'utilisateur
           if ($result != FALSE){
               if ($result['password'] == $password && $result['pseudo'] == $pseudo) {
                   $_SESSION['pseudo'] = $pseudo;
                   $_SESSION['id'] = $result['id_user'];
                   return TRUE;
               } 
            //    else {
            //        ;
            //    }
            }
           
        }
        catch(PDOException $e){
            echo "Erreur: ". $e->getMessage();
        }
    }
}