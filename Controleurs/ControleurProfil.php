<?php

class ControleurProfil
{
    public function defautAction()
    {
        if (isset($_SESSION['user']) || $_SESSION['statut'] == 'administrateur') {
            $O_utilisateur = new Utilisateur();
            $A_utilisateur = $O_utilisateur->getUser($_SESSION['user']);

            if (sizeof($A_utilisateur['appreciations']) == 0) {
                $titre = 'Aucun commentaire';
            } else {
                $titre = 'Commentaires ( ' . sizeof($A_utilisateur['appreciations']) . ' )';
            }

            Vue::montrer('profil/voir', array('profil' => $O_utilisateur->getUser($_SESSION['user']), 'titre' => $titre));
        }
        else {
            header('Location: /connexion');
            exit();
        }
    }
}