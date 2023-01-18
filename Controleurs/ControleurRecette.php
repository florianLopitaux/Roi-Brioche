<?php

class ControleurRecette
{
    public function defautAction()
    {
        $O_recette = new Recette();
        Vue::montrer('recette/voir', array('allRecettesResume' =>  $O_recette->getAllRecettesResume(), 'titre' => 'Toutes les recettes'));
    }

    public function voirAction($A_getParam, $A_postParam)
    {
        if (sizeof($A_getParam) == 0 or $A_getParam[0] == '') {
            header('Location: /recette');
            exit();
        }

        $O_recette = new Recette();
        Vue::montrer('recette/recette', array('recette' =>  $O_recette->getRecetteById($A_getParam[0])));
    }

    public function rechercheAction($A_getParam, $A_postParam)
    {
        if ($A_postParam['search'] == '') {
            header('Location: /');
            exit();
        }

        $O_recette = new Recette();
        Vue::montrer('recette/voir', array('allRecettesResume' =>  $O_recette->getAllRecettesResumeByRecherche($A_postParam['search']), 'titre' => 'Résultat pour : ' . $A_postParam['search']));
    }
}