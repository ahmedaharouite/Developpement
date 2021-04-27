package batnav.metier;

/**
 * Réponse à une tentative sur une grille bataille navale
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
	 * Retourne l'état du coup (Cf. StatutReponse)
	 * @return état du coup
	 */
	public StatutReponse getStatut() {
		return statut;
	}
	/**
	 * Retourne le bateau touché ou coulé (attention retourne null si aucun bateau n'est touché)
	 * @return le bateau ou null
	 */
	public Bateau getBateau() {
		return bateau;
	}
	
	/**
	 * Représentation d'une réponse sous forme d'une chaîne de caractère
	 * ... cela peut aider pour debugger pendant le développement de l'interface graphique.
	 */
	public String toString() {
		if (this.bateau==null) {
			return this.statut+" (pas de bateau)";
		} else {
			return this.statut+" ("+this.bateau+")";
		}
	}
	
	

}
