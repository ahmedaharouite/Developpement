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
	 * Si on donne un chemin d'acc�s en param�tre elle est lue avec notre m�thode
	 * synchronis�e (qui attend la lecture compl�te pour continuer)
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
	 * Si on donne une image en param�tre elle est affich�e tout de suite
	 * (on consid�re quelle a �t� charg�e enti�rement avant)
	 *  => C'est donc plus rapide qu'avec le nom de l'image
	 *
	 * @param pfImage l'image
	 */
	public void setImage( Image pfImage) {
		this.image = pfImage;
		this.repaint();
	}

	private void lireImageEtAttendre(String pfCheminImage) {
		// Cette m�thode va ralentir un peu l'interface
		// mais elle permet d'�tre certain que l'image est charg�e avant de l'utiliser
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
