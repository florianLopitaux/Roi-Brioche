<?php

/**
 * Classe qui gère les interactions avec la table Posseder
 */
final class Posseder extends Model {

    /**
     * Constructeur de la classe
     */
    function __construct(){
        parent::__construct();
    }

    /**
     * Fonction qui permet d'avoir tous les ustensiles d'une recette
     *
     * @param $I_id_Recette : id de la recette
     * @return array : tableau contenant tous les ustensiles de la recette
     */
    public function getUstensileByRecetteId(int $I_id_Recette): array {
        $O_query = $this->getOConnexion()->prepare('SELECT `nom_Ustensile` FROM `Posseder` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fonction qui permet de supprimer tous les ustensiles d'une recette.
     *
     * @param $I_id_Recette : id de la recette.
     */
    public function deleteAllUstensileByRecetteId($I_id_Recette) {
        $O_query = $this->getOConnexion()->prepare('DELETE FROM `Posseder` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));
    }
}