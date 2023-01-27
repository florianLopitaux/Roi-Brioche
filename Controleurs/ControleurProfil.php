<?php

/**
 * Classe qui gère les interactions avec le modèle Utilisateur et les vues de profil.
 */
final class ControleurProfil
{
    /**
     * Fonction qui permet d'aller sur la page de profil.
     */
    public function defautAction()
    {
        if (isset($_SESSION['user'])) {
            $this->showUser($_SESSION['user']);
        }
        else {
            header('Location: /connexion');
            exit();
        }
    }

    /**
     * Fonction qui permet d'afficher un utilisateur.
     *
     * @param $A_getParam : tableau contenant les paramètres de l'url.
     * @param $A_postParam : tableau contenant les paramètres du formulaire.
     */
    public function voirAction($A_getParam, $A_postParam)
    {
        if (isset($A_getParam[0]) && $A_getParam[0] != '') {
            $this->showUser($A_getParam[0]);
        }
        else {
            header('Location: /profil');
            exit();
        }
    }

    /**
     * Fonction qui permet de supprimer un utilisateur.
     *
     * @param $A_getParam : tableau contenant les paramètres de l'url.
     * @param $A_postParam : tableau contenant les paramètres du formulaire.
     */
    public function supprimerAction($A_getParam, $A_postParam)
    {
        if ($_SESSION['statut'] == 'administrateur' && isset($A_getParam) && $A_getParam[0] != '') {
            $O_utilisateur = new Utilisateur();
            $O_utilisateur->deleteUtilisateur($A_getParam[0]);
            header('Location: /profil');
            exit();
        }
        else {
            header('Location: /profil');
            exit();
        }
    }

    /**
     * Fonction qui permet de recherche un utilisateur
     *
     * @param $A_getParam : tableau contenant les paramètres de l'url.
     * @param $A_postParam : tableau contenant les paramètres du formulaire.
     */
    public function rechercheAction($A_getParam, $A_postParam)
    {
        if (empty($_GET['search'])) {
            Vue::montrer('profil/recherche', array('titre' => 'Rechercher un profil par son pseudo ou son email', 'profils' => array()));
        }
        elseif (isset($_GET['search']) && $_GET['search'] != '') {
            $O_utilisateur = new Utilisateur();
            $A_utilisateurs = $O_utilisateur->getUserByNameOrEmail($_GET['search']);

            if (sizeof($A_utilisateurs) == 0) {
                $titre = 'Aucun profil trouvé';
            } else {
                $titre = 'Résultats pour : "' . $_GET['search'] . '" (' . sizeof($A_utilisateurs) . ')';
            }
            Vue::montrer('profil/recherche', array('profils' => $A_utilisateurs, 'titre' => $titre));
        }
    }

    /**
     * Fonction qui affiche un utilisateur en appelant la vue profil/voir.
     *
     * @param string $mail
     */
    public function showUser(string $mail): void
    {
        $O_utilisateur = new Utilisateur();
        $A_utilisateurs = $O_utilisateur->getUser($mail);

        Vue::montrer('profil/voir', array('profil' => $A_utilisateurs));
    }
}