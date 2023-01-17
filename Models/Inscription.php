<?php

final class Utilisateur extends Model {
    private $_S_mail;
    private $_S_pseudo;
    private $_S_mdp;
    private $_D_dateDeCreation;
    private $_D_dateDeDerniereConnexion;
    private $_B_photographie;

    function __construct($S_mail, $S_pseudo, $S_mdp)
    {
        $this->_S_mail = $S_mail;
        $this->_S_pseudo = $S_pseudo;
        $this->_S_mdp = $S_mdp;
//        $this->_B_photographie = $B_photographie;

        $date = new date("Y-m-d");
        $this->_D_dateDeCreation = $date;
        $this->_D_dateDeDerniereConnexion = $date;
    }

    public function insertUser() : string
    {
        try {
            $this->_O_connexion->prepare("INSERT INTO `Utilisateur` (`mail`, `pseudo`, `mdp`, `dateDeCreation`, `dateDeDerniereConnexion`) VALUES (?, ?, ?, ?,?)");
            $this->_O_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_O_connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $this->_O_connexion->execute(array($this->_S_mail, $this->_S_pseudo, $this->_S_mdp, $this->_D_dateDeCreation, $this->_D_dateDeDerniereConnexion));
        } catch (PDOException $e) {
            return $e->getMessage();
        } return '';
    }

    public static function getParMail($S_mail): Utilisateur
    {

        $A_config = parse_ini_file(CHEMIN_VERS_FICHIER_INI, true);
        if (is_array($A_config)) {
            $S_dsn = $A_config['type'] . ':dbname=' . BASE_DE_DONNEES . ';host=' . $A_config['adresse_IP'];
            $O_conn= new PDO($S_dsn,$A_config['utilisateur'],$A_config['motdepasse']);
        }

        $S_requete = 'select * from Utilisateur where mail = ?';

        $O_statement = $O_conn->prepare($S_requete);
        $O_statement->execute(array($S_mail));

        $O_statement->setFetchMode(PDO::FETCH_ASSOC);

        $A_values = $O_statement->fetch();

        return new Utilisateur($A_values['mail'],$A_values['pseudo'],$A_values['mdp'],$A_values['dateDeCreation'],$A_values['dateDeDerniereConnexion'],$A_values['photographie']);
    }



    public function getMail(): string{
        return $this->_S_mail;
    }

    public function getPseudo(): string{
        return $this->_S_pseudo;
    }

    public function getMdp(): string{
        return $this->_S_mdp;
    }

    public function getDateDeCreation(): date{
        return $this->_S_dateDeCreation;
    }

    public function getDateDerniereConnexion(): date{
        return $this->_D_dateDeDerniereConnexion;
    }

    public function getPhotographie(): array{
        return $this->_B_photographie;
    }
}