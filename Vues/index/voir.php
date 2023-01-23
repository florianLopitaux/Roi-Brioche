<?php
Vue::montrer('standard/header');

// TODO Ajouter la liaison avec la création de recettes pour le bouton "Créer une recette"
echo '<main>
    <section id="home-section">
        <section id="home-content-section">
            <h1>Le site de pâtisserie<br><strong>par référence</strong></h1>

            <div id="btn-container">
                <a id="create-recipe-btn" class="basic-btn" href="/recette">Voir toutes les recettes</a>';
if ($_SESSION['statut'] == 'administrateur') echo '<a id="categories-btn" class="basic-btn glass-effect" href="/">Créer une recette</a>';
echo '      </div>
        </section>

        <img src="assets/img/3D-logo-with-hand.svg" alt="decoration image representing a hand with the website logo above"/>
    </section>

    <section id="random-recipes-section">
        <h2>Sélection du jour</h2>

        <section id="recipes-container">';

for ($indexRecette = 0; $indexRecette < sizeof($A_vue['allRecettesHasard']); ++$indexRecette) {
    Vue::montrer('recette/recetteResume', array('recette' =>  $A_vue['allRecettesHasard'][$indexRecette]));
}

echo ' </section>

        <a id="random-recipes-btn" class="basic-btn glass-effect" href="#" onclick="window.location.reload(true);">Recette au hasard</a>
    </section>
</main>';

Vue::montrer('standard/pied');
