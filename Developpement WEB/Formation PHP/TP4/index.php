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
		<?php
			session_start();

			if(!isset($_SESSION['identifie']) || $_SESSION['identifie'] != true) {
				header('location:FormConnexion.php?msgErreur=Tentative d\'acces interdite');
				exit();
			}
		?>
		<div style="padding-top: 30px" id="main">
			<div style="text-align: center" class="col-md-12">
				Bienvenue dans l'espace sécurisé du site !
				<?php 
					echo '<br><br><br>On affiche la session :<br>';
					print_r($_SESSION);
					echo '<br><br>On affiche le possible cookie :<br>';
					print_r($_COOKIE);
				?>
			</div>
		</div>
		<?php include("./include/footer.php"); ?>
	</body>
</html>
