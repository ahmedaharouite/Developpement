<?php
// ModeleEmplacement.php
// Cette classe offre des méthodes pour accéder aux données.
// Elle utilise et renvoie des objets de type Emplacement
include_once("Emplacement.php");
include_once("connect.inc.php");

class ModeleEmplacement {
	// methode qui renvoie un tableau d'objets Emplacements
	public function getListeEmplacements() {
		// cette instruction permet d'utiliser dans cette fonction la variable
		// $conn qui a été initialisée dans le script connect.inc.php
		global $conn;
		$res = $conn->prepare("Select * from Emplacement");
		$res->execute();
		foreach($res as $emp) {
		$ListeEmp[] = new Emplacement($emp["idEmpl"], $emp["idType"],
		$emp["adresseEmpl"], $emp["anneeConstruction"]);
		}
		 return $ListeEmp;
	 }

	public function getEmplacement($idEmpl) {
		global $conn;
		$res = $conn->prepare("Select * from Emplacement
		where idEmpl = :pidEmpl");
		$res->execute(array('pidEmpl' => $idEmpl));
		$emp = $res->fetch();
		$unEmplacement = new Emplacement($emp["idEmpl"], $emp["idType"],
		$emp["adresseEmpl"],$emp["anneeConstruction"]);
		return $unEmplacement;
	}
	
	
	public function getListeEmplacementsByType($idType) {
		global $conn;
		$res = $conn->prepare("Select * from Emplacement
		where idType = :pidType");
		$res->execute(array('pidType' => $idType));
		$ListeEmplType = null;
		foreach($res as $emp) {
			$ListeEmplType[] = new Emplacement($emp["idEmpl"], $emp["idType"],
			$emp["adresseEmpl"], $emp["anneeConstruction"]);
		}
		return $ListeEmplType;
	}
}
?>