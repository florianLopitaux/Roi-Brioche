<?php

class ControleurConnexion
{
    public function defautAction()
    {
        Vue::montrer('connexion/voir', array('hop' =>  'nope'));

    }

    public function connecterAction($login,$motdepasse){

    }
}