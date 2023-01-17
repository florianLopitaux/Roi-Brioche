<?php
session_start();
class ControleurInscription
{
    public function defautAction()
    {
        Vue::montrer('inscription/voir', array('' =>  ''));
    }

    public function inscriptionAction()
    {
//       TODO Demander au prof pour le $_POST à remplacer par $A_postParams
        $S_pseudo = !empty($_POST['pseudo']) ? $_POST['pseudo'] : null;
        $S_email = !empty($_POST['email']) ? $_POST['email'] : null;
        $S_password = !empty($_POST['password']) ? $_POST['password'] : null;
        $S_check_password = !empty($_POST['verif_password']) ? $_POST['verif_password'] : null;

        if ($S_password == $S_check_password) {
            $O_user = new Inscription($S_email, $S_pseudo, $S_password);
            $O_user->insertUser();

            $_SESSION['user'] = $S_email;
        }
    }
}