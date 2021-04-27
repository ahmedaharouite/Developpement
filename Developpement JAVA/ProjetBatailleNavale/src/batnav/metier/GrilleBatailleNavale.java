package batnav.metier;

import java.util.Random;

/**
 * Jeu de bataille navale sans interface graphique
 * 
 * @author fabrice Pelleau
 *
 */
public class GrilleBatailleNavale {

	private int       largeur;
	private int       hauteur;
	private Bateau[]  bateaux;
	private boolean[] bateauATrouver;
	private int[][]   terrain;

	private static final int MAXBATRAND    = 10;
	private static final int MAXGRILLERAND = 10;
	private static final int CODE_PLOUF    = 999;

	/**
	 * Construire un jeu de Bataille Navale
	 * @param largeur largeur de la grille de jeu
	 * @param hauteur hauteur de la grille de jeu
	 * @param bateaux tableau contenant tous les bateaux à utiliser
	 * 
	 * @throws ExceptionBatailleNavale si les paramètres sont incoherents
	 * 
	 * @see batnav.metier.Bateau
	 */
	public GrilleBatailleNavale(int largeur, int hauteur, Bateau[] bateaux) throws ExceptionBatailleNavale {
		// validation des dimensions
		if (largeur<1 || hauteur<1) {
			throw new ExceptionBatailleNavale("Une grille de bataille navale doit avoir des dimensions supérieures à zéro");
		}
		// validation des bateaux (taille ok et code unique)
		int tailleMax = (largeur<hauteur?largeur:hauteur); 
		for (int i = 0; i < bateaux.length; i++) {
			if (bateaux[i].getLongueur()>tailleMax) {
				throw new ExceptionBatailleNavale("Un bateau ne peut pas être plus grand que la grille de jeu");
			}
		}
		this.largeur=largeur;
		this.hauteur=hauteur;
		this.bateaux=bateaux;
		this.terrain = new int[hauteur][largeur];
		this.bateauATrouver = new boolean[bateaux.length];
		initialiserGrille();
	}
	/**
	 * Créer (ou recréer) une nouvelle grille aléatoire avec les bateaux souhaités
	 */
	public void initialiserGrille() throws ExceptionBatailleNavale {
		// Placement des bateaux :
		// on recherche au maximum MAXBATRAND positions aléatoires pour une bateau
		// et si ça ne fonctionne pas on refait toute la grille (maximum MAXGRILLERAND fois)
		int tentativeGrille = 0;
		int numBateau;
		while (tentativeGrille<GrilleBatailleNavale.MAXGRILLERAND) {
			razTerrain();
			for (numBateau = 0; numBateau < this.bateaux.length; numBateau++) {
				int tentativeBateau = 0;
				while (tentativeBateau<GrilleBatailleNavale.MAXBATRAND) {
					if (placerBateau(numBateau)) {
						break;
					}
					tentativeBateau++;
				}
				if (tentativeBateau>=GrilleBatailleNavale.MAXBATRAND) {
					break;
				}
			}
			if (numBateau==this.bateaux.length) {
				// tous les bateaux sont placés, c'est OK
				return;
			}
			tentativeGrille++;
		}
		throw new ExceptionBatailleNavale("Impossible de créer une nouvelle grille. Elle est probablement trop complexe");

	}
	/**
	 * Jouer un coup sur la grille
	 * @param x position sur la largeur de la grille [0..n]
	 * @param y position sur la hauteur de la grille [0..n]
	 * @return la réponse contenant le statut (Plouf, touché, coulé, etc.) et éventuellement le bateau touché
	 * 
	 * @see batnav.metier.Reponse
	 */
	public Reponse jouerCoup(int x, int y) {
		if (x<0 || x>=largeur) {
			return new Reponse(StatutReponse.Impossible, null);
		}
		if (y<0 || y>=hauteur) {
			return new Reponse(StatutReponse.Impossible, null);
		}
		if (this.terrain[y][x]<0 || this.terrain[y][x]==CODE_PLOUF) {
			return new Reponse(StatutReponse.Erreur, null);
		} else if (this.terrain[y][x]==0) {
			this.terrain[y][x] = CODE_PLOUF;
			return new Reponse(StatutReponse.Plouf, null);
		} else {
			// il y a donc un bateau ici, on regarde si il est coulé
			int numBateau = this.terrain[y][x];
			this.terrain[y][x] = -numBateau;
			if (trouveBateau(numBateau)) {
				return new Reponse(StatutReponse.Touche, this.bateaux[numBateau-1]);
			} else {
				this.bateauATrouver[numBateau-1] = false;
				return new Reponse(StatutReponse.Coule, this.bateaux[numBateau-1]);
			}
		}

	}
	/**
	 * Indique si la partie est terminée
	 * @return true si tous les bateaux sont coulés
	 */
	public boolean isPartieGagne() {
		for (int b = 0; b < bateauATrouver.length; b++) {
			if (this.bateauATrouver[b]) {
				return false;
			}
		}
		return true;
	}
	/**
	 * Largeur du terrain	
	 * @return la valeur
	 */
	public int getLargeur() {
		return largeur;
	}
	/**
	 * Hauteur du terrain	
	 * @return la valeur
	 */
	public int getHauteur() {
		return hauteur;
	}
	/**
	 * Liste des bateaux	
	 * @return le tableau contenant les bateaux
	 */
	public Bateau[] getBateaux() {
		return bateaux;
	}
	/**
	 * Représentation du jeu sous forme d'une grosse chaîne de caractère
	 * ... cela peut aider pour debugger pendant le développement de l'interface graphique.
	 */
	public String toString() {
		String result = "---------- Grille de "+largeur+"x"+hauteur+" -------------\n";
		for (int h = 0; h < hauteur; h++) {
			for (int l = 0; l < largeur; l++) {
				if ( this.terrain[h][l]==CODE_PLOUF ) {
					result += "   #";
				} else {
					result += String.format("%1$4s", ""+this.terrain[h][l]);
				}
			}
			result += "\n";
		}
		result += "Bateaux :\n";
		for (int i = 0; i < bateaux.length; i++) {
			result += (i+1)+" : "+bateaux[i].toString();
			if (this.bateauATrouver[i]) {
				result += " [encore en jeu]\n";
			} else {
				result += " [### coulé ###]\n";
			}
		}
		result += "--------------------------------------\n";
		return result;
	}

	// ==================================================================================================
	// METHODES INTERNES (utilisées pour les algorithmes de création de grille et de validation de coups)
	// ==================================================================================================

	private void razTerrain() {
		for (int h = 0; h < this.hauteur; h++) {
			for (int l = 0; l < this.largeur; l++) {
				this.terrain[h][l] = 0;
			}
		}
		for (int b = 0; b < bateauATrouver.length; b++) {
			bateauATrouver[b] = true;
		}

	}
	public boolean trouveBateau(int numBateau) {
		for (int h = 0; h < this.hauteur; h++) {
			for (int l = 0; l < this.largeur; l++) {
				if ( this.terrain[h][l] == numBateau ) {
					return true;
				}
			}
		}
		return false;
	}
	private boolean placerBateau(int numBateau) {
		
		Random rand = new Random();
		Bateau bateau = this.bateaux[numBateau];
		if (Math.random()>0.5) {
			// bateau à l'horizontale
			// on tire un emplacement au hasard
			int px = (this.largeur>bateau.getLongueur()?rand.nextInt(this.largeur-bateau.getLongueur()):0);
			int py = rand.nextInt(this.hauteur);
			// on valide si il y a la place
			for (int i = 0; i < bateau.getLongueur(); i++) {
				if (this.terrain[py][px+i]!=0) {
					return false;
				}
			}
			// on place le bateau
			for (int i = 0; i < bateau.getLongueur(); i++) {
				this.terrain[py][px+i] = numBateau+1;
			}
		} else {
			// bateau à la verticale
			// on tire un emplacement au hasard
			int px = rand.nextInt(this.largeur);
			int py = (this.hauteur>bateau.getLongueur()?rand.nextInt(this.hauteur-bateau.getLongueur()):0);
			// on valide si il y a la place
			for (int i = 0; i < bateau.getLongueur(); i++) {
				if (this.terrain[py+i][px]!=0) {
					return false;
				}
			}
			// on place le bateau
			for (int i = 0; i < bateau.getLongueur(); i++) {
				this.terrain[py+i][px] = numBateau+1;
			}
		}
		return true;
	}
	

}
