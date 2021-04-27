package batnav.metier;

/**
 * Un bateau dans une partie de bataille navale.
 * @author Fabrice Pelleau
 *
 */
public class Bateau {
	private String nom;
	private int    longueur;
	
	/**
	 * Constructeur d'un Bateau validant les premières règles de cohérence
	 * @param code     numéro du bateau          ( >1 )
	 * @param nom      nom du bateau             (libre)
	 * @param longueur taille/longueur du bateau ([1..10])
	 */
	public Bateau(String nom, int longueur) {
		if (longueur<1 || longueur>10) {
			throw new ExceptionBatailleNavale("Création d'un bateau trop petit ou trop grand [1..10]");
		}
		this.nom = nom;
		this.longueur = longueur;
	}
	/**
	 * Nom du bateau
	 * @return le nom
	 */
	public String getNom() {
		return nom;
	}
	/**
	 * Longueur du bateau
	 * @return la longueur
	 */
	public int getLongueur() {
		return longueur;
	}

	@Override
	public String toString() {
		return nom+" de longueur "+longueur;
	}
	
}
