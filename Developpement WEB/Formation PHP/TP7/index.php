<?php
// Index.php : cette page recoit toutes les
// requetes http du site web puis appelle le routeur afin
//que ce dernier appelle la bonne méthode du bon contrôleur
require 'Controleur/Routeur.php';
$routeur = new Routeur();
$routeur->routerRequete(); 