<?php

class ControleurDefaut
{
    public function defautAction()
    {
        Vue::montrer('index/voir', array('hop' =>  'nope'));
    }

}