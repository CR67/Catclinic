<?php

spl_autoload_register(function ($class) {
    require_once('view/'.$class.'.view.php');
})

?>