<?php


class ARTTools
{

    public function __construct(){
    }

    public function __destruct(){
    }

/*Ajouter un article, sauvegarde en BD avec ou sans publication (variable $publie à 1 ou 0)*/
    public function ajoutArticle($titre, $contenu, $publie) {
        try {
           $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('INSERT INTO article (titrearticle, contenuarticle, pubarticle, datearticle) VALUES (:titreartcle, :contenuarticle, :pubarticle, :datearticle)');
            $stmt->execute(array('titrearticle' => $titre, 'contenuarticle' => $contenu, 'pubarticle' => $publie, 'datearticle' =>  DateTime()));
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

/*Supprimer définitive d'un article*/
    public function suppArticle($idarticle) {
        try {
            $bdtools = new BDTools();
             $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('DELETE FROM article WHERE idarticle = :idarticle');
            $stmt->execute(array('idarticle' => $idarticle));
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
            $stmt = $bdd->prepare('UPDATE article SET contenuarticle = :contenuarticle, datearticle = :datearticle');
            $stmt->execute(array('contenuarticle' => $contenu, 'datearticle' => DateTime()));
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
            $stmt = $bdd->prepare('SELECT COUNT(*) FROM article WHERE pubarticle = "1" ');
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
            $bdtools = new BDTools();
             $bdd = $bdtools->connect();
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
            $bdtools = new BDTools();
             $bdd = $bdtools->connect();
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
            $bdtools = new BDTools();
             $bdd = $bdtools->connect();
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