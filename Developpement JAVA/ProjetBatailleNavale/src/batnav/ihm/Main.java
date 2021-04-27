package batnav.ihm;

import java.awt.Dimension;
import java.awt.Toolkit;

public class Main {

	public static void main(String[] args) {

		FrameBatailleNavale myFrame = new FrameBatailleNavale();
		// On récupère la taille de l'écran (la résolution)
		Dimension screen = Toolkit.getDefaultToolkit().getScreenSize();
		// et on place notre fenêtre au milieu
		myFrame.setLocation((screen.width - myFrame.getSize().width)/2,(screen.height - myFrame.getSize().height)/2);

		myFrame.setVisible(true);

	}

}
