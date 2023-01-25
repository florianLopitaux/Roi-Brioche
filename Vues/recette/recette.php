<?php

Vue::montrer('standard/header');

echo '<main>
        <a id="main-recipe" class="recipe" href="/recette/voir/' . $A_vue['recette']['id_Recette'] . '">
            <img src="data:image/jpeg;base64,' . base64_encode($A_vue['recette']['photographie']) . '" alt="image representing the food described by the recipe"/>
            <h3>' . $A_vue['recette']['nom_Recette'] . '</h3>
            <p>Description de la recette</p>
        </a>

        <section id="recipe-resume">
            <div id="top-recipe-resume">';

for ($i = 0; $i < round(floatval($A_vue['recette']['moyenne'])); $i++) {
    echo '<i class="star on">★</i>';
}
for ($i = 0; $i < 5 - round(floatval($A_vue['recette']['moyenne'])); $i++) {
    echo '<i class="star off">★</i>';
}

echo '<span id="commentaries">' . sizeof($A_vue['recette']['appreciations']) . ' commentaires</span>
            </div>

            <div id="bottom-recipe-resume">
                <span class="preparation-data"><strong>Temps de préparation : </strong> ' . $A_vue['recette']['tempsDePreparation'] . 'min</span>
                <span class="preparation-data"><strong>Difficulté : </strong> ' . $A_vue['recette']['difficulte'] . '</span>
                <span class="preparation-data"><strong>Prix : </strong> ' . $A_vue['recette']['cout'] . '</span>
                <span class="preparation-data"><strong>Type de cuisson : </strong> ' . $A_vue['recette']['typeDeCuisson'] . '</span>
                <span class="preparation-data"><strong>Allergies : </strong> ';

if ($A_vue['recette']['particularites'] != null) {
    for ($i = 0; $i < sizeof($A_vue['recette']['particularites']) - 1; $i++) {
        echo $A_vue['recette']['particularites'][$i]['nom_Particularite'] . ', ';
    }
    echo end($A_vue['recette']['particularites'])['nom_Particularite'];
}
else {
    echo 'Aucune';
}

echo '</span>
            </div>
        </section>

        <section class="data-section">
            <h3>Ingrédients</h3>

            <section class="data-list">';

foreach ($A_vue['recette']['ingredients'] as $ingredient) {
    echo '<span class="recipe-data"><strong>' . $ingredient['nom_Ingredient'] . '</strong></span>';
}

echo '</section>
        </section>

        <section class="data-section">
            <h3>Ustensiles</h3>

            <section class="data-list">';

foreach ($A_vue['recette']['ustensiles'] as $ustensile) {
    echo '<span class="recipe-data"><strong>' . $ustensile['nom_Ustensile'] . '</strong></span>';
}

echo '</section>
        </section>

        <section class="data-section">
            <h3>Préparation</h3>

            <section id="preparation-list" class="data-list">';

echo $A_vue['recette']['description'];

echo '</section>
        </section>

        <section id="commentaries-section" class="data-section">
            <h3>Commentaires</h3>';

$B_aDejaCommente = false;
foreach ($A_vue['recette']['appreciations'] as $appreciation) {
    if ($appreciation['id_Utilisateur'] == $_SESSION['id']) {
        $B_aDejaCommente = true;
        break;
    }
}
if (!$B_aDejaCommente) {
    echo '<button class="basic-btn glass-effect">Écrire un commentaire</button>';
}

if ($A_vue['recette']['appreciations'] != null) {
    echo '<section id="commentary-list">';

    foreach ($A_vue['recette']['appreciations'] as $appreciation) {
        Vue::montrer('commentaire/commentPreview', array('appreciation' => $appreciation));
    }

    echo '</section>';
}

echo '</section>
    </main>';

Vue::montrer('standard/pied');
