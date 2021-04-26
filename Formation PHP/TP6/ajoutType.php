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
		
							
		<?php
			session_start();
            if (!empty($_SESSION['identifie'] && $_SESSION['identifie'] == 'OK')) {
                // Test envoi formulaire
				if (!empty($_POST['Valider'])) {
					// On affecte 0 à la variable $erreur 
					$erreur = 0;
					
					// Création des deux regex
					$regId = "#^[4-9]00$#";
					$regNom = "#^[a-zA-z\s]{3,25}$#";
					
					//Si une (ou les deux) de ces contraintes n’est pas respecté on affiche un message d’erreur 
					if(!preg_match($regId, $_POST['idType'])){
						echo '<p>L\'Id Type n\'est pas bien formé, veuillez recommencer la saisie</p><br>';
						// on affecte 1 à la variable $erreur
						$erreur = 1;
					}
					if(!preg_match($regNom, $_POST['nomType'])){
						echo '<p>Le Nom du type n\'est pas bien formé, veuillez recommencer la saisie</p><br>';
						$erreur = 1;
					}
					
					//Les containtes sont respectés
					if($erreur == 0){
						// Les champs sont tous remplis
						if (isset($_POST['idType']) && isset($_POST['nomType'])){
							// Insertion de nouveau type
							$req = $conn->prepare("INSERT INTO Type VALUES(?, ?)");
							htmlspecialchars($req->execute(array(
								$_POST['idType'],
								$_POST['nomType']
							)));
							header('location: ConsultType.php');
						}
					}
				}
				if  (empty($_POST['Valider']) || $erreur == 1){
					// Affichage du formulaire d'insertion de nouveau type
					echo '<p>Veuillez entrer les informations du nouveau type :</p><br>
						<form method="post" >
						<p>
						Id du type : <input type="text" value="400" name="idType"> <br><br>
						Nom du type : <input type="text" value="Caravane" name="nomType"><br><br>
						
						<input type="submit" name="Valider" value="Valider">
						</p>
						</form>';
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