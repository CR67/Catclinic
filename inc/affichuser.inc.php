<?php
    include ('./view/BDTools.view.php');

    function affichselect()
    {
        try {
            $bdtools = new BDTools();
            $bdd = $bdtools->connect();
            $stmt = $bdd->prepare('SELECT idusers, login FROM users');
            $stmt->execute();

            $select = "";

            while ($data = $stmt->fetch()) {
                $select = $select . ("<option value='" . $data['idusers'] . "'>" . $data['login'] . "</option>");
            }

            return $select;

        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

?>
