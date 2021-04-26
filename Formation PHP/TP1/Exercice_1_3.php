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
			$tab = array ("Magic basket" => ["John Schultz", "USA", 2003],
						  "Coach Carter" => ["Thomas Carter", "USA", 2005],
						  "Le pianiste" => ["Roman Polanski", "France", 2002]);
			foreach($tab as $cle => $val){
				echo "<strong>Elément $cle :</strong><br>";	
				foreach($val as $val2 => $val3){
					echo "elément $val2 : $val3 <br>";	
				}
			}
			
			echo "<br>";
			
			$tab =  array ("Man of steal" => ['realisatur' => "Zac Synder", 'pays' => "USA", 'annee' => 2013],
						  "Ecrire pour exister" => ['realisatur' => "Richard Lagravenese", 'pays' => "USA", 'annee' => 2007],
						  "À la recherche du bonheur" => ['realisatur' => "Gabriele Muccino", 'pays' => "USA", 'annee' => 2007]);
						  
			foreach($tab as $cle => $val){
				echo "<strong>Elément $cle :</strong><br>";	
				foreach($val as $val2 => $val3){
					echo "$val2 : $val3 <br>";	
				}
			}
		?></pre>
            </div>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>