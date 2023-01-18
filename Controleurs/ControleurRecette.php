<?php

class ControleurRecette
{
    public function defautAction()
    {
        $O_recette = new Recette();
        Vue::montrer('recette/voir', array('allRecettesResume' =>  $O_recette->getAllRecettesResume()));
    }

    // TODO Après avoir demander pour le $A_getParams, voir si c'est la bonne façon de faire avec $I_id
    public function voirAction(int $I_Id)
    {
        $O_recette = new Recette();
        Vue::montrer('recette/voir', array('recette' =>  $O_recette->getRecetteById($I_Id)));
    }
}