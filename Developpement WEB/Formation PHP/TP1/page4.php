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
        <?php
			/*
			Multiplie.php
			*/
			echo "<h2> Table de multiplication</h2>";
			// Début du tableau HTML
			echo "<table border='2'>";
			// Création de la première ligne de titres
			echo "<tr><th>X</th>";
			for($i=1;$i<13;$i++) {
				echo "<th>$i</th>";
			}
			echo "</tr>";
			/*****************************
			Création du corps de la table
			******************************/
			// Boucles de création du contenu de la table
			for ($j=1;$j<13;$j++) {
				// Création de la première colonne
				echo "<tr><th>$j</th>";
			// Remplissage de la table
			for($k=1;$k<13;$k++) {
				echo "<td>".$j*$k."</td>";
			}
			echo "</tr>";
			}
			echo "</table>";		
		?>
            </div>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>