<?php
//Suppression fiche conseil

    include ('../view/ARTTools.view.php');
    $arttools = new ARTTools();

    $idarticle = $_POST['artselect2'];
    $arttools->suppArticle($idarticle);
    echo '<script>document.location.replace("http://localhost/Catclinic/index.php?EX=administration&switch=1")</script>';
    exit();
?>