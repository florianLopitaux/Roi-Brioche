<?php

class RecetteHasard extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRecetteHasard() : array
    {
        $O_query = $this->getOConnexion()->query("SELECT `id_Recette`, `nom_Recette`, `difficulte`, `photographie` FROM `Recette` ORDER BY RAND() LIMIT 1");
        $O_query->execute();
        $A_recette = $O_query->fetch(PDO::FETCH_ASSOC);
        return $A_recette;
    }
}