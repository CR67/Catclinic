<?php
    include ('../view/USERTools.view.php');
    $usertools = new USERTools();

    $idusers = $_POST['userselect2'];
    $usertools->resetPass($idusers, 'defautpass');
    echo '<script>document.location.replace("http://localhost/Catclinic/index.php?EX=administration&switch=1")</script>';
    exit();
?>