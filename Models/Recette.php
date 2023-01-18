<?php

final class Recette extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getRecetteResumeById(int $I_id) : array
    {
        $O_query = $this->getOConnexion()->query('SELECT `id_Recette`, `nom_Recette`, `difficulte`, `photographie` FROM `Recette` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id));
        $A_results = $O_query->fetch(PDO::FETCH_ASSOC);

        return array(
            'id_Recette' => $A_results['id_Recette'],
            'nom_Recette' => $A_results['nom_Recette'],
            'difficulte' => $A_results['difficulte'],
            'photographie' => $A_results['photographie']
        );
    }

    public function getAllRecettesResume() : array
    {
        $O_query = $this->getOConnexion()->query('SELECT `id_Recette`, `nom_Recette`, `difficulte`, `photographie` FROM `Recette`');
        $O_query->execute();

        $allRecettesResume = array();
        while ($A_results = $O_query->fetch(PDO::FETCH_ASSOC)) {
            $allRecettesResume[] = array(
                'id_Recette' => $A_results['id_Recette'],
                'nom_Recette' => $A_results['nom_Recette'],
                'difficulte' => $A_results['difficulte'],
                'photographie' => $A_results['photographie']
            );
        }
        return $allRecettesResume;
    }

    public function getRecetteById(int $I_id) : array
    {
        $O_query = $this->getOConnexion()->query('SELECT * FROM `Recette` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id));
        $A_results = $O_query->fetch(PDO::FETCH_ASSOC);

        $O_secondQuery = $this->getOConnexion()->query('SELECT `nom_Ingredient`, `nom_Ustensile`, `nom_Particularite` FROM `Composer`, `Posseder`, `Contenir` WHERE `Composer.id_Recette` = ? AND `Composer.id_Recette` = `Posseder.id_Recette` AND `Posseder.id_Recette` = `Contenir.id_Recette`');
        $O_secondQuery->execute(array($I_id));
        $A_secondResults = $O_secondQuery->fetch(PDO::FETCH_ASSOC);

        $appreciations = Appreciation::withIdRecette($I_id);

        return array(
            'id_Recette' => $A_results['id_Recette'],
            'nom_Recette' => $A_results['nom_Recette'],
            'moyenne' => $A_results['moyenne'],
            'tempsDePreparation' => $A_results['tempsDePreparation'],
            'difficulte' => $A_results['difficulte'],
            'cout' => $A_results['cout'],
            'description' => $A_results['description'],
            'typeDeCuisson' => $A_results['typeDeCuisson'],
            'ingredients' => $A_secondResults['nom_Ingredient'],
            'ustensiles' => $A_secondResults['nom_Ustensile'],
            'particularites' => $A_secondResults['nom_Particularite'],
            'appreciations' => $appreciations->getAppreciationByIdRecette(),
            'photographie' => $A_results['photographie']
        );
    }
}
