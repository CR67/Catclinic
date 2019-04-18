<?php
//Ajout utilisateur

    include ('../view/USERTools.view.php');
    $usertools = new USERTools();

    $login = $_POST['login'];
    $password = sha1($_POST['psw']);
    $usertools->ajoutUser($login, $password);
    echo '<script>document.location.replace("http://localhost/Catclinic/index.php?EX=administration&switch=1")</script>';
    exit();
?>