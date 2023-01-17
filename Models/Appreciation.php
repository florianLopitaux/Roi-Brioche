<?php

final class Appreciation{
    private $_O_recette;
    private $_O_utilisateur;
    private $_S_commmentaire;
    private $_I_note;
    private $_D_dateDeCreation;

    private function __construct($O_recette, $O_utilisateur, $S_commmentaire, $I_note, $D_dateDeCreation){
        $this->_O_recette = $O_recette;
        $this->_O_utilisateur = $O_utilisateur;
        $this->_S_commmentaire = $S_commmentaire;
        $this->_I_note = $_I_note;
        $this->_D_dateDeCreation = $D_dateDeCreation;
    }

    public static function getParRecetteEtUtilisateur($O_recette,$O_utilisateur): Appreciation{

        $A_config = parse_ini_file(CHEMIN_VERS_FICHIER_INI, true);
        if (is_array($A_config)) {
            $S_dsn = $A_config['type'] . ':dbname=' . BASE_DE_DONNEES . ';host=' . $A_config['adresse_IP'];
            $O_conn= new PDO($S_dsn,$A_config['utilisateur'],$A_config['motdepasse']);
        }

        $S_requete = 'select * from Appreciation where id_Recette = ? and mail = ?';

        $O_statement = $O_conn->prepare($S_requete);
        $O_statement->execute(array($O_recette->getId(), $O_utilisateur->getMail()));

        $O_statement->setFetchMode(PDO::FETCH_ASSOC);

        $A_values = $O_statement->fetch();

        return new Appreciation($O_recette, $O_utilisateur, $A_values['commentaire'], $A_values['note'], $A_values['dateDeCreation']);
    }

    
    public function getRecette(): Recette{
        return $this->_O_recette;
    }

    public function getUtilisateur(): Utilisateur{
        return $this->_O_utilisateur;
    }

    public function getCommentaire(): string{
        return $this->_S_commmentaire;
    }

    public function getNote(): int{
        return $this->_I_note;
    }

    public function getDateDeCreation(): date{
        return $this->_S_dateDeCreation;
    }
}