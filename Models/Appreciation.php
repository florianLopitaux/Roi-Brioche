<?php

final class Appreciation extends Model {
    private $_I_Id_Recette;
    private $_S_mail;

    function __construct(){
        parent::__construct();
    }

    public static function withIdRecette(int $I_Id_Recette) : Appreciation
    {
        $O_instance = new self();
        $O_instance->_I_Id_Recette = $I_Id_Recette;
        return $O_instance;
    }

    public static function withMail(string $S_mail) {
        $O_instance = new self();
        $O_instance->_S_mail = $S_mail;
        return $O_instance;
    }

    public function getAppreciationByIdRecette() : array
    {
        $O_query = $this->getOConnexion()->query('SELECT `id_Recette`, `mail`, `note`, `commentaire`, `dateDeCreation` FROM `Appreciation` WHERE `id_Recette` = ?');
        $O_query->execute(array($this->_I_Id_Recette));

        $A_Appreciations = array();
        while ($A_results = $O_query->fetch(PDO::FETCH_ASSOC)) {
            $A_Appreciations[] = array(
                'id_Recette' => $A_results['id_Recette'],
                'mail' => $A_results['mail'],
                'note' => $A_results['note'],
                'commentaire' => $A_results['commentaire'],
                'dateDeCreation' => $A_results['dateDeCreation']
            );
        }
        return $A_Appreciations;
    }

    public function getAppreciationByMail() : array {
        $O_query = $this->getOConnexion()->query('SELECT `id_Recette`, `mail`, `note`, `commentaire`, `dateDeCreation` FROM `Appreciation` WHERE `mail` = ?');
        $O_query->execute(array($this->_S_mail));

        $A_Appreciations = array();
        while ($A_results = $O_query->fetch(PDO::FETCH_ASSOC)) {
            $A_Appreciations[] = array(
                'id_Recette' => $A_results['id_Recette'],
                'mail' => $A_results['mail'],
                'note' => $A_results['note'],
                'commentaire' => $A_results['commentaire'],
                'dateDeCreation' => $A_results['dateDeCreation']
            );
        }
        return $A_Appreciations;
    }
}