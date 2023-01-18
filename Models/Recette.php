<?php

final class Recette extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get3RecettesResume()
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `id_Recette`, `nom_Recette`, `difficulte`, `photographie` FROM Recette ORDER BY RAND() LIMIT 3');
        $O_query->execute();

        return $O_query->fetchAll();
    }

    public function getRecetteResumeById(int $I_id) : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `id_Recette`, `nom_Recette`, `difficulte`, `photographie` FROM `Recette` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id));

        return $O_query->fetchAll();
    }

    public function getAllRecettesResume() : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `id_Recette`, `nom_Recette`, `difficulte`, `photographie` FROM `Recette`');
        $O_query->execute();

        return $O_query->fetchAll();
    }

    public function getRecetteById(int $I_id) : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT * FROM `Recette` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id));
        $A_results = $O_query->fetch(PDO::FETCH_ASSOC);

        $A_appreciations = new Appreciation();
        $A_ingredients = new Composer();
        $A_particularites = new Contenir();
        $A_ustensiles = new Posseder();

        return array(
            'id_Recette' => $A_results['id_Recette'],
            'nom_Recette' => $A_results['nom_Recette'],
            'moyenne' => $A_results['moyenne'],
            'tempsDePreparation' => $A_results['tempsDePreparation'],
            'difficulte' => $A_results['difficulte'],
            'cout' => $A_results['cout'],
            'description' => $A_results['description'],
            'typeDeCuisson' => $A_results['typeDeCuisson'],
            'ingredients' => $A_ingredients->getIngredientByRecetteId($I_id),
            'ustensiles' => $A_ustensiles->getUstensileByRecetteId($I_id),
            'particularites' => $A_particularites->getParticulariteByRecetteId($I_id),
            'appreciations' => $A_appreciations->getAppreciationByIdRecette($I_id),
            'photographie' => $A_results['photographie']
        );
    }

    // This function is used to search for recipes that match the search string
    public function getAllRecettesResumeByRecherche(string $S_recherche)
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `id_Recette`, `nom_Recette`, `difficulte`, `photographie` FROM `Recette` WHERE `nom_Recette` LIKE ?');
        $O_query->execute(array('%' . $S_recherche . '%'));

        return $O_query->fetchAll();
    }
}
