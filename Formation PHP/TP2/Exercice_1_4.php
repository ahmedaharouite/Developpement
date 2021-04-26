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
			echo "<strong><h3>Avant tri...</strong></h3><br>";
			
			$tab = array ("Magic basket" => ["John Schultz", "USA", 2003],
						  "Coach Carter" => ["Thomas Carter", "USA", 2005],
						  "Le pianiste" => ["Roman Polanski", "France", 2002]);
			print_r($tab);
			
			
			echo "<br><br><strong><h3>Apres tri...</strong></h3>";
			asort($tab);
			print_r($tab);
			
			
			$nom = array_rand($tab, 1);
			echo "<br><br><h3><strong>Tirage au sort du nom du film : </strong>$nom</h3>";
			
			
			echo "<br><br><strong><h3>Avant le mélange...</strong></h3><br>";
			$tab = array ("afrique", "amerique", "asie", "europe", "oceanie");
			print_r($tab);	
			
			echo "<br><br><strong><h3>Après le mélange...</strong></h3><br>";
			shuffle($tab);
			print_r($tab);
			
			echo "<br><br><strong><h3>Après un autre mélange...</strong></h3><br>";
			shuffle($tab);
			print_r($tab);
			
			echo "<br><br>";
			
		?></pre>
            </div>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>