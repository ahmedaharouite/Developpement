package batnav.tests;

import batnav.metier.Bateau;
import batnav.metier.GrilleBatailleNavale;

public class TestCreationGrille {

	public static void main(String[] args) {
		
		// créer une liste de bateaux
		Bateau[] mesBateaux = {
				new Bateau("Torpilleur 1", 2),
				new Bateau("Torpilleur 2", 2),
				new Bateau("Sous-Marin",   3),
				
		};
		// créer une grille
		GrilleBatailleNavale maGrille = new GrilleBatailleNavale(5, 3, mesBateaux);
		
		System.out.println( maGrille.toString() );
		
		// réinitialiser une grille
		maGrille.initialiserGrille();

		System.out.println( maGrille.toString() );

	}
}
