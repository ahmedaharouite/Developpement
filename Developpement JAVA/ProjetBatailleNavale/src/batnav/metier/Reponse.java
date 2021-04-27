package batnav.metier;

/**
 * R�ponse � une tentative sur une grille bataille navale
 * @author Fabrice Pelleau
 *
 */
public class Reponse {
	private StatutReponse statut;
	private Bateau        bateau;
	
	public Reponse(StatutReponse statut, Bateau bateau) {
		super();
		this.statut = statut;
		this.bateau = bateau;
	}
	/**
	 * Retourne l'�tat du coup (Cf. StatutReponse)
	 * @return �tat du coup
	 */
	public StatutReponse getStatut() {
		return statut;
	}
	/**
	 * Retourne le bateau touch� ou coul� (attention retourne null si aucun bateau n'est touch�)
	 * @return le bateau ou null
	 */
	public Bateau getBateau() {
		return bateau;
	}
	
	/**
	 * Repr�sentation d'une r�ponse sous forme d'une cha�ne de caract�re
	 * ... cela peut aider pour debugger pendant le d�veloppement de l'interface graphique.
	 */
	public String toString() {
		if (this.bateau==null) {
			return this.statut+" (pas de bateau)";
		} else {
			return this.statut+" ("+this.bateau+")";
		}
	}
	
	

}
