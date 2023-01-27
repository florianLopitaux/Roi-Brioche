<?php

/**
 * Classe qui gère les interactions la vue de connexion.
 */
final class ControleurDefaut
{
    /**
     * Fonction qui permet d'aller sur la page d'accueil.
     */
    public function defautAction()
    {
        $O_recetteHasard = new Recette();
        Vue::montrer('index/voir', array('allRecettesHasard' => $O_recetteHasard->get3RecettesResume()));
    }

}