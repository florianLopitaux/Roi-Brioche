<?php
Vue::montrer('standard/header');

echo '<link rel="stylesheet" href="css/index_style.css"/>
<main>
    <section id="home-section">
        <section id="home-content-section">
            <h1>Le site de pâtisserie<br><strong>par référence</strong></h1>

            <div id="btn-container">
                <button id="create-recipe-btn" class="basic-btn">Créer une recette</button>
                <button id="categories-btn" class="basic-btn glass-effect">Catégories</button>
            </div>
        </section>

        <img src="assets/img/3D-logo-with-hand.svg" alt="decoration image representing a hand with the website logo above"/>
    </section>

    <section id="random-recipes-section">
        <h2>Sélection du jour</h2>

        <section id="recipes-container">
            <!-- temp div template, create after dynamically with php linked with DB -->';

// TODO Passage en formulaire quand je saurais comment faire recette/id
for ($indexRecette = 0; $indexRecette < sizeof($A_vue['allRecettesHasard']); ++$indexRecette) {
    Vue::montrer('standard/recetteResume', array('recette' =>  $A_vue['allRecettesHasard'][$indexRecette]));
}

echo '</section>

        <button id="random-recipes-btn" class="basic-btn glass-effect">Recette au hasard</button>
    </section>
</main>';

Vue::montrer('standard/pied');

// TODO DEMANDER COMMENT FAIRE QUAND ON A DEUX FORMULAIRES CAR DANS MA TETE TOUS LES FORMULAIRES MENENT VERS nomModeleAction() DANS LE CONTROLEUR