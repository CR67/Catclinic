<?php
    include ('../view/ARTTools.view.php');
    $arttools = new ARTTools();

    $titre = $_POST['titre'];
    $contenu = utf8_encode($_POST['resultat']);
    $reference = $_POST['reference'];
    $arttools->ajoutArticle($titre, $contenu, $reference);
    echo '<script>document.location.replace("http://localhost/Catclinic/index.php?EX=administration&switch=1")</script>';
    exit();
?>