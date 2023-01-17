<?php
require_once 'Noyau/ChargementAuto.php';
class ControleurInscription
{
    public function defautAction()
    {
        Vue::montrer('inscription', array('' =>  ''));
    }

    public function inscriptionAction()
    {
//       TODO Demander au prof pour le $_POST à remplacer par $A_postParams
        $e = '';
        $S_pseudo = !empty($_POST['pseudo']) ? $_POST['pseudo'] : $e .= "Vous n'avez pas renseigner de pseudo.";
        $S_email = !empty($_POST['email']) ? $_POST['email'] : $e .= "Vous n'avez pas renseigner d'email.";
        $S_password = !empty($_POST['password']) ? $_POST['password'] : $e .= "Vous n'avez pas renseigner de mot de passe.";
        $S_check_password = !empty($_POST['verif_password']) ? $_POST['verif_password'] : $e .= "Vous n'avez pas renseigner de vérification de mot de passe.";

        if ($S_password == $S_check_password && empty($e)) {
            $O_user = new Inscription($S_email, $S_pseudo, $S_password);
            $exception = $O_user->insertUser();
        } elseif (!empty($e)) {
            throw new Exception($e);
        } else {
            throw new Exception("Les mots de passe ne correspondent pas");
        }
        if ($exception !== '') {
            throw new Exception('Erreur : Impossible d\'ajouter cette utilisateur');
        }
    }
}