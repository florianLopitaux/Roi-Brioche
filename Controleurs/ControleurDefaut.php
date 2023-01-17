<?php

class ControleurDefaut
{
    public function defautAction()
    {
        Vue::montrer('index/accueil', array('hop' =>  'nope'));
    }

}