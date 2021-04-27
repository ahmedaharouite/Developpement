package batnav.ihm;

import java.awt.Dimension;
import java.awt.Toolkit;

public class Main {

	public static void main(String[] args) {

		FrameBatailleNavale myFrame = new FrameBatailleNavale();
		// On r�cup�re la taille de l'�cran (la r�solution)
		Dimension screen = Toolkit.getDefaultToolkit().getScreenSize();
		// et on place notre fen�tre au milieu
		myFrame.setLocation((screen.width - myFrame.getSize().width)/2,(screen.height - myFrame.getSize().height)/2);

		myFrame.setVisible(true);

	}

}
