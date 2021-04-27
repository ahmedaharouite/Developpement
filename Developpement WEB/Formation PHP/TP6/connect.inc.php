<?php

	// Connexion à la base de données
	try
	{
		$conn = new PDO('mysql:host=localhost;dbname=Pws2001;charset=utf8', 'Pws2001', 'ahmed2001',
		                 array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION)
						);
	}
	catch(PDOException $e)
	{
		echo "Erreur : ".$e->getMessage()."<br>";
		die();
	}
?>