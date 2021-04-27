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
        
		<h1>Consulter les emplacements par type </h1><br><br>
		
		
		<?php // Inclusion de la page InitTableaux.php 
			include("./InitTableaux.php"); 
		?>
		
		<!--Mise en place d'une liste déroulante dans un formulaire pour consulter 
		les emplacements selon le choix du type des emplacements de ceux-ci-->
		<form method='post'>
			<legend>Types d'Emplacement</legend><br>
			<select name="LD_Types">
				<option value="100"><?php echo $TabType[0]['nomType'] ?></option>
				<option value="200"><?php echo $TabType[1]['nomType'] ?></option>
				<option value="300"><?php echo $TabType[2]['nomType'] ?></option>
			</select><br><br>
			
			<input type='submit' name='Afficher' value='Afficher'/>
		</form><br><br>
		
		<?php
			if (isset($_POST["Afficher"])){
				if(isset($_POST['LD_Types']) && $_POST['LD_Types'] == '100'){
					 echo "<h2>Bungalow</h2>";
					 // Création d'un tableau centré avec bordures
					 echo"<center><table border =\"2\"><tr>
					 <th>Id Empl</th>
					 <th>Type de l'emplacement</th>
					 <th>Adresse de l'emplacement</th>
					 <th>Année de construction</th></tr><tr>";
					 // Recuperation des valeurs dans $tabEmplacement et insertion de des dernieres dans un tableau html
					 foreach($TabEmplacement as $key => $val){
						 foreach($val as $val2 => $val3){
							if($val['idType'] == 100){
								echo"<td>$val3</td>";
							}
						}
						echo"</tr><tr>";
					 }
					 echo"</tr></table></center><br><br><br><br>";
				}
				else if(isset($_POST['LD_Types']) && $_POST['LD_Types'] == '200'){
					echo "<h2>Mobil-Home</h2>";
					// Création d'un tableau centré avec bordures
					echo"<center><table border =\"2\"><tr>
					 <th>Id Empl</th>
					 <th>Type de l'emplacement</th>
					 <th>Adresse de l'emplacement</th>
					 <th>Année de construction</th></tr><tr>";
					// Recuperation des valeurs dans $tabEmplacement et insertion de des dernieres dans un tableau html
					foreach($TabEmplacement as $key => $val){
						 foreach($val as $val2 => $val3){
							if($val['idType'] == 200){
								echo"<td>$val3</td>";
							}
						}
						echo"</tr><tr>";
					 }
					 echo"</tr></table></center><br><br><br><br>";
				}
				else if(isset($_POST['LD_Types']) && $_POST['LD_Types'] == '300'){
					echo "<h2>Emplacement</h2>";
					// Création d'un tableau centré avec bordures
					echo "<center><table border =\"2\"><tr>
					 <th>Id Empl</th>
					 <th>Type de l'emplacement</th>
					 <th>Adresse de l'emplacement</th>
					 <th>Année de construction</th></tr><tr>";
					 // Recuperation des valeurs dans $tabEmplacement et insertion de des dernieres dans un tableau html
					 foreach($TabEmplacement as $key => $val){
						 foreach($val as $val2 => $val3){
							if($val['idType'] == 300){
								echo"<td>$val3</td>";
							}
						}
						echo"</tr><tr>";
					 }
					 echo"</tr></table></center><br><br><br><br>";
				}
			}		
		?>
        </div>
    </div>
	
	<?php include("./include/footer.php"); ?>
</body>
</html>