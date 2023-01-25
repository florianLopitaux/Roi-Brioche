<?php

final class Appreciation extends Model {

    function __construct(){
        parent::__construct();
    }

    public function getAppreciationByIdRecette($I_id_Recette) : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `pseudo`, `photographie`, `id_Recette`, `Appreciation`.`mail`, `commentaire`, `note`, `Appreciation`.`dateDeCreation` FROM `Appreciation`, `Utilisateur` WHERE `Appreciation`.`mail` = `Utilisateur`.`mail` AND `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAppreciationByMail($S_mail) : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `pseudo`, `photographie`, `id_Recette`, `Appreciation`.`mail`, `commentaire`, `note`, `Appreciation`.`dateDeCreation` FROM `Appreciation`, `Utilisateur` WHERE `Appreciation`.`mail` = `Utilisateur`.`mail` AND `Utilisateur`.`mail` = ?');
        $O_query->execute(array($S_mail));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAppreciation(int $I_id_Recette, string $S_mail, string $S_commentaire, int $I_note) : void
    {
        $D_date = date("Y-m-d");

        $O_query = $this->getOConnexion()->prepare('INSERT INTO `Appreciation` (`id_Recette`, `mail`, `commentaire`, `note`, `dateDeCreation`) VALUES (?, ?, ?, ?, ?)');
        $O_query->execute(array($I_id_Recette, $S_mail, $S_commentaire, $I_note, $D_date));
    }
}