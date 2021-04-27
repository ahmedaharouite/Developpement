package batnav.ihm; 

import java.awt.Color;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.JButton;

import batnav.metier.Bateau;
import batnav.metier.GrilleBatailleNavale;
import batnav.metier.Music;
import batnav.metier.Reponse;
import batnav.metier.StatutReponse; 

public class EcouteCaseTableau implements ActionListener { 

	private int x; //Hauteur 
	private int y; //Largeur 
	private JButton caseTableau[][]; 
	private GrilleBatailleNavale grilleBataille; 
	private static boolean music = false;
	private String tavernPlouf = "./src/batnav/ihm/son/plouf.wav";
	private Music plouf = new Music();
	private String tavernExplosion = "./src/batnav/ihm/son/explosion.wav";
	private Music explosion = new Music();
	private String tavernPouw = "./src/batnav/ihm/son/pouw.wav";
	private Music pouw = new Music();
	
	private static int points = 0;
	private static int c = 0;
	
	public EcouteCaseTableau(JButton pfcaseTableau[][],int x,int y,GrilleBatailleNavale grilleBataille) { 

		this.caseTableau=pfcaseTableau; 
		this.x=x; 
		this.y=y; 
		this.grilleBataille = grilleBataille;
	}	
	@Override 
	public void actionPerformed (ActionEvent arg0){

		
		@SuppressWarnings("unused")
		Bateau tabBateau[];
		Reponse reponse = grilleBataille.jouerCoup(y, x); 

		
		if (reponse.getStatut()==StatutReponse.Touche) { 
			
			tabBateau = grilleBataille.getBateaux();
			
			if(music == true) {
				//son
				pouw.setFile(tavernPouw);
				pouw.play();
			}
			
			this.caseTableau[x][y].setText("X");
			points += 15;
			if (reponse.getBateau().getNom()=="Torpilleur 1") { 
				this.caseTableau[x][y].setBackground (Color.red);
			}
			else if (reponse.getBateau().getNom()=="Torpilleur 2") { 
				this.caseTableau[x][y].setBackground (Color.yellow);
			}
			else if (reponse.getBateau().getNom()=="Sous-Marin") { 
				this.caseTableau[x][y].setBackground (Color.MAGENTA);
			}
			else if (reponse.getBateau().getNom()=="Sous-Marin 2") { 
				this.caseTableau[x][y].setBackground (Color.PINK);
			}
		}
		
		else if(reponse.getStatut()==StatutReponse.Plouf) { 
			
			tabBateau = grilleBataille.getBateaux();
			this.caseTableau[x][y].setText("X"); 
			points -= 5;
			
			if(music == true) {
				//son
				plouf.setFile(tavernPlouf);
				plouf.play();
			}
		}
		
		else if( reponse.getStatut()==StatutReponse.Coule ) {
			
			tabBateau = grilleBataille.getBateaux();
			this.caseTableau[x][y].setText("!!"); 
			c ++ ;
			points += 30;
			this.caseTableau[x][y].setBackground (Color.BLACK);	
			
			if(music == true) {
				//son
				explosion.setFile(tavernExplosion);
				explosion.play();
			}
		}			
	}
	
	
	public int getC() {
		return c;
	}
	
	public static void setC() {
		 c = 0;
	}
	
	public JButton getCaseTableau(int x,int y) {
		return this.caseTableau[x][y];
	}
	
	public int getPoints() {
		return points;
	}
	
	public static void setPoints() {
		points = 0;
		
	}
	
	public static void setMusicTrue() {
		music = true;
	}
	
	public static void setMusicFalse() {
		music = false;
	}
	
}

