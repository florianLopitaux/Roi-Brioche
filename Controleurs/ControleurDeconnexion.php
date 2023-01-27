<?php

/**
 * Classe qui gère les interactions avec le modèle Utilisateur et les vues de connexion.
 */
final class ControleurDeconnexion
{
    /**
     * Fonction qui permet de se déconnecter.
     */
    public function defautAction($A_getParam, $A_postParam)
    {
        session_destroy();
        header('Location: /');
        exit();
    }
}