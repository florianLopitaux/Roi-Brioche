<?php

class ControleurProfil
{
    public function defautAction()
    {
        if ($_SESSION['statut'] == 'administrateur' && isset($_GET['search']) && $_GET['search'] != '') {
            $O_utilisateur = new Utilisateur();
            $A_utilisateurs = $O_utilisateur->getUserByNameOrEmail($_GET['search']);

            if (sizeof($A_utilisateurs) == 0) {
                $titre = 'Aucun profil trouvé';
            } else {
                $titre = 'Profils (' . sizeof($A_utilisateurs) . ')';
            }

            Vue::montrer('profil/recherche', array('profils' => $A_utilisateurs, 'titre' => $titre));
        }
        elseif ($_SESSION['statut'] == 'utilisateur' && isset($_GET['search']) && $_GET['search'] != '') {
            header('Location: /profil');
            exit();
        }
        elseif (isset($_SESSION['user'])) {
            $this->showUser($_SESSION['user']);
        }
        else {
            header('Location: /connexion');
            exit();
        }
    }

    public function voirAction($A_getParam, $A_postParam)
    {
        if ($_SESSION['statut'] == 'administrateur' && isset($A_getParam[0]) && $A_getParam[0] != '') {
            $this->showUser($A_getParam[0]);
        }
        else {
            header('Location: /profil');
            exit();
        }
    }

    public function showUser(string $mail): void
    {
        $O_utilisateur = new Utilisateur();
        $A_utilisateurs = $O_utilisateur->getUser($mail);

        Vue::montrer('profil/voir', array('profil' => $A_utilisateurs));
    }
}