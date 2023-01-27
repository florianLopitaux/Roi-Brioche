<?php

/**
 * Classe qui gère les interactions avec le modèle Utilisateur et les vues d'inscription.
 */
final class ControleurInscription
{
    /**
     * Fonction qui permet d'aller sur la page d'inscription.
     */
    public function defautAction()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }

        Vue::montrer('inscription/voir', array('' =>  ''));
    }

    /**
     * Fonction qui permet de s'inscrire. Elle est appelée par le formulaire de la vue inscription/voir. Gère aussi la taille et l'extension des images.
     *
     * @param $A_getParam : tableau contenant les paramètres de l'url.
     * @param $A_postParam : tableau contenant les paramètres du formulaire.
     */
    public function inscriptionAction($A_getParam, $A_postParam)
    {
        $S_pseudo = !empty($A_postParam['pseudo']) ? $A_postParam['pseudo'] : null;
        $S_email = !empty($A_postParam['email']) ? $A_postParam['email'] : null;
        $S_password = !empty($A_postParam['password']) ? $A_postParam['password'] : null;
        $S_check_password = !empty($A_postParam['verif_password']) ? $A_postParam['verif_password'] : null;
        $S_image = !empty($_FILES['photographie']) ? $_FILES['photographie'] : null;

        if ($S_password == $S_check_password && $S_pseudo != null && $S_email != null && $S_password != null && $S_check_password != null && $S_image != null) {
            $S_imageData = ($S_image['tmp_name']);
            list($S_width, $S_height, $S_type, $S_attr) = getimageSize($S_image['tmp_name']);
            $A_allowTypes = array('image/jpg','image/png','image/jpeg');
            $S_imageType = getimagesize($S_image['tmp_name'])['mime'];

            if ($S_imageType == null || !in_array($S_imageType, $A_allowTypes) || $S_width != 400 || $S_width != $S_height) {
                header('Location: /inscription');
                exit();
            }

            $O_user = new Utilisateur();
            if ($O_user->insertUser($S_email, $S_pseudo, password_hash($S_password, PASSWORD_BCRYPT), file_get_contents($S_imageData)) != 'Aucune erreur') {
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
