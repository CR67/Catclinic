<?php
    include ('../view/USERTools.view.php');
    $usertools = new USERTools();

    $idusers = $_POST['userselect2'];
    $usertools->resetPass($idusers, 'defautpass');
    header('Location: ../index.php?EX=administration&switch=1');
    exit();
?>