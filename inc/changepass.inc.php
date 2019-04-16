<?php
    session_start();
    include ('../view/USERTools.view.php');
    $usertools = new USERTools();

    $login = $_SESSION['login'];
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $usertools->renewPass($login, $oldpass, $newpass);
    echo '<script>document.location.replace("http://localhost/Catclinic/index.php?EX=administration&switch=1")</script>';
    exit();
?>