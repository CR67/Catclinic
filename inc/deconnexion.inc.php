<?php

    session_start();
    session_unset();
    session_destroy();
    echo '<script>document.location.replace("http://localhost/Catclinic/index.php")</script>';
    exit();

?>
