<?php
// ControleurEmplacement.php
// Cette classe est créée et utilisée par le routeur.
// Elle utilise ModeleEtudiant.php pour récupérer les données et inclut ensuite
// VueListeEtudiants.php ou VueEtudiant.php pour afficher ces données.
include_once("Modele/ModeleEmplacement.php");

class ControleurEmplacement {
	private $modeleEmp;
	
	public function __construct() {
		$this->modeleEmp = new ModeleEmplacement();
	}
	
	public function getListeEmplacements() {
		$vListeEmplacements = $this->modeleEmp->getListeEmplacements();
		include 'Vue/VueListeEmplacements.php';
	}

	public function getEmplacement($idEmpl) {
		$vEmpl = $this->modeleEmp->getEmplacement($idEmpl);
		include 'Vue/VueEmplacement.php';
	}
}
?>