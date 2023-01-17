<?php

class ControleurDefaut
{
    public function defautAction()
    {
        $O_recetteHasard = new RecetteHasard();
        Vue::montrer('index/voir', array('allRecettesHasard' =>  array($O_recetteHasard->getRecetteHasard(), $O_recetteHasard->getRecetteHasard(), $O_recetteHasard->getRecetteHasard())));
    }

}