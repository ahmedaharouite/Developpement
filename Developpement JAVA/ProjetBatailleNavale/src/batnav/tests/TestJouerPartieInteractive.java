package batnav.tests;

import java.util.Scanner;

import batnav.metier.Bateau;
import batnav.metier.GrilleBatailleNavale;
import batnav.metier.Reponse;

public class TestJouerPartieInteractive {

	@SuppressWarnings("resource")
	public static void main(String[] args) {

		// créer une liste de bateaux
		Bateau[] mesBateaux = { new Bateau("Torpilleur 1", 2), new Bateau("Torpilleur 2", 2),
				new Bateau("Sous-Marin", 3),

		};
		// créer une grille
		GrilleBatailleNavale monJeu = new GrilleBatailleNavale(5, 3, mesBateaux);

		System.out.println(monJeu.toString());
		System.out.println("\n\n\n\n");

		// -------------------

		boolean fini;

		fini = false;
		int x, y;
		int l, h;
		Scanner c;
		Reponse r;

		l = 5;
		h = 3;
		c = new Scanner(System.in);

		while (!fini) {
			System.out.println("On joue sur une grille " + l + " sur " + h);
			System.out.println("Jouer un coup : ");
			System.out.print("x : [0, " + (l - 1) + "] -> ");
			x = c.nextInt();
			System.out.print("y : [0, " + (h - 1) + "] -> ");
			y = c.nextInt();
			if ((0 <= x && x < l) && (0 <= y && y < h)) {
				r = monJeu.jouerCoup(x, y);
				System.out.println(r);
				if (monJeu.isPartieGagne()) {
					System.out.println("BRAVO !!!!!");
					fini = true;
				} else {
					System.out.println("On continue (<CTRL><C> pour arrêter)");
				}
			} else {
				System.out.println("Erreur de saisie de x ou y ...");
			}
		}
	}
}
