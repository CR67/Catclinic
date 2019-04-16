<?php

include ('BDTools.view.php');

class USERTools
{
    public function __construct(){}

    public function __destruct(){}

/*Ajouter un utilisateur (réservé à root)*/
    public function ajoutUser($login, $password) {
        try {
            $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('INSERT INTO users (login, password) VALUES (:login, :password)');
            if($stmt->execute(array('login' => $login, 'password' => $password))) {
                $result = '<script>alert("Ajout effectué.")</script>';
                echo $result;
            }else{
                $result = '<script>alert("Erreur. Ajout annulé.")</script>';
                echo $result;
            }
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Supprimer un utilisateur (réservé à root)*/
    public function suppUser($idusers) {
        try {
            $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('DELETE FROM users WHERE idusers = :idusers');
            if($stmt->execute(array('idusers' => $idusers))) {
                $result = '<script>alert("Suppression effectué.")</script>';
                echo $result;
            }else{
                $result = '<script>alert("Erreur. Suppression annulé.")</script>';
                echo $result;
            }
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Connexion Utilisateur*/
    public function selectUser($login, $password) {
        try {
            $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('SELECT login, password FROM users WHERE login = :login');
            $stmt->execute(array('login' => $login));
            $data = $stmt->fetch();
            if ($data['password'] == $password) {
                return $return = $data['login'];
            }else{
                return $return = 'false';
            }
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Réinitialiser le mot de passe d'un utilisateur (réservé à root)*/
    public function resetPass($idusers, $password) {
        try {
            $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('UPDATE users SET password = :password WHERE idusers = :idusers');
            if($stmt->execute(array('password' => sha1($password), 'idusers' => $idusers))) {
                $result = '<script>alert("Réinitialisation effectuée.")</script>';
                echo $result;
            }else{
                $result = '<script>alert("Erreur. Réinitialisation annulée.")</script>';
                echo $result;
            }
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Changement du Mot de Passe*/
    public function renewPass($login, $oldpass, $newpass) {
        try {
            $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('SELECT login, password FROM users WHERE login = :login');
            $stmt->execute(array('login' => $login));
            $data = $stmt->fetch();
            if ($data['password'] === sha1($oldpass)) {
                $stmt = $bdd->prepare('UPDATE users SET password = :newpass WHERE login = :login');
                if($stmt->execute(array('newpass' => sha1($newpass), 'login' => $login))) {
                    $result = '<script>alert("Changement effectué.")</script>';
                    echo $result;
                }else{
                    $result = '<script>alert("Erreur. Changement annulé.")</script>';
                    echo $result;
                }
            }else{
                $result = '<script>alert("Erreur de Mot de Passe.")</script>';
                echo $result;
            }
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

}