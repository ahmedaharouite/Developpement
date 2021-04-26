<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="include/bootstrap.min.css">
    <link rel="stylesheet" href="include/styles.css">
	<title>Mon site PWS en PHP!</title>
</head>
<body>
	<?php include("./include/header.php"); ?>

    <?php include("./include/menus.php"); ?>
    <div style="padding-top: 30px" id="main">
        <div style="text-align: center" class="col-md-12">
		ici on utilise la balise <strong>pre</strong> de HTML et la fonction <strong>print_r()</strong> de PHP </br></br>
		<pre><?php
			$tab = array ("Magic basket" => ["John Schultz", "USA", 2003],
						  "Coach Carter" => ["Thomas Carter", "USA", 2005],
						  "Le pianiste" => ["Roman Polanski", "France", 2002]);
			print_r($tab);
		?></pre>		
            </div>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>