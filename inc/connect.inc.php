<?php
    include ('../view/USERTools.view.php');
    $usertools = new USERTools();

    if(empty($_POST['identifiant']) || empty($_POST['motdepasse'])) {
        echo '<script>alert("Champs vides !")</script>';
        header('Location: ../index.php?EX=administration&switch=false');
        exit();
    }else{
        $login = $_POST['identifiant'];
        $password = sha1($_POST['motdepasse']);
        header('Location: ../index.php?EX=administration&switch='.$usertools->selectUser($login, $password));
        exit();
    }



?>
