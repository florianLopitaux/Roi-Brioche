<?php

/**
 * Classe qui gère les interactions avec la table Appreciation
 */
final class Appreciation extends Model {

    /**
     * Constructeur de la classe
     */
    function __construct(){
        parent::__construct();
    }

    /**
     * Fonction qui permet d'avoir toutes les appreciations d'une recette
     *
     * @param $I_id_Recette : id de la recette
     * @return array : tableau contenant toutes les appreciations de la recette
     */
    public function getAppreciationByIdRecette($I_id_Recette) : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `pseudo`, `photographie`, `id_Recette`, `Appreciation`.`mail`, `commentaire`, `note`, `Appreciation`.`dateDeCreation` FROM `Appreciation`, `Utilisateur` WHERE `Appreciation`.`mail` = `Utilisateur`.`mail` AND `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fonction qui permet d'avoir toutes les appreciations d'un utilisateur
     *
     * @param $S_mail : mail de l'utilisateur
     * @return array : tableau contenant toutes les appreciations de l'utilisateur
     */
    public function getAppreciationByMail($S_mail) : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `pseudo`, `photographie`, `id_Recette`, `Appreciation`.`mail`, `commentaire`, `note`, `Appreciation`.`dateDeCreation` FROM `Appreciation`, `Utilisateur` WHERE `Appreciation`.`mail` = `Utilisateur`.`mail` AND `Utilisateur`.`mail` = ?');
        $O_query->execute(array($S_mail));

        return $O_query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fonction qui permet d'ajouter une appreciation
     *
     * @param int $I_id_Recette : id de la recette
     * @param string $S_mail : mail de l'utilisateur
     * @param string $S_commentaire : commentaire de l'utilisateur
     * @param int $I_note : note de l'utilisateur
     */
    public function addAppreciation(int $I_id_Recette, string $S_mail, string $S_commentaire, int $I_note) : void
    {
        $D_date = date("Y-m-d");

        $O_query = $this->getOConnexion()->prepare('INSERT INTO `Appreciation` (`id_Recette`, `mail`, `commentaire`, `note`, `dateDeCreation`) VALUES (?, ?, ?, ?, ?)');
        $O_query->execute(array($I_id_Recette, $S_mail, $S_commentaire, $I_note, $D_date));
    }
}