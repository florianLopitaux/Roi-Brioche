<?php

class Utilisateur extends Model
{

    function __construct()
    {
        parent::__construct();
//        $this->_B_photographie = $B_photographie;
    }

    public function insertUser(string $S_mail, string $S_pseudo, string $S_mdp) : string
    {
        $D_date = date("Y-m-d");

        try {
            $O_query = $this->getOConnexion()->prepare("INSERT INTO `Utilisateur` (`mail`, `pseudo`, `mdp`, `dateDeCreation`, `dateDeDerniereConnexion`) VALUES (?, ?, ?, ?, ?)");
            $this->getOConnexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->getOConnexion()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $O_query->execute(array($S_mail, $S_pseudo, $S_mdp, $D_date, $D_date));
        } catch (PDOException $e) {
            return $e->getMessage();
        } return 'Aucune erreur';
    }

    public function checkForUser(string $S_mail, string $S_password) : string
    {
        $D_date = date("Y-m-d");

        try {
            $O_query = $this->getOConnexion()->prepare("SELECT `mdp` FROM `Utilisateur` WHERE `mail` = ?");
            $this->getOConnexion()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->getOConnexion()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $O_query->execute(array($S_mail));
            $A_result = $O_query->fetch(PDO::FETCH_ASSOC);

            if (password_verify($S_password, $A_result['mdp'])) {
                $O_query = $this->getOConnexion()->prepare("UPDATE `Utilisateur` SET `dateDeDerniereConnexion` = ? WHERE `mail` = ?");
                $O_query->execute(array($D_date, $S_mail));
                return 'Aucune erreur';
            } else {
                return 'Mot de passe incorrect';
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getUser(string $S_mail) : array
    {
        $O_query = $this->getOConnexion()->prepare("SELECT `mail`, `pseudo`, `dateDeCreation`, `dateDeDerniereConnexion`, `photographie` FROM `Utilisateur` WHERE `mail` = ?");
        $O_query->execute(array($S_mail));
        $A_results = $O_query->fetch(PDO::FETCH_ASSOC);

        $appreciations = new Appreciation();

        return array(
            'mail' => $A_results['mail'],
            'pseudo' => $A_results['pseudo'],
            'dateDeCreation' => $A_results['dateDeCreation'],
            'dateDeDerniereConnexion' => $A_results['dateDeDerniereConnexion'],
            'photographie' => $A_results['photographie'],
            'appreciations' => $appreciations->getAppreciationByMail($S_mail)
        );
    }
}