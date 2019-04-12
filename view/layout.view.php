<?php

global $content;

$vheader = new VHeader();
$vcontent = new $content['class']();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js" lang="fr">
<head>
	<meta charset="utf-8" />
	<title><?= $content['title'] ?></title>
    <link rel="stylesheet" type="text/css" href="css/foundationorigin.css" />
    <link rel="stylesheet" type="text/css" href="css/editeur.css" />
    <!--<link rel="stylesheet" type="text/css" href="css/app.css" />-->
</head>

	<body>

	<header class="grid-container">
		<?php $vheader->showHeader() ?>
	</header>

	<div id="content">
		<?php $vcontent->{$content['method']}($content['arg']) ?>
	</div><!-- id="content" -->

		<script src="js/ajax.js"></script>
        <script src="js/editeur.js"></script>
        <!--<script src="js/activation.js"></script>-->
        <script src="js/compteur.js"></script>
		<!--<script src="js/init.js"></script>-->
        <script src="js/jquery.js"></script>
        <script src="js/foundation.js"></script>
        <script>
            $('#example-tabs').foundation();
            $('#radiographie-dropdown').foundation();
            $('#echographie-dropdown').foundation();
            $('#sang-dropdown').foundation();
            $('#cytologie-dropdown').foundation();
            $('#dentisterie-dropdown').foundation();
            $('#chirurgie-dropdown').foundation();
            $('#hospitalisation-dropdown').foundation();
            $('#garde-dropdown').foundation();
            $('#remain-dropdown').foundation();
            $('#burlotte-dropdown').foundation();
            $('#abeauvaux-dropdown').foundation();
        </script>
	</body>
</html>
