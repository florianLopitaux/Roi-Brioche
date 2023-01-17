<?php

final class Ustensile{
    private $_S_nom;

    private function __construct($S_nom){
        $this->_S_nom = $S_nom;
    }

    public static function getParNom($S_nom): Ustensile{

        $A_config = parse_ini_file(CHEMIN_VERS_FICHIER_INI, true);
        if (is_array($A_config)) {
            $S_dsn = $A_config['type'] . ':dbname=' . BASE_DE_DONNEES . ';host=' . $A_config['adresse_IP'];
            $O_conn= new PDO($S_dsn,$A_config['utilisateur'],$A_config['motdepasse']);
        }

        $S_requete = 'select * from Ustensile where nom_Ustensile = ?';

        $O_statement = $O_conn->prepare($S_requete);
        $O_statement->execute(array($S_nom));

        $O_statement->setFetchMode(PDO::FETCH_ASSOC);

        $A_values = $O_statement->fetch();

        return new Ustensile($A_values['nom_Ustensile']);
    }

    public function getNom(): string{
        return $this->_S_nom;
    }
}