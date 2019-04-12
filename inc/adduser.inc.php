<?php
    include ('../view/USERTools.view.php');
    $usertools = new USERTools();

    $login = $_POST['login'];
    $password = sha1($_POST['psw']);
    $usertools->ajoutUser($login, $password);
    header('Location: ../index.php?EX=administration&switch=1');
    exit();
?>