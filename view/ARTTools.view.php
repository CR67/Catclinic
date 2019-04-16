<?php

include ('BDTools.view.php');

class ARTTools
{

    public function __construct(){
    }

    public function __destruct(){
    }

/*Ajouter un article*/
    public function ajoutArticle($titre, $contenu, $reference) {
        try {
           $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $date = date("Y-m-d H:i:s");
            $stmt = $bdd->prepare('INSERT INTO article (titrearticle, contenuarticle, refarticle, datearticle) VALUES (:titrearticle, :contenuarticle, :refarticle, :datearticle)');
            if($stmt->execute(array('titrearticle' => $titre, 'contenuarticle' => $contenu, 'refarticle' => $reference, 'datearticle' => $date ))) {
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

/*Supprimer un article*/
    public function suppArticle($idarticle) {
        try {
            $bdtools = new BDTools();
             $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('DELETE FROM article WHERE idarticle = :idarticle');
            if($stmt->execute(array('idarticle' => $idarticle))) {
                $result = '<script>alert("Suppression effectuée.")</script>';
                echo $result;
            }else{
                $result = '<script>alert("Erreur. Suppression annulée.")</script>';
                echo $result;
            }
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Modifier le contenu d'un article avec mise à jour de la date*/
    public function modifArticle($contenu) {
        try {
            $bdtools = new BDTools();
             $bdd = $bdtools->connect();
            $date = date("Y-m-d H:i:s");
            $stmt = $bdd->prepare('UPDATE article SET contenuarticle = :contenuarticle, datearticle = :datearticle');
            if($stmt->execute(array('contenuarticle' => $contenu, 'datearticle' => $date))) {
                $result = '<script>alert("Modification effectuée.")</script>';
                echo $result;
            }else{
                $result = '<script>alert("Erreur. Modification annulée.")</script>';
                echo $result;
            }
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Compter le nombre d'article en BD*/
    function compterFiche () {
        try {
            $bdtools = new BDTools();
             $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('SELECT COUNT(*) FROM article');
            $stmt->execute();
            $nbrcol = intval($stmt->fetchColumn());
            return $nbrcol;
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Afficher titre de l'article*/
    function affichageTitres () {
        try {
            $result = "";
            $nbrcol = $this->compterFiche();
            $result = $result."<li class='tabs-title first is-active'><a href='#".$this->affichRefArticle(0)."' aria-selected='true'>".$this->affichTitreArticle(0)."</a>";
            for ($i=0; $i<($nbrcol-2); $i++){
                $result = $result."<li class='tabs-title'><a href='#".$this->affichRefArticle($i+1)."'>".$this->affichTitreArticle($i+1)."</a>";
            }
            $result = $result."<li class='tabs-title last'><a href='#".$this->affichRefArticle($nbrcol-1)."' aria-selected='true'>".$this->affichTitreArticle($nbrcol-1)."</a>";
            return $result;
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Afficher l'article*/
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

/*Récupérer contenu de l'article*/
    public function affichContArticle($index) {
        try {
            $bdtools = new BDTools();
             $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('SELECT contenuarticle FROM article');
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result[$index][0];
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Récupérer titre de l'article*/
    public function affichTitreArticle($index) {
        try {
            $bdtools = new BDTools();
             $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('SELECT titrearticle FROM article');
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result[$index][0];
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Récupérer référence de l'article (pour constitution id)*/
    public function affichRefArticle($index) {
        try {
            $bdtools = new BDTools();
             $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('SELECT refarticle FROM article');
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result[$index][0];
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }
}