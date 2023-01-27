<?php

/**
 * Classe qui gère les interactions avec la table Composer.
 */
final class Composer extends Model {

    /**
     * Constructeur de la classe.
     */
    function __construct(){
        parent::__construct();
    }

    /**
     * Fonction qui permet d'avoir tous les ingredients d'une recette.
     *
     * @param $I_id_Recette : id de la recette.
     * @return array : tableau contenant tous les ingredients de la recette.
     */
    public function getIngredientByRecetteId(int $I_id_Recette): array {
        $O_query = $this->getOConnexion()->prepare('SELECT `nom_Ingredient` FROM `Composer` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fonction qui permet d'avoir tous les ingredients d'une recette.
     *
     * @param $I_id_Recette : id de la recette.
     */
    public function deleteAllIngredientByRecetteId($I_id_Recette) {
        $O_query = $this->getOConnexion()->prepare('DELETE FROM `Composer` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));
    }
}