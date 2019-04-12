<?php

include ('BDTools.view.php');

class USERTools
{
    public function __construct(){}

    public function __destruct(){}

    public function ajoutUser($login, $password) {
        try {
            $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('INSERT INTO users (login, password) VALUES (:login, :password)');
            $stmt->execute(array('login' => $login, 'password' => $password));
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

    public function suppUser($idusers) {
        try {
            $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('DELETE FROM users WHERE idusers = :idusers');
            $stmt->execute(array('idusers' => $idusers));
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

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

    public function resetPass($idusers, $password) {
        try {
            $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('UPDATE users SET password = :password WHERE idusers = :idusers');
            $stmt->execute(array('password' => sha1($password), 'idusers' => $idusers));
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

}