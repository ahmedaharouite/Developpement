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
		<?php
			/*
			AffecterCategories.php
			*/
			// Définition du genre
			$sexe = 'F';
			// on met bien 2 signes = pour tester l'égalité et non un seul (ce
			// serait une affectation)
			if ($sexe == 'F') {
				$genre = "Féminin";
			}
			else {
				$genre = "Masculin";
			}
			// Définition de la catégorie d'age
			$age = 14;
			$categAge = ($age >= 21) ? 'Senior' : 'Junior';
			// Définition de la catégorie de poids
			$poids = 88.5;
			switch(true) {
				case $poids < 60:
					$categPoids = "Super-legers";
				break;
				case $poids < 73:
					$categPoids = "Legers";
				break;
				case $poids < 90:
					// on échappe le caractère fermant du guillemet avec \
					$categPoids = "\"Super\" moyens";
				break;
				case $poids < 100:
					$categPoids = "Mi-lourds";
				break;
				case $poids >= 100:
					$categPoids = "Lourds";
				break;
				default:
					// cas où la variable $poids ne serait pas un entier...
					$categPoids = "poids inconnu";
			}
			// affichage du résultat en mixant 2 façons d'afficher une variable
			// dans une chaine de caractères
			echo "L'athlète est du genre $genre, de la catégorie d'âge
			$categAge et de la catégorie de poids ".$categPoids."<BR>";					
		?>		
            </div>
        </div>
    </div>

	<?php include("./include/footer.php"); ?>
</body>
</html>