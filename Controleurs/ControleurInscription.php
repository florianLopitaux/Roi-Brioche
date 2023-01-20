<?php

class ControleurInscription
{
    public function defautAction()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }

        Vue::montrer('inscription/voir', array('' =>  ''));
    }

    public function inscriptionAction($A_getParam, $A_postParam)
    {
        $S_pseudo = !empty($A_postParam['pseudo']) ? $A_postParam['pseudo'] : null;
        $S_email = !empty($A_postParam['email']) ? $A_postParam['email'] : null;
        $S_password = !empty($A_postParam['password']) ? $A_postParam['password'] : null;
        $S_check_password = !empty($A_postParam['verif_password']) ? $A_postParam['verif_password'] : null;

        header("Content-type: image/png");
        $S_photographie = !empty($A_postParam['photographie']) ? $A_postParam['photographie'] : null;


        if ($S_password == $S_check_password && $S_pseudo != null && $S_email != null && $S_password != null && $S_check_password != null && image_type_to_extension()) {
            $O_user = new Utilisateur();
            if ($O_user->insertUser($S_email, $S_pseudo, password_hash($S_password, PASSWORD_BCRYPT)) != 'Aucune erreur') {
                header('Location: /inscription');
            } else {
                $_SESSION['user'] = $S_email;
                header('Location: /');
            }
            exit();
        }
        header('Location: /inscription');
        exit();
    }
}
