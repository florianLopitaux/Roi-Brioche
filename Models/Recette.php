<?php

final class Recette extends Model {
    private $_I_id;
    private $_S_nom;
    private $_F_moyenne;
    private $_I_tempsDePreparation;
    private $_S_difficulte;
    private $_S_cout;
    private $_S_description;
    private $_S_typeDeCuisson;
    private $_A_ingredients;
    private $_A_ustensiles;
    private $_A_particularites;
    private $_A_appreciations;
    private $_B_photographie;

    public function __construct($I_id, $S_nom, $F_moyenne, $I_tempsDePreparation, $S_difficulte, $S_cout, $S_description, $S_typeDeCuisson, $A_ingredients, $A_ustensiles, $A_particularites, $A_appreciations, $B_photographie)
    {
        $this->_I_id = $I_id;
        $this->_S_nom = $S_nom;
        $this->_F_moyenne=$F_moyenne;
        $this->_I_tempsDePreparation = $I_tempsDePreparation;
        $this->_S_difficulte = $S_difficulte;
        $this->_S_cout = $S_cout;
        $this->_S_description = $S_description;
        $this->_S_typeDeCuisson = $S_typeDeCuisson;
        $this->_A_ingredients = $A_ingredients;
        $this->_A_ustensiles = $A_ustensiles;
        $this->_A_particularites = $A_particularites;
        $this->_A_appreciations = $A_appreciations;
        $this->_B_photographie = $B_photographie;

        $this->getOConnexion();
    }


    public function getParId($I_id): Recette
    {
        $S_requete = 'SELECT * FROM `Recette` WHERE `id_Recette` = ? ';
        $O_statement = $this->_O_connexion->prepare($S_requete);
        $O_statement->execute(array($I_id));

        $O_statement->setFetchMode(PDO::FETCH_ASSOC);
        $A_values = $O_statement->fetch();


        $S_requete = 'SELECT `nom_Ingredient`, `nom_Ustensile`, `nom_Particularite` FROM `Composer`, `Posseder`, `Contenir` WHERE `id_Recette` = ? AND `Composer.id_Recette` = `Posseder.id_Recette` AND `Composer.id_Recette` = `Contenir.id_Recette`';

        $O_statement = $O_conn->prepare($S_requete);
        $O_statement->execute(array($I_id));

        $O_statement->setFetchMode(PDO::FETCH_ASSOC);

        $A_ingredients = [];
        $A_ustensiles = [];
        $A_particularites = [];

        while ($A_enregistrement = $O_statement->fetch())
        {
            $A_ingredients[] = Ingredient::getParNom($A_enregistrement['nom_Ingredient']);
            $A_ustensiles[] = Ustensile::getParNom($A_enregistrement['nom_Ustensile']);
            $A_particularites[] = Particularite::getParNom($A_enregistrement['nom_Particularite']);
        }

        $O_recette = new Recette($A_values['id_Recette'],$A_values['nom_Recette'],$A_values['moyenne'],$A_values['tempsDePreparation'],$A_values['difficulte'],$A_values['cout'],$A_values['description'],$A_values['typeDeCuisson'],$A_ingredients,$A_ustensiles,$A_particularites,array(),$A_values['photographie']);
        
        $O_recette->uptateAppreciations();

        return $O_recette; 
    }

    public static function creerRecette($S_nom, $F_moyenne, $I_tempsDePreparation, $S_difficulte, $S_cout, $S_description, $S_typeDeCuisson, $B_photographie, $A_ingredients, $A_ustensiles, $A_particularites): Recette {
        
        $A_config = parse_ini_file(CHEMIN_VERS_FICHIER_INI, true);
        if (is_array($A_config)) {
            $S_dsn = $A_config['type'] . ':dbname=' . BASE_DE_DONNEES . ';host=' . $A_config['adresse_IP'];
            $O_conn= new PDO($S_dsn,$A_config['utilisateur'],$A_config['motdepasse']);
        }

        $S_requete = 'insert into etudiants (id_Recette, nom_Recette, tempsDePreparation, difficulte, cout, description, typeDeCuisson, photographie) values (?,?,?,?,?,?,?)';

        $O_statement = $O_conn->prepare($S_requete);

        $O_statement->execute(array($S_nom, $F_moyenne, $I_tempsDePreparation, $S_difficulte, $S_cout, $S_typeDeCuisson, $B_photographie));

        
        new Recette($O_statement->lastinsertId(), $S_nom, $F_moyenne, $I_tempsDePreparation, $S_difficulte, $S_cout, $S_description, $S_typeDeCuisson, $A_ingredients, $A_ustensiles, $A_particularites, $A_appreciations, $B_photographie);            
        
    }



    public function uptateAppreciations(){
        $A_config = parse_ini_file(CHEMIN_VERS_FICHIER_INI, true);
        if (is_array($A_config)) {
            $S_dsn = $A_config['type'] . ':dbname=' . BASE_DE_DONNEES . ';host=' . $A_config['adresse_IP'];
            $O_conn= new PDO($S_dsn,$A_config['utilisateur'],$A_config['motdepasse']);
        }

        $S_requete = 'select id_Recette, mail from Appreciation where id_Recette = ?';

        $O_statement = $O_conn->prepare($S_requete);
        $O_statement->execute(array($this->_I_id));

        $O_statement->setFetchMode(PDO::FETCH_ASSOC);

        while ($A_enregistrement = $O_statement->fetch())
        {
            $this->_A_appreciations[] = Appreciation::getParRecetteEtUtilisateur($this,Utilisateur::getParMail($A_enregistrement['mail']));
        }
    }

    public function getId(): int{
        return $this->_I_id;
    }

    public function getNom(): string{
        return $this->_S_nom;
    }

    public function getMoyenne(): float{
        return $this->_F_moyenne;
    }

    public function getTempsDePreparation(): int{
        return $this->_I_tempsDePreparation;
    }

    public function getDifficulte(): string{
        return $this->_S_difficulte;
    }

    public function getCout(): string{
        return $this->_S_cout;
    }

    public function getDescription(): string{
        return $this->_S_description;
    }

    public function getIngredients(): array{
        return $this->_A_ingredients;
    }

    public function getUstensile(): array{
        return $this->_A_ustensiles;
    }

    public function getParticularites(): array{
        return $this->_A_particularites;
    }

    public function getAppreciations(): array{
        return $this->_A_appreciations;
    }

    public function getPhotographie(): array{
        return $this->_B_photographie;
    }
}
