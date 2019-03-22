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

    function compterFiche () {
        try {
            $bdd = $this->connect();
            $stmt = $bdd->prepare('SELECT COUNT(*) FROM article WHERE pubarticle = "1" ');
            $stmt->execute();
            $nbrcol = intval($stmt->fetchColumn());
            return $nbrcol;
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

    function affichageTitres () {
        try {
            $result = "";
            $nbrcol = $this->compterFiche();
            $result = $result."<li class='tabs-title is-active'><a href='#".$this->affichRefArticle(0)."' aria-selected='true'>".$this->affichTitreArticle(0)."</a>";
            for ($i=0; $i<($nbrcol-1); $i++){
                $result = $result."<li class='tabs-title'><a href='#".$this->affichRefArticle($i+1)."'>".$this->affichTitreArticle($i+1)."</a>";
            }
            return $result;
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

    function affichageFiches () {
        try {
            $result = "";
            $nbrcol = $this->compterFiche();
            $result = $result."<div class='tabs-panel is-active' id='".$this->affichRefArticle(0)."'>".$this->affichContArticle(0)."</div>";
            for ($i=0; $i<($nbrcol-1); $i++){
                $result = $result."<div class='tabs-panel' id='".$this->affichRefArticle($i+1)."'>".$this->affichContArticle($i+1)."</div>";
            }
            return $result;
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