<?php
//Récupération contenu fiche conseil pour modification

include ('../view/BDTools.view.php');
$index = intval($_GET['index']);
    try {
        $bdtools = new BDTools();
        $bdd = $bdtools->connect();
        $stmt = $bdd->prepare('SELECT contenuarticle FROM article WHERE idarticle = :index');
        $stmt->execute(array('index' => $index));
        $result = $stmt->fetch();
        echo utf8_encode($result[0]);

    } catch (PDOException $ex) {
        print"Erreur de connexion : " . $ex->getMessage() . "</br>";
        die();
    }

?>