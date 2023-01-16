<?php
// Ce fichier est le point d'entrée de votre application

    require 'Noyau/ChargementAuto.php';
    /*
     url pour notre premier test MVC Hello World,
     nous n'avons pas d'action précisée on visera celle par défaut
     /index.php?ctrl=helloworld
     /helloworld
     /controleur/nom_action/whatever/whatever2/

    */
/*
    $S_controleur = isset($_GET['ctrl']) ? $_GET['ctrl'] : null;
    $S_action = isset($_GET['action']) ? $_GET['action'] : null;

    Vue::ouvrirTampon(); //  /Noyau/Vue.php : on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans
    $O_controleur = new Controleur($S_controleur, $S_action);
*/

    // - - - - - - - - - - - - - - - - - - - - - - - PARSER PDO - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    const CHEMIN_VERS_FICHIER_INI = 'connexion.ini';
    const BASE_DE_DONNEES = 'marmitar_bd';
    $A_config = parse_ini_file(CHEMIN_VERS_FICHIER_INI, true);
    if (is_array($A_config)) {
        $A_config = $A_config['serveur_marmitar'];
        $S_dsn = $A_config['type'] . ':dbname=' . BASE_DE_DONNEES . ';host=' . $A_config['adresse_IP'].';port=3306';

        $O_conn= new PDO($S_dsn, $A_config['utilisateur'], $A_config['motdepasse']);
    }

    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    $S_urlADecortiquer = isset($_GET['url']) ? $_GET['url'] : null;
    $A_postParams = isset($_POST) ? $_POST : null;

    Vue::ouvrirTampon(); // on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans

    try
    {
        $O_controleur = new Controleur($S_urlADecortiquer, $A_postParams);
        $O_controleur->executer();
    }
    catch (ControleurException $O_exception)
    {
        echo ('Une erreur s\'est produite : ' . $O_exception->getMessage());
    }


    // Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
    $contenuPourAffichage = Vue::recupererContenuTampon();

    // On affiche le contenu dans la partie body du gabarit général
    Vue::montrer('gabarit', array('body' => $contenuPourAffichage));