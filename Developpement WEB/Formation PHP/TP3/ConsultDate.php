<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="include/bootstrap.min.css">
    <link rel="stylesheet" href="include/styles.css">
	<link href="InitTableaux.php">
	<title>Mon site PWS en PHP!</title>
</head>
<body>
	<?php include("./include/header.php"); ?>
    <?php include("./include/menus.php"); ?>
    <div style="padding-top: 30px" id="main">
        <div style="text-align: center" class="col-md-12">
		
		<h1>Consulter les emplacements par décennie de parution</h1><br><br>
		
		<!--Mise en place des boutons radios dans un formulaire pour consulter 
		les emplacements selon l’année de construction/rénovation de ceux-ci-->
		<form method='post'>
			<legend>Emplacements</legend><br>
			<input type="radio" name="BR_choix" value="moins2000" checked="checked">
			Date de construction/rénovation antérieure à 2000 <br><br>
			
			<input type="radio" name="BR_choix" value="moins2010">
			Date de construction/rénovation entre 2000 et 2009 <br><br>
			
			<input type="radio" name="BR_choix" value="plus2010">
			Date de construction/rénovation postérieure ou égale à 2010 <br><br>
			
			<input type='submit' name='Afficher' value='Afficher'/>
		</form><br><br>
        
		<?php 
			// Inclusion de la page InitTableaux.php 
			include("./InitTableaux.php");
			
			if (isset($_POST["Afficher"])){
				if(isset($_POST['BR_choix']) && $_POST['BR_choix'] == 'moins2000'){
					 echo "<h2>Emplacements antérieurs à 2000</h2>";
					 // Création d'un tableau centré avec bordures
					 echo "<center><table border =\"2\">
					 <tr>
						<th>Id Empl</th>
						<th>Type de l'emplacement</th>
						<th>Adresse de l'emplacement</th>
						<th>Année de construction</th>
					</tr>";
					// Recuperation des valeurs dans $tabEmplacement et insertion de des dernieres dans un tableau html
					foreach($TabEmplacement as $key => $val){
						echo "<tr>";
						foreach($val as $val2 => $val3){
							if($val['anneeConstruction'] < 2000){ 
								// Date de construction/rénovation antérieure à 2000
								echo "<td>$val3</td>";
							}
						}
						echo "</tr>";
					 }
					 echo "</table></center><br><br><br><br>";
				}
				else if(isset($_POST['BR_choix']) && $_POST['BR_choix'] == 'moins2010'){
					echo "<h2>Emplacements entre 2000 et 2009</h2>";
					// Création d'un tableau centré avec bordures
					echo "<center><table border =\"2\"><tr>
					 <th>Id Empl</th>
					 <th>Type de l'emplacement</th>
					 <th>Adresse de l'emplacement</th>
					 <th>Année de construction</th></tr>";
					 // Recuperation des valeurs dans $tabEmplacement et insertion de des dernieres dans un tableau html
					 foreach($TabEmplacement as $key => $val){
						 echo "<tr>";
						 foreach($val as $val2 => $val3){
							if($val['anneeConstruction'] >= 2000 && $val['anneeConstruction'] <= 2009){
								// Date de construction/rénovation entre 2000 et 2009
								echo "<td>$val3</td>";
							}
						}
						echo "</tr>";
					 }
					 echo "</table></center><br><br><br><br>";
				}
				else if(isset($_POST['BR_choix']) && $_POST['BR_choix'] == 'plus2010'){
					echo "<h2>Emplacements postérieurs ou égaux à 2010</h2>";
					// Création d'un tableau centré avec bordures 
					echo "<center><table border =\"2\"><tr>
					 <th>Id Empl</th>
					 <th>Type de l'emplacement</th>
					 <th>Adresse de l'emplacement</th>
					 <th>Année de construction</th></tr>";
					 // Recuperation des valeurs dans $tabEmplacement et insertion de des dernieres dans un tableau html
					 foreach($TabEmplacement as $key => $val){
						 echo "<tr>";
						 foreach($val as $val2 => $val3){
							if($val['anneeConstruction'] > 2010){
								// Date de construction/rénovation postérieure ou égale à 2010
								echo "<td>$val3</td>";
							}
						}
						echo "</tr>";
					 }
					 echo "</table></center><br><br><br><br>";
				}
			}
		?>
		
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>