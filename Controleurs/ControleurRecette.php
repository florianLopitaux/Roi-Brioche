<?php

/**
 * Classe qui gère les interactions avec le modèle Recette et les vues de recette.
 */
final class ControleurRecette
{
    /**
     * Fonction qui permet d'afficher toutes les recettes.
     */
    public function defautAction($A_getParam, $A_postParam)
    {
        $O_recette = new Recette();
        if (!isset($_GET['search']) or $_GET['search'] == '') {
            $A_recette = $O_recette->getAllRecettesResume();
            Vue::montrer('recette/voir', array('allRecettesResume' =>  $A_recette, 'titre' => 'Toutes les recettes (' . sizeof($A_recette) . ')'));
        }
        else {
            $A_recettes = $O_recette->getAllRecettesResumeByRecherche($_GET['search']);

            if (sizeof($A_recettes) == 0) {
                $titre = 'Aucune recette trouvée';
            } else {
                $titre = 'Résultats pour : "' . $_GET['search'] . '" (' . sizeof($A_recettes) . ')';
            }
            Vue::montrer('recette/voir', array('allRecettesResume' =>  $A_recettes, 'titre' => $titre));
        }
    }

    /**
     * Fonction qui permet d'afficher une recette.
     *
     * @param $A_getParam : tableau contenant les paramètres de l'url.
     * @param $A_postParam : tableau contenant les paramètres du formulaire.
     */
    public function detailAction($A_getParam, $A_postParam)
    {
        if (sizeof($A_getParam) == 0 or $A_getParam[0] == '') {
            header('Location: /recette');
            exit();
        }

        $O_recette = new Recette();
        Vue::montrer('recette/recette', array('recette' =>  $O_recette->getRecetteById($A_getParam[0])));
    }

    /**
     * Fonction qui permet de supprimer une recette.
     *
     * @param $A_getParam : tableau contenant les paramètres de l'url.
     * @param $A_postParam : tableau contenant les paramètres du formulaire.
     */
    public function supprimerAction($A_getParam, $A_postParam)
    {
        if ($_SESSION['statut'] == 'administrateur' && isset($A_getParam) && $A_getParam[0] != '') {
            $O_recette = new Recette();
            $O_recette->deleteRecette($A_getParam[0]);
            header('Location: /recette');
            exit();
        }
        else {
            header('Location: /recette/voir/' . $A_getParam[0]);
            exit();
        }
    }
}