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
			<h1>Consulter les emplacements par décennie de parution</h1><br><br>
			
			<?php 
			$select = '<input type="radio" name="anneeRenov" value="2000" checked/> Date de construction/rénovation antérieure à 2000<br><br>
				<input type="radio" name="anneeRenov" value="2009"/> Date de construction/rénovation entre 2000 et 2009<br><br>
				<input type="radio" name="anneeRenov" value="sup2009"/> Date de construction/rénovation postérieure ou égale à 2010<br><br>';
			//Remplacement de la chaine du bouton séléctionné par une autre avec l'attribut checked
			if (isset($_POST['anneeRenov'])){
				 $select = str_replace('value="'.$_POST['anneeRenov'].'"', 'value="'.$_POST['anneeRenov'].'" checked', $select);		
			}
			?>
			<!--Mise en place de boutons radio dans un formulaire pour consulter 
			les emplacements selon le choix de l'année de constructon de ces derniers-->
			<form method="POST">
				<legend>Emplacements</legend><br>
				<?php echo $select; ?>
				<input type='submit' name='afficher' value='Afficher'/><br><br><br><br>
			</form>
			<?php
			session_start();
            if (!empty($_SESSION['identifie'] && $_SESSION['identifie'] == 'OK')) {
                // Test envoi formulaire
				if (!empty($_POST['afficher'])) {
					// Année de renovation infèrieur à 2000
					if (isset($_POST['anneeRenov']) && $_POST['anneeRenov'] == 2000) {
						echo"<h2>Emplacements antérieurs à 2000</h2>";
						// Création d'un tableau centré avec bordures
						echo"<table border=2>";
						echo"<tr>
							<th>Id Empl</th>
							<th>Type de l'emplacement</th>
							<th>Adresse de l'emplacement</th>
							<th>Année de construction</th>									 
							</tr>";
							// Selection des emplacements qui ont une année de construction infèrieur à 2000
							$req = "SELECT * FROM Emplacement WHERE anneeConstruction < 2000";
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
					// Année de construction entre 2000 et 2009
					else if (isset($_POST['anneeRenov']) && $_POST['anneeRenov'] == 2009) {
						echo"<h2>Emplacements entre 2000 et 2009</h2>";
						// Création d'un tableau centré avec bordures
						echo"<table border=2>";
						echo"<tr>
							<th>Id Empl</th>
							<th>Type de l'emplacement</th>
							<th>Adresse de l'emplacement</th>
							<th>Année de construction</th>									 
							</tr>";
							// Selection des emplacements qui ont une année de construction entre 2000 et 2009
							$req = "SELECT * FROM Emplacement WHERE anneeConstruction >= 2000 AND anneeConstruction <= 2009";
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
					// Année de construction supérieure à 2009
					else if (isset($_POST['anneeRenov']) && $_POST['anneeRenov'] == 'sup2009') {
						echo"<h2>Emplacements postérieurs ou égaux à 2010</h2>";
						// Création d'un tableau centré avec bordures
						echo"<table border=2>";
						echo"<tr>
							<th>Id Empl</th>
							<th>Type de l'emplacement</th>
							<th>Adresse de l'emplacement</th>
							<th>Année de construction</th>									 
							</tr>";
							// Selection des emplacements qui ont une année de construction supérieure à 2000
							$req = "SELECT * FROM Emplacement WHERE anneeConstruction >= 2010";
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