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
    <?php include("connect.inc.php"); ?>
    <?php include("./include/menus.php"); ?>

    <div style="padding-top: 30px" id="main">
        <div style="text-align: center" class="col-md-12">
		<h1>Consulter les emplacements par type </h1><br><br>
		
		<?php 
			$select = '<select name="LD_Types">
							<option value="Bungalow">Bungalow</option>
							<option value="Mobil-Home">Mobil-Home</option>
							<option value="Emplacement">Emplacement</option>
						</select><br><br>';
			//Remplacement de la chaine du bouton séléctionné par une autre avec l'attribut selected
			if (isset($_POST['LD_Types'])){
				 $select = str_replace('value="'.$_POST['LD_Types'].'"', 'value="'.$_POST['LD_Types'].'" selected="selected"', $select);		
			}
		?>
		<!--Mise en place d'une liste déroulante dans un formulaire pour consulter 
		les emplacements selon le choix du type des emplacements de ceux-ci-->
		<form method='post'>
			<legend>Types d'Emplacement</legend><br>
			<?php echo $select; ?>
			<input type='submit' name='Afficher' value='Afficher'/>
		</form><br><br>
		
		<?php
			session_start();
            if (!empty($_SESSION['identifie'] && $_SESSION['identifie'] == 'OK')) {
                // Test envoi formulaire
				if (empty($_POST['afficher'])) {
					// Les emplacements sont des bungalows 
					if(isset($_POST['LD_Types']) && $_POST['LD_Types'] == 'Bungalow') {
						echo"<h2>Bungalow</h2>";
						// Création d'un tableau centré avec bordures
						echo"<table border=2>";
						echo"<tr>
							<th>Id Empl</th>
							<th>Type de l'emplacement</th>
							<th>Adresse de l'emplacement</th>
							<th>Année de construction</th>									 
							</tr>";
							// Selection des emplacements qui sont des bungalows 
							$req = "SELECT * FROM Emplacement WHERE idType = 100";
							$result = $conn->prepare($req);
							$result->execute();
							foreach ($result as $emp) {
								echo "<tr>";
									echo "<td>".$emp['idEmpl']."</td>";
									echo "<td>".$emp['idType']."</td>";
									echo "<td>".$emp['adresseEmpl']."</td>";
									echo "<td>".$emp['anneeConstruction']."</td>";
								echo "</tr>";
							}
							$result->closeCursor();
						echo"</table><br><br>";
					}
					// Les emplacements sont des mobils-home
					else if(isset($_POST['LD_Types']) && $_POST['LD_Types'] == 'Mobil-Home') {
						echo"<h2>Mobil-Home</h2>";
						// Création d'un tableau centré avec bordures
						echo"<table border=2>";
						echo"<tr>
							<th>Id Empl</th>
							<th>Type de l'emplacement</th>
							<th>Adresse de l'emplacement</th>
							<th>Année de construction</th>									 
							</tr>";
							// Selection des emplacements qui sont des mobils-home
							$req = "SELECT * FROM Emplacement WHERE idType = 200";
							$result = $conn->prepare($req);
							$result->execute();
							foreach ($result as $emp) {
								echo "<tr>";
									echo "<td>".$emp['idEmpl']."</td>";
									echo "<td>".$emp['idType']."</td>";
									echo "<td>".$emp['adresseEmpl']."</td>";
									echo "<td>".$emp['anneeConstruction']."</td>";
								echo "</tr>";
							}
							$result->closeCursor();
						echo"</table><br><br>";
					}
					// Les emplacements sont des "emplacements"
					else if(isset($_POST['LD_Types']) && $_POST['LD_Types'] == 'Emplacement') {
						echo"<h2>Emplacement</h2>";
						// Création d'un tableau centré avec bordures
						echo"<table border=2>";
						echo"<tr>
							<th>Id Empl</th>
							<th>Type de l'emplacement</th>
							<th>Adresse de l'emplacement</th>
							<th>Année de construction</th>									 
							</tr>";
							// Selection des emplacements qui sont des "emplacements"
							$req = "SELECT * FROM Emplacement WHERE idType = 300";
							$result = $conn->prepare($req);
							$result->execute();
							foreach ($result as $emp) {
								echo "<tr>";
									echo "<td>".$emp['idEmpl']."</td>";
									echo "<td>".$emp['idType']."</td>";
									echo "<td>".$emp['adresseEmpl']."</td>";
									echo "<td>".$emp['anneeConstruction']."</td>";
								echo "</tr>";
							}
							$result->closeCursor();
						echo"</table><br><br>";
					}
				}
            } 
            else {
                header('location:FormConnexion.php?msgErreur=Tentative d\'accès interdite');       
                exit();
            }
				
			?>
			
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>