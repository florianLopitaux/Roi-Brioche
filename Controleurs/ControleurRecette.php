<?php

class ControleurRecette
{
    public function defautAction($A_getParam, $A_postParam)
    {
        $O_recette = new Recette();
        if (sizeof($A_getParam) == 0 or $A_getParam[0] == '') {
            $A_recette = $O_recette->getAllRecettesResume();
            Vue::montrer('recette/voir', array('allRecettesResume' =>  $A_recette, 'titre' => 'Toutes les recettes (' . sizeof($A_recette) . ')'));
        }
        else {
            Vue::montrer('recette/recette', array('recette' =>  $O_recette->getRecetteById($A_getParam[0])));
        }

    }

    public function rechercheAction($A_getParam, $A_postParam)
    {
        if ($_GET['search'] == '') {
            header('Location: /');
            exit();
        }

        $O_recette = new Recette();
        $A_recettes = $O_recette->getAllRecettesResumeByRecherche($_GET['search']);

        if (sizeof($A_recettes) == 0) {
            $titre = 'Aucune recette trouvée';
        } else {
            $titre = 'Résultats pour : "' . $_GET['search'] . '" (' . sizeof($A_recettes) . ')';
        }
        Vue::montrer('recette/voir', array('allRecettesResume' =>  $A_recettes, 'titre' => $titre));
    }
}