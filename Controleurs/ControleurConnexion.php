<?php
class ControleurConnexion
{
    public function defautAction()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }
        Vue::montrer('connexion/voir', array('' =>  ''));
    }

    public function connexionAction($A_getParam, $A_postParam)
    {
        $S_email = !empty($A_postParam['email']) ? $A_postParam['email'] : null;
        $S_password = !empty($A_postParam['password']) ? $A_postParam['password'] : null;

        $O_user = new Utilisateur();
        if ($O_user->checkForUser($S_email, $S_password) == 'Aucune erreur') {
            $_SESSION['user'] = $S_email;
            header('Location: /');
            exit();
        }
        else {
            header('Location: /connexion');
            exit();
        }
    }
}