<?php

class Utilisateur extends Model
{
    private $_S_mail;
    private $_S_pseudo;
    private $_S_mdp;
    private $_D_dateDeCreation;
    private $_D_dateDeDerniereConnexion;
    private $_B_photographie;

    function __construct($S_mail, $S_pseudo, $S_mdp)
    {
        parent::__construct();

        $this->_S_mail = $S_mail;
        $this->_S_pseudo = $S_pseudo;
        $this->_S_mdp = $S_mdp;
//        $this->_B_photographie = $B_photographie;
    }

    public function insertUser() : string
    {
        $date = date("Y-m-d");
        $this->_D_dateDeCreation = $date;
        $this->_D_dateDeDerniereConnexion = $date;

        try {
            $O_query = $this->getOConnexion()->prepare("INSERT INTO `Utilisateur` (`mail`, `pseudo`, `mdp`, `dateDeCreation`, `dateDeDerniereConnexion`) VALUES (?, ?, ?, ?, ?)");
            $this->getOConnexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->getOConnexion()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $O_query->execute(array($this->_S_mail, $this->_S_pseudo, $this->_S_mdp, $this->_D_dateDeCreation, $this->_D_dateDeDerniereConnexion));
        } catch (PDOException $e) {
            return $e->getMessage();
        } return 'Aucune erreur';
    }
}