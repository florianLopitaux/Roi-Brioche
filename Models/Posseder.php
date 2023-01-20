<?php

final class Posseder extends Model {

    function __construct(){
        parent::__construct();
    }

    public function getUstensileByRecetteId(int $I_id_Recette): array {
        $O_query = $this->getOConnexion()->prepare('SELECT `nom_Ustensile` FROM `Posseder` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }
}