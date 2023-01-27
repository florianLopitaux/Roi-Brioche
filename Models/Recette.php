<?php

/**
 * Classe qui gère les interactions avec la table Recette
 */
final class Recette extends Model {

    /**
     * Constructeur de la classe
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Fonction qui permet d'avoir 3 recettes aléatoires en résumé
     *
     * @return array : tableau contenant les 3 recettes aléatoires
     */
    public function get3RecettesResume() : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `id_Recette`, `nom_Recette`, `difficulte`, `photographie` FROM Recette ORDER BY RAND() LIMIT 3');
        $O_query->execute();

        return $O_query->fetchAll();
    }

    /**
     * Fonction qui permet d'avoir toutes les recettes en résumé
     *
     * @return array : tableau contenant toutes les recettes
     */
    public function getAllRecettesResume() : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `id_Recette`, `nom_Recette`, `difficulte`, `photographie` FROM `Recette`');
        $O_query->execute();

        return $O_query->fetchAll();
    }

    /**
     * Fonction qui permet d'avoir une recette en détail
     *
     * @param int $I_id : id de la recette
     * @return array : tableau contenant la recette
     */
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

    /**
     * Fonction qui permet d'avoir toutes les recettes en résumé par recherche
     *
     * @param string $S_recherche : recherche
     * @return array : tableau contenant toutes les recettes
     */
    public function getAllRecettesResumeByRecherche(string $S_recherche) : array
    {
        $O_query = $this->getOConnexion()->prepare('SELECT `id_Recette`, `nom_Recette`, `difficulte`, `photographie` FROM `Recette` WHERE `nom_Recette` LIKE ?');
        $O_query->execute(array('%' . $S_recherche . '%'));

        return $O_query->fetchAll();
    }

    /**
     * Fonction qui permet de supprimer une recette
     *
     * @param int $I_id_Recette : id de la recette
     * @return bool : true si la suppression a réussi, false sinon
     */
    public function deleteRecette(int $I_id_Recette) : bool
    {
        $O_Ingredient = new Composer();
        $O_Ingredient->deleteAllIngredientByRecetteId($I_id_Recette);
        $O_Ustensile = new Posseder();
        $O_Ustensile->deleteAllUstensileByRecetteId($I_id_Recette);
        $O_Particularite = new Contenir();
        $O_Particularite->deleteAllParticularteByRecetteId($I_id_Recette);
        $O_Appreciation = new Appreciation();
        $O_Appreciation->deleteAllAppreciationByRecetteId($I_id_Recette);


        $O_query = $this->getOConnexion()->prepare('DELETE FROM `Recette` WHERE `id_Recette` = ?');
        $O_query->execute(array($I_id_Recette));

        return $O_query->rowCount() > 0;
    }
}
