
<?php
if(isset($_POST['message'])){
    $entete = 'MIME-version: 1.0'."\r\n";
    $entete .= 'Content-type: text/html; charset=utf-8'."\r\n";
    $entete .= 'From: '.$_POST['mail']."\r\n";

    $contenu = '<h3>Message client CATCLINIC :</h3>
                <p>Nom : '.$_POST['nom'].'<br>
                Prénom : '.$_POST['prenom'].'<br>
                Sujet : '.$_POST['sujet'].'</p>
                <br>
                <p>'.$_POST['message'].'</p>';

    $test = mail('romey.christophe@orange', $_POST['sujet'], $contenu, $entete);

    if($test){
        echo '<script>alert('.'Message envoyè !'.');</script>';
    }else{
        echo '<script>alert('.'Message non envoyé !'.');</script>';
    }
}
?>