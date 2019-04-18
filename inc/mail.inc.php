<?php
//Envoi mail demande client

if(isset($_POST['message'])){

    $nom = htmlentities($_POST['nom'], ENT_QUOTES);
    $prenom = htmlentities($_POST['prenom'], ENT_QUOTES);
    $mail = htmlentities($_POST['mail'], ENT_QUOTES);

    if(isset($_POST['souscrire'])) {
        try {
            $bdd = new PDO('mysql:host=localhost; dbname=catclinic', 'root', 'NCC1701a');
            $stmt1 = $bdd->prepare('SELECT adresse FROM mail WHERE adresse=:adresse');
            $stmt1->execute(array('adresse' => $mail));
            if ($stmt1->rowCount() != 0) {
                echo '<script>alert("Vous avez déjà souscrit à la newsletter!");</script>';
            } else {
                $stmt2 = $bdd->prepare('INSERT INTO mail (nom, prenom, adresse) VALUES (:nom, :prenom, :adresse)');
                $stmt2->execute(array('nom' => $nom, 'prenom' => $prenom, 'adresse' => $mail));
            }
        } catch (PDOException $ex) {
            print"Erreur de connexion : " . $ex->getMessage() . "</br>";
            die();
        }
    }

    $entete = 'MIME-version: 1.0'."\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8'."\r\n";
    $entete .= 'From: '.$_POST['mail']."\r\n";

    $contenu = '<h3>Message client CATCLINIC :</h3>
                <p>Nom : '.$_POST['nom'].'<br>
                Prénom : '.$_POST['prenom'].'<br>
                Sujet : '.$_POST['sujet'].'</p>
                <br>
                <p>'.$_POST['message'].'</p>';

    $test = '1';

    if($test){
        echo '<script>
                alert("Message envoyè !");
                document.location.replace("http://localhost/Catclinic/index.php?EX=accueil");
              </script>';
    }else{
        echo '<script>
                alert("Message non envoyé !");
                document.location.replace("http://localhost/Catclinic/index.php?EX=accueil"));
              </script>';
    }
}
?>