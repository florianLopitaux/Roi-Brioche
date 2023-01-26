<?php

/**
 * Classe qui gère les interactions avec la table Contenir
 */
final class Contenir extends Model {

    /**
     * Constructeur de la classe
     */
    function __construct(){
        parent::__construct();
    }

    /**
     * Fonction qui permet d'avoir toutes les particularites d'une recette
     *
     * @param $I_id_Recette : id de la recette
     * @return array : tableau contenant toutes les particularites de la recette
     */
    public function getParticulariteByRecetteId(int $I_id_Recette): array {
        $O_query = $this->getOConnexion()->prepare('SELECT `nom_Particularite` FROM `Contenir` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }
}