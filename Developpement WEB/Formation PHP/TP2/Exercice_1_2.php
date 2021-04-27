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
            <pre><?php
			$tab =  array ("Man of steal" => ['realisatur' => "Zac Synder", 'pays' => "USA", 'annee' => 2013],
						  "Ecrire pour exister" => ['realisatur' => "Richard Lagravenese", 'pays' => "USA", 'annee' => 2007],
						  "À la recherche du bonheur" => ['realisatur' => "Gabriele Muccino", 'pays' => "USA", 'annee' => 2007]);
			print_r($tab);	
			?>
            </div></pre>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>