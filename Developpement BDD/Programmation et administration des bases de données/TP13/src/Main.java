import java.sql.CallableStatement;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.Scanner;

import oracle.jdbc.OracleDriver;


public class Main {

	private static Connection cnx = null ;
	
	public static void main(String[] args) throws Exception {
		try
		{
			
		Scanner sc = new Scanner(System.in);
		System.out.println("Saisir le prenom du joueur :");
		String vPre = sc.nextLine();
		System.out.println("Saisir le nom du joueur :");
		String vNom = sc.nextLine();
		System.out.println("Saisir le genre du joueur :");
		String vGen = sc.nextLine();
		System.out.println("Saisir la nationalité du joueur :");
		String vNat = sc.nextLine();
		System.out.println("Saisir la ville de naissance du joueur :");
		String vVns = sc.nextLine();
		System.out.println("Saisir le pays de naissance du joueur :");
		String vPns = sc.nextLine();
		System.out.println("Saisir la date de naissance du joueur :");
		String vDns = sc.nextLine();
		sc.close();
		
		DriverManager.registerDriver (new OracleDriver()) ;
		String url = "jdbc:oracle:thin:@oracle.iut-blagnac.fr:1521:db11g";
		String user   = "ORA1110" ;
		String passwd = "ahmed2001" ;
		cnx = DriverManager.getConnection(url, user, passwd) ;
		System.out.println("Connexion.");
		
		CallableStatement cs = cnx.prepareCall("{call AjoueterJoueur (?,?,?,?,?,?,?)}") ;
		cs.setString(1, vPre) ;
		cs.setString(2, vNom) ;
		cs.setString(3, vGen) ;
		cs.setString(4, vNat) ;
		cs.setString(5, vVns) ;
		cs.setString(6, vPns) ;
		cs.setString(7, vDns) ;
		cs.execute() ;
		System.out.println("Procédure exécutée.");
		cs.close() ;
		}
		catch(SQLException se)
		{
			switch(se.getErrorCode())
			{
			case 20010 : 
				System.err.println("ERREUR DU SGBD "+se.getErrorCode());
				System.err.println(se.getMessage()) ;
				break ;
//			case 2290 : 
//				System.err.println("ERREUR DU SGBD "+se.getErrorCode());
//				System.err.println(se.getMessage()) ;
//				break ;	
//			case 2291 : 
//				System.err.println("ERREUR DU SGBD "+se.getErrorCode());
//				System.err.println(se.getMessage()) ;
//				break ;	
			default : 
				System.err.println("Erreur imprévue.") ;
				throw se ;
			}
		}
		finally
		{
			if (cnx != null)
				cnx.close() ;
			System.out.println("Déconnexion.");
		}

	}
}