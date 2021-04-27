<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Mon site PWS en PHP!</title>
</head>
	<body>
		<div style="padding-top: 0px" id="main">
        <div style="text-align: left" class="col-md-12">
        <h2>Veuillez entrer les identifications pour accéder aux données:</h2>
		<?php	
			session_start();
			
			if(isset($_POST['post_form'])) // Ici la personne a envoyé le formulaire
			{
				if((!isset($_POST['pseudo']) || empty($_POST['pseudo'])) || (!isset($_POST['mdp']) || empty($_POST['mdp'])))
				{ // mot de passe non détecté/entré
					$authentication = array("success"=>false, "message"=>"Veuillez saisir la totalité des informations demandés !");
					$color = "red";
				}							
				else
				{  
					$pseudo = htmlentities($_POST['pseudo']);
					$mdp = htmlentities($_POST['mdp']);
					
					if($pseudo != htmlentities('Angela') && $mdp != htmlentities('Merkel'))
					{
						// Compte inéxistant
						$authentication = array("success"=>false, "message"=>"Ce compte n'existe pas !");
						$color = "red";
					}
					else
					{
						if($pseudo == htmlentities('Angela') && $mdp != htmlentities('Merkel'))
						{
							// Mot de passe incorrect
							$authentication = array("success"=>false, "message"=>"Mot de passe incorrect !");
							$color = "orange";
						}
						else 
						{
							// Compte existant
							$authentication = array("success"=>true, "message"=>"Authentification réussie !");
							$color = "green";
						}	
					}
				}
			}		
		?>
			
		<form action="" method="post">
			<p>
				<input type="hidden" name="post_form" value="yep"/>
				<label for="pseudo">Login </label> : <input type="text" name="pseudo" id="pseudo" /></br>
				<label for="mdp">   Mot de passe </label> :  <input type="password" name="mdp" id="mdp" /></br></br>

				<input type="submit" value="Valider" /></br></br>
			</p>
		</form>   
			
		<?php 
			if(!empty($authentication)) 
			{ 
				if(!$authentication['success']) 
				{ 
					echo '<font color="'.$color .'">'.$authentication['message'].'</font>'; 					
				} 
				else 
				{	 
					echo '<font color="'.$color .'">'.$authentication['message'].'</font></br></br></br>'; 
					
					header('Location: index.php');
					exit(); // Pour mettre fin à l'exécution du script
				}
			}
		?>
            </div>
        </div>
    </div>
</body>
</html>
