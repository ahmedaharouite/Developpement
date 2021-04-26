/**
 *  Classe Memory
 * 
 *  Fournie pour les besoins du projet PWCR-2021
 *  IUT-Blagnac / Fabrice PELLEAU  
 */
const CodeMemory = {
    ERREUR: "erreur",
    CARTE1: "carte1",
    PERDU: "perdu",
    GAGNE: "gagne"
}

class ReponseMemory {
    constructor(code = CodeMemory.ERREUR, carte1 = null, carte2 = null) {
        this.code = code;
        this.carte1 = carte1;
        this.carte2 = carte2;
    }

    getCode() {
        return this.code;
    }

    getCarte1() {
        return this.carte1;
    }

    getCarte2() {
        return this.carte2;
    }
}

class Memory {
    constructor(nbCarte) {
        this.nbCartes = nbCarte;
        this.grille = new Array(this.nbCartes * 2);
        this.trouve = new Array(this.nbCartes * 2);
        this.carte1 = null;
        this.initPartie(true);
    }

    finPartie() {
        for (let i = 0; i < this.trouve.length; i++) {
            if (this.trouve[i] == false) {
                return false;
            }
        }
        return true;
    }

    getNbCartes() {
        return this.nbCartes;
    }

    getValCarte(numCarte) {
        return this.grille[numCarte];
    }

    isCarteTrouvee(numCarte) {
        return this.trouve[numCarte] == true;
    }

    getSizeGrille() {
        return this.grille.length;
    }

    getSizeGrilleTrouve() {
        return this.trouve.length;
    }

    /**
     * Proposer un coup (une carte)
     * @param {*} numCase la case jouée
     * @return un objet ReponseMemory decrivant la valeur du coup
     */
    jouer(numCase) {
        let reponse;
        if (this.trouve[numCase]) {
            reponse = new ReponseMemory();
        } else if (this.carte1 === null) {
            this.carte1 = numCase;
            reponse = new ReponseMemory(CodeMemory.CARTE1, numCase);
        } else if (numCase == this.carte1) {
            reponse = new ReponseMemory();
        } else if (this.grille[numCase] == this.grille[this.carte1]) {
            reponse = new ReponseMemory(CodeMemory.GAGNE, this.carte1, numCase);
            this.trouve[numCase] = true;
            this.trouve[this.carte1] = true;
            this.carte1 = null;
        } else {
            reponse = new ReponseMemory(CodeMemory.PERDU, this.carte1, numCase);
            this.carte1 = null;
        }
        return reponse;
    }

    initPartie(modeSimplifie = true) {
        for (let i = 0; i < this.grille.length; i++) {
            this.grille[i] = Math.floor(i / 2);
        }
        for (let i = 0; i < this.trouve.length; i++) {
            this.trouve[i] = false;
        }
        this.carte1 = null
        if (!modeSimplifie) {
            this.melangerCartes();
        }
    }

    melangerCartes() {
        let i, j, tmp;
        for (i = this.grille.length; i > 0; i--) {
            j = Math.floor(Math.random() * i);
            tmp = this.grille[i - 1];
            this.grille[i - 1] = this.grille[j];
            this.grille[j] = tmp;
        }
    }

    doDiv() {
        let div = document.getElementById('cards');

        while (div.firstChild) {
            div.removeChild(div.firstChild);
        }

        for (let i = 0; i < this.getSizeGrille(); i++) {
            div.insertAdjacentHTML('beforeend',
                '<div class="card" style="width:19.5%">' +
                '<div class="carre" text="' + this.getValCarte(i) + '" id="' + i + '">' +
                '</div></div>'
            );
        }
    }

    doDivFind() {
        let div = document.getElementById("cardsfind");
        let tabTrouve = cleanArray(this.grille);

        while (div.firstChild) {
            div.removeChild(div.firstChild);
        }

        div.insertAdjacentHTML('beforeend',
            '<h3>Cartes à trouver :</h3>');

        for (let i = 0; i < tabTrouve.length; i++) {
            div.insertAdjacentHTML('beforeend',
                '<div class="card" style="width:19.5%">' +
                '<div class="carre" text="' + i + '" id="' + i + 'trouve">' + '<div class="valCard"><h1>' + i + '</h1></div>' +
                '</div></div>'
            );
        }
    }
}

/*
    CLASSE STATISTIQUE
*/

class Statistique {
    //Constructeur paramétré
    constructor(joueur, choixNiveau, choixGrille, nbCoups, coupReussis, coupEchoues, comboMax, vitesse, temps, score) {
        this.joueur = joueur;
        this.choixNiveau = choixNiveau;
        this.choixGrille = choixGrille;
        this.nbCoups = nbCoups;
        this.coupReussis = coupReussis;
        this.coupEchoues = coupEchoues;
        this.comboMax = comboMax;
        this.vitesse = vitesse;
        this.temps = temps;
        this.score = score;
    }

    // récupère le nom
    getName() {
        return this.joueur;
    }

    // récupère le choix du niveau séléctionné 
    getChoixNiveau() {
        return this.choixNiveau;
    }

    // récupère le choix de la grille séléctionnée
    getChoixGrille() {
        return this.choixGrille;
    }

    // récupère le nombre de coups éffectués lors d'une partie
    getNombreCoups() {
        return this.nbCoups;
    }

    // récupère le nombre de coups réussis lors d'une partie
    getCoupReussis() {
        return this.coupReussis;
    }

    // récupère le nombre de coups échoués lors d'une partie
    getCoupEchoues() {
        return this.coupEchoues;
    }

    // récupère le combo maximum atteint lors d'une partie
    getComboMax() {
        return this.comboMax;
    }

    // récupère la vitesse d'une partie en coup/seconde
    getVitesse() {
        return this.vitesse;
    }

    // récupère le temps qu'à durer une partie
    getTemps() {
        return this.temps;
    }

    // récupère le score finale d'une partie
    getScore() {
        return this.score;
    }
}

/*
    CLASSE TABSTATISTIQUE
*/

class TabStatistique {
    // constructeur non paramétré, initialise un tableau de statisqtiques vide
    constructor() {
        this.tabStatistique = new Array();
    }

    // ajoute une nouvelle statistique "stat" dans le tableau de statistiques
    addStatistique(stat) {
        this.tabStatistique.push(stat);
    }

    // ajoute les statistiques dans le tableau des statistiques en HTML
    addStatisqueToHTML() {
        let tbody = document.getElementById("Statistiques");

        for (let i = 0; i < this.tabStatistique.length; i++) {
            tbody.insertAdjacentHTML('afterbegin',
                '<tr>' +
                '<td>' + this.tabStatistique[i].getName() + '</td>' +
                '<td>' + this.tabStatistique[i].getChoixNiveau() + '</td>' +
                '<td>' + this.tabStatistique[i].getChoixGrille() + '</td>' +
                '<td>' + this.tabStatistique[i].getNombreCoups() + '</td>' +
                '<td>' + this.tabStatistique[i].getCoupReussis() + '</td>' +
                '<td>' + this.tabStatistique[i].getCoupEchoues() + '</td>' +
                '<td>' + this.tabStatistique[i].getComboMax() + '</td>' +
                '<td>' + this.tabStatistique[i].getVitesse() + '</td>' +
                '<td>' + this.tabStatistique[i].getTemps() + '</td>' +
                '<td>' + this.tabStatistique[i].getScore() + '</td>' +
                '</tr>'
            );
        }
    }
}

// supprime toutes les redondances dans un tableau
function cleanArray(array) {
    var i, j, len = array.length,
        out = [],
        obj = {};
    for (i = 0; i < len; i++) {
        obj[array[i]] = 0;
    }
    for (j in obj) {
        out.push(j);
    }
    return out;
}

/*
    VARIABLES + VARIABLES STATISTIQUES
*/

let premierClique = true;

let nbCoups = 0;
let coupReussis = 0;
let coupEchoues = 0;
let combo = 1;
let comboMax = combo;
let vitesse = 0;
let temps = 0;

/*
    GRILLE
*/

// evenement clique d'une carte (d'un carrée)
function cliqueCaree() {
    $(".carre").click(function() {
        // affichage du bouton pause
        afficherButtonPause();

        // statistique
        nbCoups++;

        // retourner une carte
        let indice = $(this).attr('id');
        let texte = $(this).attr('text');
        let reponse = memoryGame.jouer(indice);
        let code = reponse.getCode();
        let carte1 = reponse.getCarte1();
        let carte2 = reponse.getCarte2();
        // affichage de la carte retourné
        $(this).html("<div class='valCard'><h1>" + texte + "</h1></div>");

        // lancement du timer lors du premier clique
        if (premierClique) {
            startTimer();
            premierClique = false;
        }

        // paire de deux cartes non identiques
        if (code == "perdu") {
            // statistique
            EnleverPoint();
            coupEchoues += 2;
            combo = 1;
            // retourne les deux cartes après 0.75 secondes
            setTimeout(function() {
                $("#" + carte1).text("");
                $("#" + carte2).text("");
            }, 750);
        } else if (code == "gagne" && carte2 == $(this).attr('id')) { // paire de deux cartes identiques
            // retourne les deux cartes 
            $("carre[text=" + texte + "]").parent(".card").html(texte);
            $("#" + carte1).addClass("carreTrouve");
            $("#" + carte2).addClass("carreTrouve");
            // statistiques
            AjouterPoint(combo);
            coupReussis += 2;
            combo = combo + 1;
            if (comboMax < combo) {
                comboMax = combo;
            }

            // supprime la carte à trouver
            let idTrouve = texte + "trouve";
            $("#" + idTrouve).parent(".card").remove();

            // annimation css
            $("#" + carte1).addClass("moveIt");
            $("#" + carte2).addClass("moveIt");
        }

        // partie gagnée
        if (memoryGame.finPartie()) {
            // annimation css
            setTimeout(function() {
                $(".carre").removeClass("moveIt");
            }, 1000);
            $(".carre").addClass("moveIt");

            // affichage des statistiques après 2 secondes
            setTimeout(function() {
                afficherEndGame();
                masquerGrille();
                masquerTrouve();
                masquerMenu();
                masquerChrono();
                masquerTitre();

                vitesse = Math.round((nbCoups / timePassed) * 100) / 100;
                let statistique = new Statistique(nomJoueur(), choixGrille(), choixNiveau(), nbCoups, coupEchoues, coupReussis, comboMax, vitesse + " coup/sec", timePassed + " sec", score().split(" ")[0]);
                let statistiques = new TabStatistique();
                statistiques.addStatistique(statistique);
                statistiques.addStatisqueToHTML();

                nbCoups = 0;
                coupReussis = 0;
                coupEchoues = 0;
                comboMax = 1;
                combo = 1;
                vitesse = 0;
                temps = 0;
            }, 2000);
        }
    });
}

// affiche la grille
function afficheGrille() {
    let grille = document.getElementById("cards");
    grille.style.display = "block";

    let form = document.getElementById("configuration");
    form.style.display = "none";

}

// retourne la taille de la grille
function initTaille() {
    let option = document.getElementById("choix-grille");
    let nb = parseInt(option.options[option.selectedIndex].value);

    return nb;
}

// retourne les dimensions de la grille sélèctionnées
function choixGrille() {
    let choixGrille = document.getElementById("choix-grille");
    let choix = choixGrille.options[choixGrille.selectedIndex].innerHTML;
    if (choixGrille.selectedIndex == 0) {
        return "5 x 4";
    }
    return choix;
}

// retourne le niveau séléctionné de la partie
function choixNiveau() {
    const niveaux = document.querySelectorAll('input[name="niveau"]');
    let niveau;
    for (const niv of niveaux) {
        if (niv.checked) {
            niveau = niv.id;
            break;
        }
    }

    return niveau.replace('niveau-', '');
}

// initialise une nouvelle partie
function nouvellePartie() {
    taille = initTaille();
    memoryGame = new Memory(taille / 2);
    memoryGame.initPartie(true);
    if (melangerNormal()) {
        memoryGame.melangerCartes();
    }
    memoryGame.doDiv();
}

// retourne le nom du joueur
function nomJoueur() {
    let nom = document.getElementById("player-name").value;
    if (nom == "") {
        return "Anonyme";
    }
    return nom;
}

// initialise le score à 0
function initScore() {
    document.querySelector("#points").textContent = 0 + " points";
}

// retourne le score
function score() {
    return document.querySelector("#points").textContent;
}

// ajoute des points au score + gestion du combo
function AjouterPoint(combo) {
    let points = parseInt(document.querySelector("#points").textContent.split(" ")[0]);
    points = points + 10 * combo;
    if (combo > 1) {
        document.querySelector("#points").textContent = points + " points (x" + combo + ")";
    } else {
        document.querySelector("#points").textContent = points + " points";
    }

}

// enleve des points au score
function EnleverPoint() {
    let points = parseInt(document.querySelector("#points").textContent.split(" ")[0]);
    points = points - 5;
    document.querySelector("#points").textContent = points + " points";
}

// retourne un boolean permettant de savoir si les cartes doivent être mélanger ou non
function melangerNormal() {
    const niveaux = document.querySelectorAll('input[name="niveau"]');
    let niveau;
    let melanger = false;

    for (const niv of niveaux) {
        if (niv.checked) {
            niveau = niv.id;
            break;
        }
    }

    switch (niveau) {
        case "niveau-facile":
            melanger = false;
            break;
        case "niveau-normal":
            melanger = true;
            break;
        case "niveau-difficile":
            melanger = true;
            break;

        default:
            break;
    }

    return melanger;
}

/*
    Affichage et masquage des elements 
*/
function afficherConfiguration() {
    let form = document.getElementById("configuration");
    form.style.display = "block";
}

function masquerConfiguration() {
    let form = document.getElementById("configuration");
    form.style.display = "none";
}

function afficherChrono() {
    let chrono = document.getElementById("chrono");
    let checked = document.getElementById("temps").checked
    if (checked == true) {
        chrono.style.display = "block";
    } else {
        chrono.style.display = "none";
    }
}

function afficherScore() {
    let score = document.getElementById("score_div");
    let checked = document.getElementById("score").checked
    if (checked == true) {
        score.style.display = "block";
    } else {
        score.style.display = "none";
    }
}

function masquerChrono() {
    let chrono = document.getElementById("chrono");
    chrono.style.display = "none";
}

function afficherGrille() {
    let grille = document.getElementById("cards");
    grille.style.display = "block";
}

function masquerGrille() {
    let grille = document.getElementById("cards");
    grille.style.display = "none";
}

function afficherTrouve() {
    let grille = document.getElementById("cardsfind");
    grille.style.display = "block";
}

function masquerTrouve() {
    let grille = document.getElementById("cardsfind");
    grille.style.display = "none";
}

function afficherMenu() {
    document.getElementById("menu_game").style.display = "block";
    document.getElementById("menu_score").style.display = "block";
}

function masquerMenu() {
    document.getElementById("menu_game").style.display = "none";
    document.getElementById("menu_score").style.display = "none";
}

function afficherEndGame() {
    let endGame = document.getElementById("end_game");
    endGame.style.display = "block";
}

function masquerEndGame() {
    let endGame = document.getElementById("end_game");
    endGame.style.display = "none";
}

function afficherTitre() {
    let titre = document.getElementById("titre");
    titre.style.display = "block";
}

function masquerTitre() {
    let titre = document.getElementById("titre");
    titre.style.display = "none";
}

function afficherButtonReprendre() {
    let buttonReprendre = document.getElementById("buttonReprendre");
    buttonReprendre.style.display = "block";
}

function masquerButtonReprendre() {
    let buttonReprendre = document.getElementById("buttonReprendre");
    buttonReprendre.style.display = "none";
}

function afficherButtonPause() {
    let buttonPause = document.getElementById("buttonPause");
    buttonPause.style.display = "block";
}

function masquerButtonPause() {
    let buttonPause = document.getElementById("buttonPause");
    buttonPause.style.display = "none";
}

/*
    Fonctions associées aux boutons
*/

// bouton recommencer dans les statistiques
function recommencerStat() {
    masquerEndGame();
    afficherConfiguration();
    initScore();
    nbCoups = 0;
    coupReussis = 0;
    coupEchoues = 0;
    comboMax = 1;
    combo = 1;
    vitesse = 0;
    temps = 0;
}

// bouton recommencer dans le menu
function recommencerMenu() {
    masquerGrille();
    masquerTrouve();
    masquerMenu();
    afficherConfiguration();
    initScore();
    nbCoups = 0;
    coupReussis = 0;
    coupEchoues = 0;
    comboMax = 1;
    combo = 1;
    vitesse = 0;
    temps = 0;
}

// bouton jouer dans le menu configuration (formulaire)
function submitForm() {
    masquerConfiguration();
    afficherMenu();
    afficherChrono();
    afficherScore();
    afficherGrille();
    afficherTrouve();
    initTaille();
    nouvellePartie();
    cliqueCaree();
    premierClique = true;
    memoryGame.doDivFind();
}