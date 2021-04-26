/*
 *	TP 5 : Évènements Tableaux et Onglets
*/

// Au chargement de la page 
$(document).ready(function(){
	/*
		EXEMPLE 
		Classe "active" sur les items cliqués dans le menu par onglet
	*/	
	// Variables contenant l'ensemble des liens du menu par onglet :
	var $ongletItems = $(".onglets a");
	// Fonction déclenchées quand on clique sur l'un de ces items
	$ongletItems.click(function(){	
		// On enlève la classe sur tous les items
		$ongletItems.removeClass("active");	
		// On met la classe active sur l'item qui a été cliqué
		$(this).addClass("active");
		// Annule l'action par défaut (soit le déplacement du focus sur l'ancre correspondant à ce lien)
		return false;
	});

	/*
		EXERCICE 1
		Cacher les tableaux.
		Quand on clique sur un onglet, le tableau lié apparaît.
		Le cas échéant, les autres tableaux disparaissent.
		Astuce :
		$cible.css("display","none") cache un élément et $cible.css("display","block") le remontre (pour un élément de type bloc).
	*/
	
	// Initialisation des elements
	var $npdc = $("#reg15"); // Tableau Nord Pas de Calais
	var $centre = $("#reg5"); // Tableau Centre
	var $lorraine = $("#reg21"); // Tableau Lorraine
	var $cible = $("table"); // Tableaux de la page
	
	// Mise en place de l'evenement click sur l'element ongletItems
	$ongletItems.click(function(){	
		// Test: Lien et leur "tableau" associé
		if ($(this).text() == "Nord Pas de Calais"){
			// Exemple: Si le texte du lien est le même que le nom (<caption>) d'un tableau
			// On cache tous les tableaux
			$cible.css("display","none"); 
			// On affiche le tableau sélectionné par le lien
			$npdc.css("display","block");
		}
		else if ($(this).text() == "Centre"){
			$cible.css("display","none"); 
			$centre.css("display","block");
		}
		else if ($(this).text() == "Lorraine"){
			$cible.css("display","none"); 
			$lorraine.css("display","block");
		}
	});
	
	
	/*
		EXERCICE 2
		Dans le conteneur («div#conteneur»), ajouter l'élément suivant :
		<div id="loupe"></div>
		Masqué par défaut, cet élément apparaît quand on survole une cellule. Il affiche alors le contenu de la cellule.		
	*/
	
	// Ajout de l'élément (<div id="loupe"></div>) dans le conteneur («div#conteneur»)
	$("div#conteneur").append("<div id='loupe'</div>");
	// Masqué par défaut
	var $divLoupe = $("#loupe");
	$divLoupe.hide();

		
	/*
		EXERCICE 3
		Quand une cellule est survolée, les cellules de la même ligne et de la même colonne prennent la classe on.
		La cellule survolée prend la classe active.
		Astuce :
		Dans cette page, on peut retrouver les cellules d'une même colonne grâce à leur attribut "headers". 
		En effet, sa valeur est l'identifiant de la tête de la colonne.
		Si vous ne l'avez pas fait avant, regardez également la documentation de parents(), find() et filter()
	*/
	
	var $cellule = $("td,th");

	// Mise en place de l'evenement mouseover sur l'element cellule
	$cellule.mouseover(function(){	
		// Les cellules de la même ligne prennent la classe on
		var $ligne = $(this).parent("tr");
		$ligne.children('td,th').addClass("on");
		// Les cellules de la même colonne prennent la classe on
		var $colonne = $("td[headers=" + $(this).attr('headers')+ "], th[headers="+$(this).attr('headers')+"], th[id="+$(this).attr('headers')+"]"); 
		$colonne.addClass("on");
		// La cellule survolée prend la classe active
		$(this).addClass("active");
		//exo 2 : Contenu de la div loupe + show
		$divLoupe.html($(this).text());
		$divLoupe.show();
	});
	
	// Mise en place de l'evenement mouseout sur l'element cellule
	$cellule.mouseout(function(){	
		// Supression des classes sur les cellules + exo 2 : hide
		$cellule.removeClass("on");	
		$cellule.removeClass("active");	
		$divLoupe.hide();
	});

});	// Fin des instructions envoyées au chargement de la page
