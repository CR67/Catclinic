<?php
//Suppression utilisateur

    include ('../view/USERTools.view.php');
    $usertools = new USERTools();

    $idusers = $_POST['userselect1'];
    $usertools->suppUser($idusers);
    echo '<script>document.location.replace("http://localhost/Catclinic/index.php?EX=administration&switch=1")</script>';
    exit();
?>