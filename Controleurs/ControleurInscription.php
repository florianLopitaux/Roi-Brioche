<?php
session_start();
class ControleurInscription
{
    public function defautAction()
    {
        Vue::montrer('inscription/voir', array('' =>  ''));
    }

    public function inscriptionAction($A_getParam, $A_postParam)
    {
        $S_pseudo = !empty($A_postParam['pseudo']) ? $A_postParam['pseudo'] : null;
        $S_email = !empty($A_postParam['email']) ? $A_postParam['email'] : null;
        $S_password = !empty($A_postParam['password']) ? $A_postParam['password'] : null;
        $S_check_password = !empty($A_postParam['verif_password']) ? $A_postParam['verif_password'] : null;

        if ($S_password == $S_check_password) {
            $O_user = new Utilisateur($S_email, $S_pseudo, $S_password);
            $O_user->insertUser();

            $_SESSION['user'] = $S_email;
        }
        header('Location: /');
    }
}
