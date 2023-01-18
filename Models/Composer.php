<?php

final class Composer extends Model {

    function __construct(){
        parent::__construct();
    }

    public function getIngredientByRecetteId(int $I_id_Recette): array {
        $O_query = $this->getOConnexion()->prepare('SELECT `nom_Ingredient` FROM `Composer` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }
}