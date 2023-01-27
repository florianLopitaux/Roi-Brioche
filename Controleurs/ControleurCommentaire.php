<?php

/**
 * Classe qui gère les interactions avec les vues de commentaires et avec le modèle Appreciation
 */
final class ControleurCommentaire
{
    /**
     * Fonction qui permet d'ajouter une appreciation.
     *
     * @param $A_getParam : tableau contenant les paramètres de l'url.
     * @param $A_postParam : tableau contenant les paramètres du formulaire.
     */
    public function ajoutAction($A_getParam, $A_postParam)
    {
        if (isset($_SESSION['user']) && sizeof($A_getParam) != 0 && $A_getParam[0] != '') {
            Vue::montrer('commentaire/ajout', array('id_Recette' => $A_getParam[0]));
        }
        else {
            header('Location: /connexion');
            exit();
        }
    }

    /**
     * Fonction qui permet d'ajouter une appreciation. Elle est appelée par le formulaire de la vue commentaire/ajout.
     *
     * @param $A_getParam : tableau contenant les paramètres de l'url.
     * @param $A_postParam : tableau contenant les paramètres du formulaire.
     */
    public function commenterAction($A_getParam, $A_postParam)
    {
        if (isset($_SESSION['user']) && sizeof($A_getParam) != 0 && $A_getParam[0] != '') {
            $I_note = !empty($A_postParam['note']) ? $A_postParam['note'] : null;
            $S_commentaire = !empty($A_postParam['commentaire']) ? $A_postParam['commentaire'] : null;

            if ($I_note != null && $S_commentaire != null) {
                $O_appreciation = new Appreciation();
                $O_appreciation->addAppreciation($A_getParam[0], $_SESSION['user'], $S_commentaire, $I_note);

                header('Location: /recette/detail/' . $A_getParam[0]);
                exit();
            }
        }
        header('Location: /' . $A_getParam[0]);
        exit();
    }

    /**
     * Fonction qui permet de supprimer une appreciation.
     *
     * @param $A_getParam : tableau contenant les paramètres de l'url.
     * @param $A_postParam : tableau contenant les paramètres du formulaire.
     */
    public function supprimerAction($A_getParam, $A_postParam)
    {
        if (sizeof($A_getParam) != 0 && $A_getParam[0] != '') {
            $O_appreciation = new Appreciation();
            $O_appreciation->deleteAppreciation(intval($A_getParam[0]), $_SESSION['user']);
        }
        header('Location: /recette/detail/' . $A_getParam[0]);
    }
}