<?php

final class Appreciation extends Model {

    function __construct(){
        parent::__construct();
    }

    public function getAppreciationByIdRecette($I_id_Recette) : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `pseudo`, `id_Recette`, `Appreciation`.`mail`, `note`, `commentaire`, `Appreciation`.`dateDeCreation` FROM `Appreciation`, `Utilisateur` WHERE `Appreciation`.`mail` = `Utilisateur`.`mail` AND `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAppreciationByMail($S_mail) : array {
        $O_query = $this->getOConnexion()->prepare('SELECT `pseudo`, `id_Recette`, `Appreciation`.`mail`, `note`, `commentaire`, `Appreciation`.`dateDeCreation` FROM `Appreciation`, `Utilisateur` WHERE `Appreciation`.`mail` = `Utilisateur`.`mail` AND `Utilisateur`.`mail` = ?');
        $O_query->execute(array($S_mail));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }
}