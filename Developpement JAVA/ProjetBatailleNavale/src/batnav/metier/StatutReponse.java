package batnav.metier;

public enum StatutReponse {
	Touche,		// un bateau est touché mais pas coulé
	Coule,      // un bateau est touché et coulé
	Plouf,      // le coup est dans l'eau
	Erreur,     // ce coup a déjà été joué
	Impossible	// ce coups n'est pas sur le terrain
	
}
