<?php
// Emplacement.php
// Cette classe servira à transferer, en mode objet, des données entre le modèle,
// le contrôleur et la vue
class Emplacement {
	public $idEmpl;
	public $idType;
	public $adresseEmpl;
	public $anneeConstruction;
	
	public function __construct($idEmpl, $idType, $adresseEmpl, $anneeConstruction) {
		$this->idEmpl = $idEmpl;
		$this->idType = $idType;
		$this->adresseEmpl = $adresseEmpl;
		$this->anneeConstruction = $anneeConstruction;
	}
}
?>