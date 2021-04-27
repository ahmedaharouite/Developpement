package batnav.tests;

import batnav.metier.Bateau;
import batnav.metier.GrilleBatailleNavale;

public class TestCreationGrille {

	public static void main(String[] args) {
		
		// cr�er une liste de bateaux
		Bateau[] mesBateaux = {
				new Bateau("Torpilleur 1", 2),
				new Bateau("Torpilleur 2", 2),
				new Bateau("Sous-Marin",   3),
				
		};
		// cr�er une grille
		GrilleBatailleNavale maGrille = new GrilleBatailleNavale(5, 3, mesBateaux);
		
		System.out.println( maGrille.toString() );
		
		// r�initialiser une grille
		maGrille.initialiserGrille();

		System.out.println( maGrille.toString() );

	}
}
