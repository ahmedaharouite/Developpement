<?php
// ControleurType.php
// Cette classe est créée et utilisée par le routeur.
// Elle utilise ModeleEmplacement.php pour récupérer les données et inclut ensuite
// VueListeEmplacements.php ou VueEmplacement.php pour afficher ces données.
include_once("Modele/ModeleType.php");
include_once("Modele/ModeleEmplacement.php");

class ControleurType {
	private $modeleType;
	private $modeleEmpl;
	
	public function __construct() {
		$this->modeleType = new ModeleType();
		$this->modeleEmpl = new ModeleEmplacement();
	}
	
	public function getListeTypes() {
		$vListeTypes = $this->modeleType->getListeTypes();
		include 'Vue/VueListeTypes.php';
	}

	public function getListeEmplacementsByType($idType)  {
		$vListeEmplType = $this->modeleEmpl->getListeEmplacementsByType($idType);
		include 'Vue/VueListeEmplacements.php';
	}
}
?>
