<?php

class BDTools
{
    public function __construct(){}

    public function __destruct(){}

    public function connect(){
        $bdd = new PDO('mysql:host=localhost; dbname=catclinic', 'root', 'NCC1701a', array(PDO::ATTR_PERSISTENT => true));
        return $bdd;
    }

    public function ajoutArticle() {
        try {
            $bdd = $this->connect();
            $stmt = $bdd->prepare('INSERT INTO article (titrearticle, contenuarticle, pubarticle, datearticle) VALUES (:titreartcle, :contenuarticle, :pubarticle, :datearticle)');
            $stmt->execute(array('titrearticle' => $titre, 'contenuarticle' => $contenu, 'pubarticle' => $publie, 'datearticle' =>  DateTime()));
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

    public function modifArticle() {
        try {
            $bdd = $this->connect();
            $stmt = $bdd->prepare('UPDATE article SET contenuarticle = :contenuarticle, datearticle = :datearticle');
            $stmt->execute(array('contenuarticle' => $contenu, 'datearticle' => DateTime()));
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

    public function suppArticle() {
        try {
            $bdd = $this->connect();
            $stmt = $bdd->prepare('DELETE FROM article WHERE titrearticle = :titrearticle');
            $stmt->execute(array('titrearticle' => $titre));
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

    public function affichContArticle($index) {
        try {
            $bdd = $this->connect();
            $stmt = $bdd->prepare('SELECT contenuarticle FROM article WHERE pubarticle = "1" ');
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result[$index][0];
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

    public function affichTitreArticle($index) {
        try {
            $bdd = $this->connect();
            $stmt = $bdd->prepare('SELECT titrearticle FROM article WHERE pubarticle = "1"');
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result[$index][0];
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

    public function affichRefArticle($index) {
        try {
            $bdd = $this->connect();
            $stmt = $bdd->prepare('SELECT refarticle FROM article WHERE pubarticle = "1"');
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result[$index][0];
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }
}