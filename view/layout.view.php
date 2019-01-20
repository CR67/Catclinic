<?php

global $content;

// Instanciation des class
$vheader = new VHeader();
$vcontent = new $content['class']();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
	<meta charset="utf-8" />
	<title><?= $content['title'] ?></title>
	<link rel="stylesheet" type="text/css" href="../css/app.css" />
</head>

	<body>

	<header>
		<?php $vheader->showHeader() ?>
	</header>

	<div id="content">
		<?php $vcontent->{$content['method']}($content['arg']) ?>
	</div><!-- id="content" -->

		<script src="../js/loader.js"></script>
		<script src="../js/ajax.js"></script>
		<script src="../js/init.js"></script>
		<script src="../js/app.js"></script>
		<script>
		    $(document).foundation();
		</script>

	</body>
</html>
