package batnav.metier;

public enum StatutReponse {
	Touche,		// un bateau est touch� mais pas coul�
	Coule,      // un bateau est touch� et coul�
	Plouf,      // le coup est dans l'eau
	Erreur,     // ce coup a d�j� �t� jou�
	Impossible	// ce coups n'est pas sur le terrain
	
}
