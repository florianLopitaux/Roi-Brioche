<?php

class ControleurConnexion
{
    public function defautAction()
    {
        Vue::montrer('connexion', array('hop' =>  'nope'));

    }
}