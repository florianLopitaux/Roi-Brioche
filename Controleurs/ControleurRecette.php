<?php

class ControleurRecette
{
    public function defautAction()
    {
        $O_recette = new Recette();
        Vue::montrer('recette/voir', array('allRecettesResume' =>  $O_recette->getAllRecettesResume()));
    }

    public function voirAction($A_getParam, $A_postParam)
    {
        if (sizeof($A_getParam) == 0 or $A_getParam[0] == '') header('Location: /recette');

        $O_recette = new Recette();
        Vue::montrer('recette/recette', array('recette' =>  $O_recette->getRecetteById($A_getParam[0])));
    }
}