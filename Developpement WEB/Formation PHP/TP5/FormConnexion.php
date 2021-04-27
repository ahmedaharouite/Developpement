<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
    	<div style="padding-top: 0px" id="main">
        <div style="text-align: left" class="col-md-12">
		<title>Page protégée par mot de passe</title>
	</head>
	<body>
		<?php
			//Obtention du messge d'erreur
			if(isset($_GET['msgErreur'])) {
				echo '<h2>'.$_GET['msgErreur'].'</h2>';
				echo '<br>Veuillez entrer les identifiants :<br><br>';
			}
			//Creation du formulaire de connexion avec ajout du bouton se souvenir de moi
			echo '<form method="POST" action="TraitFormSessionCookie.php">';
			if(isset($_COOKIE['login'])) {
				echo 'Login : <input type="text" name="login" value="'. $_COOKIE['login'].'"/><br>';
			} else {
				echo 'Login : <input type="text" name="login" /><br><br>';
			}
			echo 'Mot de passe : <input type="password" name="password" /></BR></BR>';
        	echo 'Se souvenir de moi : <input type="checkbox" name="souvenirMoi" /></BR></BR>';
       		echo '<input type="submit" name="Envoi" value="Valider"/>';
      		echo '</form>';
		?>
	</body>
</html>

