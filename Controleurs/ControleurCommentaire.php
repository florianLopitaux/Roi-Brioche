<?php

class ControleurCommentaire
{
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

    public function commenterAction($A_getParam, $A_postParam)
    {
        if (isset($_SESSION['user']) && sizeof($A_getParam) != 0 && $A_getParam[0] != '') {
            $I_note = !empty($A_postParam['note']) ? $A_postParam['note'] : null;
            $S_commentaire = !empty($A_postParam['commentaire']) ? $A_postParam['commentaire'] : null;

            if ($I_note != null && $S_commentaire != null) {
                $O_appreciation = new Appreciation();
                $O_appreciation->addAppreciation($A_getParam[0], $_SESSION['user'], $S_commentaire, $I_note);

                header('Location: /recette/voir/' . $A_getParam[0]);
                exit();
            }
        }
        header('Location: /rdfuihoivjgtbhkjnb' . $A_getParam[0]);
        exit();
    }

    public function supprimerAction($A_getParam, $A_postParam)
    {
        if (isset($_SESSION['user']) && $A_getParam['id'] =! null && $A_getParam['id'] != '') {

        }
        header('Location: /recette/voir/' . $A_getParam['id']);
        exit();
    }
}