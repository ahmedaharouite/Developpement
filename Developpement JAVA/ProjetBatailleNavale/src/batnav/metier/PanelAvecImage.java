package batnav.metier;

import java.awt.Graphics;
import java.awt.Image;
import java.awt.MediaTracker;
import java.awt.Toolkit;
import java.net.URL;

import javax.swing.JPanel;

public class PanelAvecImage extends JPanel {
	private static final long serialVersionUID = 4194309372219964564L;

	private Image image;
	static int compteurRefresh = 0;
	
	public PanelAvecImage( ) {
		this.setOpaque(false);
		this.image = null;
	}
	public PanelAvecImage( Image pfImage ) {
		this();
		this.image = pfImage;
	}
	
	public PanelAvecImage( String pfCheminImage ) {
		this();
		lireImageEtAttendre(pfCheminImage);
	}
	
	/**
	 * Changer d'image.
	 * 
	 * Si on donne un chemin d'accès en paramètre elle est lue avec notre méthode
	 * synchronisée (qui attend la lecture complète pour continuer)
	 *  => C'est donc plus rapide qu'avec le nom de l'image
	 *
	 * @param pfImage l'image
	 */
	public void setImage(String pfCheminImage) {
		lireImageEtAttendre(pfCheminImage);
	}
	/**
	 * Changer d'image.
	 * 
	 * Si on donne une image en paramètre elle est affichée tout de suite
	 * (on considère quelle a été chargée entièrement avant)
	 *  => C'est donc plus rapide qu'avec le nom de l'image
	 *
	 * @param pfImage l'image
	 */
	public void setImage( Image pfImage) {
		this.image = pfImage;
		this.repaint();
	}

	private void lireImageEtAttendre(String pfCheminImage) {
		// Cette méthode va ralentir un peu l'interface
		// mais elle permet d'être certain que l'image est chargée avant de l'utiliser
		URL   urlImage = this.getClass().getResource(pfCheminImage);
		this.image    = Toolkit.getDefaultToolkit().createImage(urlImage);
		MediaTracker tracker = new MediaTracker(this);
		tracker.addImage(this.image, 0);
		try { tracker.waitForID(0); } catch(InterruptedException e) {}
		this.repaint();
	}
	
	@Override
	 public void paintComponent(Graphics g) {
		 super.paintComponent(g);
		 if (this.image!=null) {
			 g.drawImage(this.image, 0, 0, null);
		 }
	 }
}
