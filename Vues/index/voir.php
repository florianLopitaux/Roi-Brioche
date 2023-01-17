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
            <!-- temp div template, create after dynamically with php linked with DB -->
            <div class="recipe">
                <img src="assets/img/#" alt="image representing the food described by the recipe"/>
                <h3>Donuts au sucre</h3>
                <p>La recette d\'exception selon Homer Simpson</p>
            </div>

            <div class="recipe">
                <img src="assets/img/#" alt="image representing the food described by the recipe"/>
                <h3>Brioche Tresser</h3>
                <p>Son mouelleux est renversant</p>
            </div>

            <div class="recipe">
                <img src="assets/img/#" alt="image representing the food described by the recipe"/>
                <h3>Pain d\'épices</h3>
                <p>Un mélange de saveurs qui émoustille les papilles</p>
            </div>
        </section>

        <button id="random-recipes-btn" class="basic-btn glass-effect">Recette au hasard</button>
    </section>
</main>';

Vue::montrer('standard/pied');