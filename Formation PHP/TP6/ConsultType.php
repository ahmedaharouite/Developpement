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
			$req = $conn->query("SELECT * FROM Type");
			
			//Creation de la liste d'option (liste de type d'emplacement)
			$select = '<select name="LD_Types">';
			while ($res = $req->fetch()){
				$select = $select . '<option value="' . $res['nomType'] . '">' . $res['nomType']. '</option>';
			}			
			$select = $select . '</select><br><br>';
			
			
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
		</form><br><br><br>
		
		<?php
		session_start();
        if (!empty($_SESSION['identifie'] && $_SESSION['identifie'] == 'OK')) {
			// Test envoi formulaire
			if (empty($_POST['afficher'])) {
				// Test de l'emplacement séléctionné dans le formulaire
				if(isset($_POST['LD_Types'])) {
					echo '<h2>' . $_POST['LD_Types'] . '</h2><br>';
		
					// Selection des emplacements qui ont pour type celui qui est séléctionné dans le formulaire 
					$req = 'SELECT * FROM Emplacement WHERE idType IN (SELECT idType FROM Type WHERE nomType = ?)';
					$result = $conn->prepare($req);
					$result->execute(array(
						$_POST['LD_Types'] 
					));

					// Test si la selection précèdente retourne un tableau non vide avec des lignes
					if ($result->rowCount() != 0){
						
						// Création d'un tableau centré avec bordures
						echo"<table border=2>";
						echo"<tr>
							<th>Id Empl</th>
							<th>Type de l'emplacement</th>
							<th>Adresse de l'emplacement</th>
							<th>Année de construction</th>									 
						</tr>";
						//Insertion d'une ligne dans le tableau
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
					else {
						//Affichage d'un message si le tableau retourné est vide
						echo '<h4>Aucun emplacement de ce type...</h4>';
					}
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