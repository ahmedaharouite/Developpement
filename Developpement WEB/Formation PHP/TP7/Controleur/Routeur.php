<?php
require_once 'Controleur/ControleurType.php';
require_once 'Controleur/ControleurEmplacement.php';

class Routeur {
    // Route une requête entrante : exécution la bonne méthode de contrôleur en fonction de l'URL 
    public function routerRequete() {
		// s'il y a un parametre 'route'
        if (!empty($_GET['route'])) {
			// on détermine avec quelle méthode de quel contrôleur on veut travailler
			switch($_GET['route']) {
				case 'emplacementRead' :  if (!empty($_GET['id'])) {
											$ctrlEmpl = new ControleurEmplacement();
											$ctrlEmpl->getEmplacement($_GET['id']);
										  }
										  else { // s'il manque le paramètre id alors on affiche la liste des emplacements
											$ctrlEmpl = new ControleurEmplacement();
											$ctrlEmpl->getListeEmplacement();
										  }
									      break;
				
				case 'typeRead' : 	  if (!empty($_GET['id'])) {
											$ctrlType = new ControleurType();
											$ctrlType->getListeEmplacementsByType($_GET['id']);
										  }
										  else { // s'il manque le paramètre id alors on affiche la liste des Types
											$ctrlType = new ControleurType();
											$ctrlType->getListeTypes();
										  }
										  break;

				default: 	              // pour toutes les autres valeurs, on affiche la liste des Types 
										  $ctrlType = new ControleurType();
									      $ctrlType->getListeTypes();
									      break;			
			}
		}
		// aucun paramètre 'route' : on affiche la liste des Types
        else {  
			$ctrlType = new ControleurType();
			$ctrlType->getListeTypes();
        }          
    }
}