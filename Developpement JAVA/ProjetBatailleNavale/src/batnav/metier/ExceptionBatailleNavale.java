package batnav.metier;

/**
 * Exception générée pour toute erreur d'utilisation du jeu de bataille navale
 * @author Fabrice Pelleau
 */
public class ExceptionBatailleNavale extends RuntimeException {
	private static final long serialVersionUID = -1191957281613833378L;

	public ExceptionBatailleNavale(String message, Throwable exceptionOrigine) {
		super(message, exceptionOrigine);
	}

	public ExceptionBatailleNavale(String message) {
		super(message);
	}

	@Override
	public void printStackTrace() {
		System.err.println("SI VOUS AVEZ CETTE EXCEPTION C'EST QUE VOUS UTILISEZ MAL UNE CLASSE DU PACKAGE batnav.metier");
		super.printStackTrace();
	}

}
