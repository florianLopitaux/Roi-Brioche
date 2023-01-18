<?php

final class Contenir extends Model {

    function __construct(){
        parent::__construct();
    }

    public function getParticulariteByRecetteId(int $I_id_Recette): array {
        $O_query = $this->getOConnexion()->prepare('SELECT `nom_Particularite` FROM `Contenir` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }
}