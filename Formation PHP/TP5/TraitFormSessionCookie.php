<?php
session_start();

if(!empty($_POST['Envoi']) && !empty($_POST['login']) && $_POST['login']=="Angela" 
	&& !empty($_POST['password']) && $_POST['password']=="Merkel") {
	
	$_SESSION['identifie']=true;
	$_SESSION['nom']=htmlentities($_POST['login']);

	if(isset($_POST['souvenirMoi']) && !empty($_POST['souvenirMoi']))  {
		setcookie("login", htmlentities($_POST['login']), time()+900);
	}

	header("location:PageSecurisee.php");
	exit();
} else {
	header("location:FormConnexion.php?msgErreur=Erreur de connexion... Recommencez");
	exit();
}

?>