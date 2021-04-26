// -----------------------------------------------------------------------
// -- verifier qu'une valeur est numerique
// -----------------------------------------------------------------------
function check_numeric(champ, nomchamp) {
    // un champ vide est consideré comme valide et valant 0 (c'est un choix)
    if (champ.value == '') {
        champ.value = 0;
        return true;
    }
    champ.value = champ.value.replace(',', '.');
    conv = parseFloat(champ.value);
    if (champ.value != conv) {
        alert('Le champ > ' + nomchamp + ' < doit avoir une valeur numerique');
        champ.select();
        champ.focus();
        return false;
    } else {
        return true;
    }
}
// -----------------------------------------------------------------------
// -- verifier qu'une valeur numerique est dans l'interval [vmin..vmax]
// -----------------------------------------------------------------------
function check_valnum(champ, nomchamp, vmin, vmax) {
    // la valeur doit avant tout etre numerique
    if (!check_numeric(champ, nomchamp)) {
        return false;
    }

    // TODO : tester que le nombre est dans l'interval
    if (champ.value < vmin || champ.value > vmax) {
        alert('Le champ > ' + nomchamp + ' < doit avoir une valeur numerique et etre compris entre ' + vmin + ' et ' + vmax);
        return false;
    } else {
        return true;
    }
}
// -----------------------------------------------------------------------
// -- verifier qu'un champ a une taille comprise en lmin et lmax
// -----------------------------------------------------------------------
function check_size(champ, nomchamp, lmin, lmax) {
    // TODO : tester la taille du champ
    var taille = champ.value.length;
    console.log(taille);
    if (taille < lmin || taille > lmax) {
        alert('Le champ > ' + nomchamp + ' < doit avoir etre ' + lmin + ' charactères et ' + lmax);
        return false;
    } else {
        return true;
    }
}

function check_codePostal(champ, nomchamp) {
    // Test que la taille du champ est égale à 5
    if (champ.value.length < 5 && champ.value.length >= 0) {
        alert('Le champ > ' + nomchamp + ' < doit avoir 5 chiffres');
        return false;
    }
    // Test que le champ est un nombre
    if (isNaN(champ.value) == true) {
        alert('Le champ > ' + nomchamp + ' ne peut pas contenir de lettres');
        return false;
    }
    // Test de l'existance du champ
    if (champ.value < 1000 || champ.value > 99999) {
        alert('Le champ > ' + nomchamp + " n'est pas valide");
        return false;
    }
    //Si aucuns tests ne passent :  
    return true;
}

function check_color(champ, nomchamp) {
    //Test que le champ n'est pas celui par défaut (aucune couleur séléctionné)
    if (champ.selectedIndex == 0) {
        alert('Le champ > ' + nomchamp + ' < est obligatoire');
        return false;
    } else {
        return true;
    }
}
function validation() {
	if (	check_numeric( document.form1.chiffre1, "Chiffre 1" )
		 &&	check_numeric( document.form1.chiffre2, "Chiffre 2" )
		 // TODO : ajouter les tests pertinants
		 && check_valnum( document.form1.chiffre2, "Chiffre 2", -10, 10 )
		 && check_size( document.form1.pseudo, "Pseudo", 3, 10 )
		 && check_size( document.form1.passwd, "Mot de passe", 8, 12 )
		 && check_codePostal( document.form1.codepostal, "Code Postal" )
		 && check_color( document.form1.couleur,  "Votre couleur préférée" )
		)
	{
		// Le formulaire est valide
		alert("C'est bon");
		// Est-ce que c'est ici qu'on ajoute une ligne du genre : 
		// document.form1.submit();
		// ?
		// Oui, cela soumet le formulaire
	} else {
		// La validation n'est pas faite
		alert("Ce n'est pas bon");
	}
}