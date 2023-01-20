<?php

class ControleurDefaut
{
    public function defautAction()
    {
        $O_recetteHasard = new Recette();
        Vue::montrer('index/voir', array('allRecettesHasard' => $O_recetteHasard->get3RecettesResume()));
    }

}