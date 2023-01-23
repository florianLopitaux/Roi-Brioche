<?php

class ControleurDeconnexion
{
    public function defautAction($A_getParam, $A_postParam)
    {
        session_destroy();
        header('Location: /');
        exit();
    }
}