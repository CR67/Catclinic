<?php
include ('./view/BDTools.view.php');

function artselect()
{
    try {
        $bdtools = new BDTools();
        $bdd = $bdtools->connect();
        $stmt = $bdd->prepare('SELECT idarticle, titrearticle FROM article');
        $stmt->execute();

        $select = "";

        while ($data = $stmt->fetch()) {
            $select = $select . ("<option value='" . $data['idarticle'] . "'>" . utf8_encode($data['titrearticle']) . "</option>");
        }

        return $select;

    } catch (PDOException $ex) {
        print"Erreur de connexion : " . $ex->getMessage() . "</br>";
        die();
    }
}

?>