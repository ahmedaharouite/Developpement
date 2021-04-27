package batnav.tests;

import batnav.metier.Bateau;
import batnav.metier.GrilleBatailleNavale;
import batnav.metier.Reponse;

public class TestJouerPartie {

	public static void main(String[] args) {
		
		// cr�er une liste de bateaux
		Bateau[] mesBateaux = {
				new Bateau("Torpilleur 1", 2),
				new Bateau("Torpilleur 2", 2),
				new Bateau("Sous-Marin",   3),
				
		};
		// cr�er une grille
		GrilleBatailleNavale monJeu = new GrilleBatailleNavale(5, 3, mesBateaux);
		
		System.out.println( monJeu.toString() );
		
		// On joue 7 coups pour voir :

		Reponse rep = monJeu.jouerCoup(0, 0);
		System.out.println("[0,0] : "+rep);

		rep = monJeu.jouerCoup(0, 1);
		System.out.println("[0,1] : "+rep);

		rep = monJeu.jouerCoup(0, 2);
		System.out.println("[0,2] : "+rep);

		rep = monJeu.jouerCoup(1, 1);
		System.out.println("[1,1] : "+rep);

		rep = monJeu.jouerCoup(2, 1);
		System.out.println("[2,1] : "+rep);

		rep = monJeu.jouerCoup(3, 1);
		System.out.println("[3,1] : "+rep);

		rep = monJeu.jouerCoup(4, 1);
		System.out.println("[4,1] : "+rep);

		// le coup suivant a d�j� �t� jou�, le retour indiquera une erreur
		rep = monJeu.jouerCoup(4, 1);
		System.out.println("[4,1] : "+rep);

		System.out.println("===================================================");
		if (monJeu.isPartieGagne()) {
			System.out.println(" !!!!!!!!!!!!!!!!!  TROP DE CHANCE j'ai gagn� !!!! ");
		} else {
			System.out.println(" ................. la partie n'est pas termin�e... ");
		}
		System.out.println("===================================================");
		
		// r�initialiser une grille
		System.out.println( monJeu.toString() );

	}
}
