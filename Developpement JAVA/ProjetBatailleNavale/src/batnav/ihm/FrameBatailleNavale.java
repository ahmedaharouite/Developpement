package batnav.ihm;


import java.awt.*;
import java.awt.event.*;
import java.text.DecimalFormat;

import javax.swing.*;

import batnav.metier.Bateau;
import batnav.metier.Chrono;
import batnav.metier.GrilleBatailleNavale;
import batnav.metier.Music;
import batnav.metier.PanelAvecImage;


public class FrameBatailleNavale extends JFrame implements ActionListener {

	//Actions
	static final String ACTION_JOUER = "JOUER";
	static final String ACTION_QUITTER = "QUITTER";
	static final String ACTION_AIDE = "AIDE";
	static final String ACTION_APROPOS = "A PROPOS DE";
	static final String ACTION_REGLES = "REGLES";
	static final String ACTION_VALIDER = "VALIDER";
	static final String ACTION_RECOMMENCER = "RECOMMENCER";
	static final String	ACTION_SON_JEU = "SONJEU";
	static final String	ACTION_SON_MUSIC = "SONMUSIC";

	//Chrono
	private static Chrono temps = new Chrono();

	//Music
	private String tavernMusic = "./src/batnav/ihm/son/sonJeu.wav";
	private Music mu = new Music();
	private String tavernGagne = "./src/batnav/ihm/son/gagne.wav";
	private Music gagne = new Music();
	private String tavernPerdu = "./src/batnav/ihm/son/perdre.wav";
	private Music perdre = new Music();
	private JRadioButton sonduJeu = new JRadioButton("son du jeu");
	private JRadioButton sonMusic = new JRadioButton("son de la musique");
	private JPanel panelChoixSon = new JPanel();
	private JLabel son = new JLabel("Réglage du son");

	//PanelDroite
	private JPanel panelDroite = new JPanel();
	private JLabel scoretxt = new JLabel();
	private JLabel score = new JLabel();
	private JLabel bateauCouletxt = new JLabel();
	private JLabel bateauCoule = new JLabel();
	private JLabel dureetxt = new JLabel();
	private JLabel duree = new JLabel();

	//PanelFond
	private PanelAvecImage fond = new PanelAvecImage("/batnav/ihm/image/fond.png");

	//PanelHaut
	private JTextField zoneTexte = new JTextField();

	//PanelBas
	private JPanel panelBas = new JPanel();
	private JButton butJouer = new JButton("JOUER");
	private JButton butQuitter = new JButton("QUITTER");

	//PanelCentre
	private JPanel panelCentre = new JPanel();

	//PanelChargement
	private JPanel panelChargement = new JPanel();

	//PanelBasChargement
	private JPanel panelBasChargement = new JPanel();
	private JButton butValider = new JButton("VALIDER");

	//PanelCentreChargement
	private JPanel panelCentreChargement = new JPanel();
	private JPanel panelChoix1 = new JPanel();
	private JPanel panelChoix2 = new JPanel();
	private JLabel param = new JLabel("PARAMETRE DE JEU :");
	private JLabel nbBat = new JLabel("Dimension de la grille");
	private JRadioButton button35bat = new JRadioButton("5x3");
	private JRadioButton button3bat = new JRadioButton("3x3");
	private JRadioButton button4bat = new JRadioButton("4x4");
	private JRadioButton button5bat = new JRadioButton("5x5");
	private JRadioButton button6bat = new JRadioButton("6x6");
	private JRadioButton button7bat = new JRadioButton("7x7");
	private JRadioButton button8bat = new JRadioButton("8x8");
	private JRadioButton button9bat = new JRadioButton("9x9");

	//PanelCentreVictoire
	private JPanel PanelCentreVictoire = new JPanel();
	private JLabel victoire = new JLabel();

	//PanelCentrePerdre
	private JPanel PanelCentrePerdre = new JPanel();
	private JLabel defaite = new JLabel();

	//PanelBasJouer
	private JButton butRecommencer = new JButton("RECOMMENCER");
	private int nbrBat;


	//GrillemonJeu
	private int l=3 , h=5;
	private JButton caseTableau[][] = null;
	private Bateau[] mesBateaux = { new Bateau("Torpilleur 1", 2), new Bateau("Torpilleur 2",2),new Bateau("Sous-Marin", 3),};
	private Bateau[] mesBateaux2 = { new Bateau("Torpilleur 1", 2), new Bateau("Torpilleur 2",3),new Bateau("Sous-Marin", 4),new Bateau("Sous-Marin 2", 5)};
	private GrilleBatailleNavale grillemonJeu;

	//Police
	private Font police = new Font("Arial", Font.BOLD, 20);

	//VersionUID
	private static final long serialVersionUID = 4089772491519871578L;

	public FrameBatailleNavale() {
		super();

		// Paramétrage des composants principaux
		this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		this.setTitle("Bataille Navale");
		this.setLocationRelativeTo(null);
		Font titre = new Font("Arial", Font.BOLD, 30);
		Font vic = new Font("Arial", Font.BOLD, 50);

		//Création de la page du jeu

		/* Parametrage des composants */

		butJouer.setBackground(Color.GREEN);
		butJouer.setFont(police);

		butQuitter.setBackground(Color.RED);
		butQuitter.setFont(police);

		butRecommencer.setBackground(Color.GREEN);
		butRecommencer.setFont(police);

		zoneTexte.setText("LA BATAILLE NAVALE");
		zoneTexte.setEditable(false);
		zoneTexte.setHorizontalAlignment(JLabel.CENTER);
		zoneTexte.setBackground(Color.GRAY);
		zoneTexte.setFont(titre);

		scoretxt.setText("  SCORE  ");
		scoretxt.setFont(police);
		scoretxt.setHorizontalAlignment(JLabel.CENTER);

		score.setHorizontalAlignment(JLabel.CENTER);
		score.setBackground(Color.ORANGE);
		score.setFont(police);
		score.setText("0 points");

		bateauCouletxt.setHorizontalAlignment(JLabel.CENTER);
		bateauCouletxt.setBackground(Color.ORANGE);
		bateauCouletxt.setFont(police);
		bateauCouletxt.setText("COULE");

		bateauCoule.setHorizontalAlignment(JLabel.CENTER);
		bateauCoule.setBackground(Color.ORANGE);
		bateauCoule.setFont(police);
		bateauCoule.setText(" 0/"+nbrBat+" bat");

		dureetxt.setHorizontalAlignment(JLabel.CENTER);
		dureetxt.setBackground(Color.ORANGE);
		dureetxt.setFont(police);
		dureetxt.setText("TEMPS");

		duree.setHorizontalAlignment(JLabel.CENTER);
		duree.setBackground(Color.ORANGE);
		duree.setFont(police);
		duree.setText("XX sec");


		victoire.setHorizontalAlignment(JLabel.CENTER);
		victoire.setVerticalAlignment(JLabel.CENTER);
		victoire.setBackground(Color.WHITE);
		victoire.setFont(vic);
		victoire.setText("VICTOIREEEE");

		defaite.setHorizontalAlignment(JLabel.CENTER);
		defaite.setVerticalAlignment(JLabel.CENTER);
		defaite.setBackground(Color.WHITE);
		defaite.setFont(vic);
		defaite.setText("PERDUUUUU");


		son.setFont(police);

		/* Assemblage des composants */
		getContentPane().setLayout(new BorderLayout());
		getContentPane().add (fond,BorderLayout.CENTER);
		getContentPane().add(panelBas, BorderLayout.SOUTH);
		getContentPane().add(panelDroite, BorderLayout.EAST);
		//getContentPane().add(panelChargement,BorderLayout.CENTER);

		panelBas.setLayout(new GridLayout(1, 2));
		panelBas.add(butJouer);
		panelBas.add(butQuitter);

		//		panelBasJouer.setLayout(new GridLayout(1, 2)

		panelDroite.setLayout(new GridLayout(3, 2));
		panelDroite.add(scoretxt);
		panelDroite.add(score);
		panelDroite.add(bateauCouletxt);
		panelDroite.add(bateauCoule);
		panelDroite.add(dureetxt);
		panelDroite.add(duree);
		panelDroite.setBackground(Color.ORANGE);
		panelDroite.setVisible(false);


		panelCentre.setLayout(new GridLayout(h,l));
		panelCentre.setBackground(Color.BLUE);
		panelCentre.setVisible(false);

		PanelCentreVictoire.setLayout(new GridLayout(1,1));
		PanelCentreVictoire.setBackground(Color.GRAY);
		PanelCentreVictoire.add(victoire);

		PanelCentrePerdre.setLayout(new GridLayout(1,1));
		PanelCentrePerdre.setBackground(Color.GRAY);
		PanelCentrePerdre.add(defaite);

		/* Gestion des evenements */
		butJouer.setActionCommand(ACTION_JOUER);
		butQuitter.setActionCommand(ACTION_QUITTER);
		butRecommencer.setActionCommand(ACTION_RECOMMENCER);

		butJouer.addActionListener(this);
		butQuitter.addActionListener(this);
		butRecommencer.addActionListener(this);


		//Création de la page de chargement 

		/* Parametrage des composants */

		param.setFont(police);
		param.setHorizontalAlignment(JLabel.LEFT);
		panelCentreChargement.add(param);

		nbBat.setFont(police);
		nbBat.setHorizontalAlignment(JLabel.LEFT);

		panelCentreChargement.add(son);

		panelCentreChargement.add(panelChoixSon);
		panelCentreChargement.add(nbBat);
		panelCentreChargement.add(panelChoix1);
		panelCentreChargement.add(panelChoix2);

		button35bat.setBackground(Color.GRAY);
		button35bat.setFont(police);
		button35bat.setHorizontalTextPosition(JRadioButton.CENTER);
		button35bat.setVerticalTextPosition(JRadioButton.BOTTOM);
		panelChoix1.add(button35bat);

		button3bat.setBackground(Color.GRAY);
		button3bat.setFont(police);
		button3bat.setHorizontalTextPosition(JRadioButton.CENTER);
		button3bat.setVerticalTextPosition(JRadioButton.BOTTOM);
		panelChoix1.add(button3bat);

		button4bat.setBackground(Color.GRAY);
		button4bat.setFont(police);
		button4bat.setHorizontalTextPosition(JRadioButton.CENTER);
		button4bat.setVerticalTextPosition(JRadioButton.BOTTOM);
		panelChoix1.add(button4bat);

		button5bat.setBackground(Color.GRAY);
		button5bat.setFont(police);
		button5bat.setHorizontalTextPosition(JRadioButton.CENTER);
		button5bat.setVerticalTextPosition(JRadioButton.BOTTOM);
		panelChoix1.add(button5bat);

		button6bat.setBackground(Color.GRAY);
		button6bat.setFont(police);
		button6bat.setHorizontalTextPosition(JRadioButton.CENTER);
		button6bat.setVerticalTextPosition(JRadioButton.BOTTOM);
		panelChoix2.add(button6bat);

		button7bat.setBackground(Color.GRAY);
		button7bat.setFont(police);
		button7bat.setHorizontalTextPosition(JRadioButton.CENTER);
		button7bat.setVerticalTextPosition(JRadioButton.BOTTOM);
		panelChoix2.add(button7bat);

		button8bat.setBackground(Color.GRAY);
		button8bat.setFont(police);
		button8bat.setHorizontalTextPosition(JRadioButton.CENTER);
		button8bat.setVerticalTextPosition(JRadioButton.BOTTOM);
		panelChoix2.add(button8bat);

		button9bat.setBackground(Color.GRAY);
		button9bat.setFont(police);
		button9bat.setHorizontalTextPosition(JRadioButton.CENTER);
		button9bat.setVerticalTextPosition(JRadioButton.BOTTOM);
		panelChoix2.add(button9bat);

		ButtonGroup grp = new ButtonGroup();
		grp.add(button35bat);
		grp.add(button3bat);
		grp.add(button4bat);
		grp.add(button5bat);
		grp.add(button6bat);
		grp.add(button7bat);
		grp.add(button8bat);
		grp.add(button9bat);

		butValider.setBackground(Color.GREEN);
		butValider.setFont(police);
		butValider.setHorizontalTextPosition(JRadioButton.CENTER);

		sonduJeu.setBackground(Color.GRAY);
		sonduJeu.setFont(police);
		sonduJeu.setHorizontalTextPosition(JRadioButton.RIGHT);
		sonduJeu.setVerticalTextPosition(JRadioButton.CENTER);
		panelChoixSon.add(sonduJeu);

		sonMusic.setBackground(Color.GRAY);
		sonMusic.setFont(police);
		sonMusic.setHorizontalTextPosition(JRadioButton.RIGHT);
		sonMusic.setVerticalTextPosition(JRadioButton.CENTER);
		panelChoixSon.add(sonMusic);


		/* Assemblage des composants */

		panelChargement.setLayout(new BorderLayout());
		panelChargement.add(panelBasChargement);
		panelChargement.add(panelCentreChargement);

		panelCentreChargement.setLayout(new GridLayout(7,1));
		panelCentreChargement.setBackground(Color.GRAY);
		panelCentreChargement.setVisible(true);

		panelChoixSon.setLayout(new GridLayout(1,4));
		panelChoixSon.setAlignmentX(JPanel.CENTER_ALIGNMENT);
		panelChoixSon.setSize(250, 250);
		panelChoixSon.setBackground(Color.GRAY);

		panelChoix1.setLayout(new GridLayout(1,4));
		panelChoix1.setAlignmentX(JPanel.CENTER_ALIGNMENT);
		panelChoix1.setSize(250, 250);
		panelChoix1.setBackground(Color.GRAY);

		panelChoix2.setLayout(new GridLayout(1,4));
		panelChoix2.setAlignmentX(JPanel.CENTER_ALIGNMENT);
		panelChoix2.setSize(250, 250);
		panelChoix2.setBackground(Color.GRAY);

		panelBasChargement.setLayout(new GridLayout(1,1));
		panelBasChargement.add(butValider);

		// Gestion des evenements
		butValider.setActionCommand(ACTION_VALIDER);
		butValider.addActionListener(this);

		sonduJeu.setActionCommand(ACTION_SON_JEU);
		sonduJeu.addActionListener(this);

		sonMusic.setActionCommand(ACTION_SON_MUSIC);
		sonMusic.addActionListener(this);


		//Menu

		JMenuBar menuBar = new JMenuBar();
		this.setJMenuBar(menuBar);

		JMenu menu = new JMenu("MENU");
		menuBar.add(menu);

		JMenuItem jouer = new JMenuItem("JOUER");
		jouer.setActionCommand(ACTION_JOUER);
		jouer.addActionListener(this);
		menu.add(jouer);

		JMenuItem quitter = new JMenuItem("QUITTER");
		quitter.setActionCommand(ACTION_QUITTER);
		quitter.addActionListener(this);
		menu.add(quitter);

		menu.addSeparator();

		JMenuItem regles = new JMenuItem("REGLES");
		regles.setActionCommand(ACTION_REGLES);
		regles.addActionListener(this);
		menu.add(regles);

		JMenuItem aide = new JMenuItem("AIDE");
		aide.setActionCommand(ACTION_AIDE);
		aide.addActionListener(this);
		menu.add(aide);

		JMenuItem apropos = new JMenuItem("A PROPOS DE");
		apropos.setActionCommand(ACTION_APROPOS);
		apropos.addActionListener(this);
		menu.add(apropos);

		//FIN
		
		this.setSize( new Dimension(740, 475));
		this.setResizable(false);
	}



	@Override
	public void actionPerformed(ActionEvent e) {


		if ( e.getActionCommand() == ACTION_JOUER) {	

			//System.out.println(grillemonJeu.toString());
			getContentPane().add (panelCentreChargement,BorderLayout.CENTER);
			getContentPane().add (zoneTexte,BorderLayout.NORTH);
			panelBas.setVisible(false);
			panelDroite.setVisible(false);
			getContentPane().add (panelBasChargement,BorderLayout.SOUTH);

			fond.setVisible(false);
			panelCentre.setVisible(false);

			//mise en place du jeu 
			l = 3;
			h = 5;

			button35bat.setSelected(true);


		}


		else if ( e.getActionCommand() == ACTION_VALIDER) {			

			panelCentreChargement.setVisible(false);
			panelBasChargement.setVisible(false);


			panelBas.setVisible(true);
			panelDroite.setVisible(true);
			panelCentre.setVisible(true);

			//Chrono
			temps.start();

			//System.out.println(grillemonJeu.toString());
			getContentPane().add (panelCentre,BorderLayout.CENTER);
			getContentPane().add (panelBas,BorderLayout.SOUTH);


			panelBas.remove(butJouer);
			panelBas.remove(butQuitter);
			panelBas.add(butRecommencer);
			panelBas.add(butQuitter);

			//mise en place du jeu 
			if (button35bat.isSelected()) {
				l = 3;
				h = 5;
				grillemonJeu = new GrilleBatailleNavale(h, l, mesBateaux);
				nbrBat = 3;
			}
			else if (button3bat.isSelected()) {
				l = 3;
				h = 3;
				grillemonJeu = new GrilleBatailleNavale(h, l, mesBateaux);
				nbrBat = 3;
			}
			else if (button4bat.isSelected()) {
				l = 4;
				h = 4;
				grillemonJeu = new GrilleBatailleNavale(h, l, mesBateaux);
				nbrBat = 3;
			}
			else if (button5bat.isSelected()) {
				l = 5;
				h = 5;
				grillemonJeu = new GrilleBatailleNavale(h, l, mesBateaux);
				nbrBat = 3;
			}
			else if (button6bat.isSelected()) {
				l = 6;
				h = 6;
				grillemonJeu = new GrilleBatailleNavale(h, l, mesBateaux2);
				nbrBat = 4;
			}
			else if (button7bat.isSelected()) {
				l = 7;
				h = 7;
				grillemonJeu = new GrilleBatailleNavale(h, l, mesBateaux2);
				nbrBat = 4;
			}
			else if (button8bat.isSelected()) {
				l = 8;
				h = 8;
				grillemonJeu = new GrilleBatailleNavale(h, l, mesBateaux2);
				nbrBat = 4;
			}

			else if (button9bat.isSelected()) {
				l = 9;
				h = 9;
				grillemonJeu = new GrilleBatailleNavale(h, l, mesBateaux2);
				nbrBat = 4;
			}


			caseTableau= new JButton[l][h];


			panelCentre.setLayout(new GridLayout(l,h));

			for (int i = 0; i<l; i ++) {
				for (int j = 0; j <h; j ++) {
					caseTableau [i][j] = new JButton ();  
					panelCentre.add (caseTableau [i][j]);  

					EcouteCaseTableau ecouteCaseTableau = new EcouteCaseTableau (caseTableau, i, j, grillemonJeu);

					caseTableau[i][j].addActionListener(new ActionListener() {

						@Override
						public void actionPerformed(ActionEvent e) {
							bateauCoule.setText(Integer.toString(ecouteCaseTableau.getC())+ "/"+nbrBat +" bat");
							score.setText(Integer.toString(ecouteCaseTableau.getPoints())+ " pts");
							if(ecouteCaseTableau.getC() == nbrBat) {
								panelCentre.setVisible(false);

								getContentPane().add(PanelCentreVictoire,BorderLayout.CENTER);
								PanelCentreVictoire.setVisible(true);

								//son
								gagne.setFile(tavernGagne);
								gagne.play();

								//Chrono
								temps.stop();
								DecimalFormat df = new DecimalFormat("#.00");
								duree.setText(df.format(temps.getDureeSec())+ " s");

							}
							if (ecouteCaseTableau.getPoints()== -50) {
								panelCentre.setVisible(false);

								getContentPane().add(PanelCentrePerdre,BorderLayout.CENTER);
								PanelCentrePerdre.setVisible(true);

								//son
								perdre.setFile(tavernPerdu);
								perdre.play();

								//Chrono
								temps.stop();
								DecimalFormat df = new DecimalFormat("#.00");
								duree.setText(df.format(temps.getDureeSec())+ " s");


							}
						}
					});


					caseTableau[i][j].addActionListener (ecouteCaseTableau);  
					caseTableau[i][j].setBackground (Color.BLUE);
					caseTableau[i][j].setForeground(java.awt.Color.WHITE);
					caseTableau[i][j].setFont(police);


				}
			}
		}


		else if ( e.getActionCommand() == ACTION_RECOMMENCER) {
			getContentPane().add (panelCentreChargement,BorderLayout.CENTER);
			getContentPane().add (zoneTexte,BorderLayout.NORTH);
			panelBas.setVisible(false);
			panelDroite.setVisible(false);
			getContentPane().add (panelBasChargement,BorderLayout.SOUTH);

			score.setText("0 pts");
			duree.setText("XX sec");
			bateauCoule.setText("0/" + nbrBat + " bat");

			panelCentre.setVisible(false);

			panelCentreChargement.setVisible(true);
			panelBasChargement.setVisible(true);

			getContentPane().add(panelCentre,BorderLayout.CENTER);
			PanelCentreVictoire.setVisible(false);
			PanelCentrePerdre.setVisible(false);

			grillemonJeu.initialiserGrille();
			for (int i = 0; i<l; i ++) {
				for (int j = 0; j <h; j ++) {
					EcouteCaseTableau.setC();
					EcouteCaseTableau.setPoints();
					caseTableau [i][j] = new JButton ();  
					panelCentre.removeAll();
				}
			}	

		}

		else if ( e.getActionCommand() == ACTION_QUITTER) {
			int reponse = JOptionPane.showConfirmDialog(this,
					"Si vous quitter maintenant,\ntoutes vos modifications seront perdues.\nVoulez vous réellement quitter l'application ?","Quitter l'application?",
					JOptionPane.YES_NO_OPTION, JOptionPane.WARNING_MESSAGE);

			switch (reponse) {
			case JOptionPane.YES_OPTION:
				System.exit(0);
				break;
			case JOptionPane.NO_OPTION:
				JOptionPane.showMessageDialog(this, "OK on reste encore un peu...");
				break;
			default:
				System.out.println("J'ai pas compris");
				break;
			}
		}

		else if ( e.getActionCommand() == ACTION_REGLES) {
			JOptionPane.showMessageDialog(this, "Règles du jeu: \n\nLa Bataille Navale est un jeu similaire au Touché-coulé qui se déroule sur un plateu de jeu rectangulaire (une grille). "
					+ "\nL’ordinateur fabrique une grille secrète sur laquelle il positionne trois bateaux de tailles différentes."
					+ "\nVotre objectif est de couler toute sa flotte le plus rapidement possible.");

		}

		else if ( e.getActionCommand() == ACTION_AIDE) {
			JOptionPane.showMessageDialog(this, "Objectif du jeu: \n\nVotre objectif est de couler toute sa flotte le plus rapidement possible.\n\nSi vous toucher une case de la grille:\n"
					+ "		\tElle devient bleu car la case ne touche pas de bateau.\n		\tElle se colore car la case touche un bateau.\n		\tElle devient noir car la case coule un bateau.");

		}

		else if ( e.getActionCommand() == ACTION_APROPOS) {
			JOptionPane.showMessageDialog(this, "Auteur du jeu: Ahmed Aharouite\n\nDate de création: 14/05/2020\n\nVersion du jeu: 1.0 \n\nDévellopé par JAVAMED INDUSTRY");

		}

		else if ( e.getActionCommand() == ACTION_SON_JEU) {

			if(sonduJeu.isSelected() == true) {
				EcouteCaseTableau.setMusicTrue();
			}
			else {
				EcouteCaseTableau.setMusicFalse();
			}

		}

		else if ( e.getActionCommand() == ACTION_SON_MUSIC) {

			if(sonMusic.isSelected() == true) {
				//son
				mu.setFile(tavernMusic);
				mu.loop();
			}
			else {
				mu.stop();
			}
		}
	}
}


