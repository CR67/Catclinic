<?php
include ('../view/ARTTools.view.php');
$arttools = new ARTTools();
$index = $_POST['userselect1'];
$contenu = utf8_encode($_POST['resultat']);

$arttools->modifArticle($contenu, $index);
echo '<script>document.location.replace("http://localhost/Catclinic/index.php?EX=administration&switch=1")</script>';
exit();
?>
