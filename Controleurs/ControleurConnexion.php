<?php

/**
 * Classe qui gère les interactions avec le modèle Utilisateur et les vues de connexion.
 */
final class ControleurConnexion
{
    /**
     * Fonction qui permet d'aller sur la page de connexion.
     */
    public function defautAction()
    {
        if (isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }
        Vue::montrer('connexion/voir', array('' =>  ''));
    }

    /**
     * Fonction qui permet de se connecter. Elle est appelée par le formulaire de la vue connexion/voir.
     *
     * @param $A_getParam : tableau contenant les paramètres de l'url.
     * @param $A_postParam : tableau contenant les paramètres du formulaire.
     */
    public function connexionAction($A_getParam, $A_postParam)
    {
        $S_email = !empty($A_postParam['email']) ? $A_postParam['email'] : null;
        $S_password = !empty($A_postParam['password']) ? $A_postParam['password'] : null;

        if ($S_email != null && $S_password != null) {
            $O_user = new Utilisateur();
            if ($O_user->checkForUser($S_email, $S_password) == 'Aucune erreur') {
                $_SESSION['user'] = $S_email;
                header('Location: /');
                exit();
            }
        }
        header('Location: /connexion');
        exit();
    }
}