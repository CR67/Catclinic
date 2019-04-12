<?php
    include ('../view/USERTools.view.php');
    $usertools = new USERTools();

    $idusers = $_POST['userselect1'];
    $usertools->suppUser($idusers);
    header('Location: ../index.php?EX=administration&switch=1');
    exit();
?>