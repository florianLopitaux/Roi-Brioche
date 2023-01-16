<?php

class ControleurDefaut
{
    public function defautAction()
    {
        Vue::montrer('accueil/voir', array('hop' =>  'nope'));

    }
}