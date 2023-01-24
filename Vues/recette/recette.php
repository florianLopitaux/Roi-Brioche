<?php

Vue::montrer('standard/header');

echo '<link rel="stylesheet" href="/css/voir_style.css"/>
<main>
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
                <span class="preparation-data"><strong>Temps de préparation:</strong> 30min</span>
                <span class="preparation-data"><strong>Difficulté:</strong> facile</span>
                <span class="preparation-data"><strong>Prix:</strong> Bon marché</span>
                <span class="preparation-data"><strong>Type de cuisson:</strong> Au four</span>
                <span class="preparation-data"><strong>Allergies:</strong> Aucune</span>
            </div>
        </section>

        <section class="data-section">
            <h3>Ingrédients</h3>

            <section class="data-list">
                <span class="recipe-data">415g de <strong>farine</strong></span>
                <span class="recipe-data">1.5 c.a.c de <strong>levure chimique</strong></span>
                <span class="recipe-data">2/3 c.a.c de <strong>sel</strong></span>
                <span class="recipe-data">65g de <strong>sucre en poudre</strong></span>
                <span class="recipe-data">23cl de <strong>lait</strong></span>
                <span class="recipe-data">2 <strong>oeufs</strong></span>
                <span class="recipe-data">50g de <strong>beurre</strong></span>
                <span class="recipe-data">2/3l <strong>d\'huile</strong></span>
            </section>
        </section>

        <section class="data-section">
            <h3>Ustensiles</h3>

            <section class="data-list">
                <span class="recipe-data">1 <strong>saladier</strong></span>
                <span class="recipe-data">1 <strong>cuillière</strong></span>
                <span class="recipe-data">2 <strong>couteau</strong></span>
                <span class="recipe-data">1 <strong>casserole</strong></span>
                <span class="recipe-data">1 <strong>pinceau</strong></span>
                <span class="recipe-data">1 <strong>balance de cuisine</strong></span>
            </section>
        </section>

        <section class="data-section">
            <h3>Préparation</h3>

            <section id="preparation-list" class="data-list">
                <h4>Etape 1</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto molestiae adipisci repellat consequatur ducimus? Reiciendis officia sint fugiat obcaecati placeat eum quaerat quia voluptatibus delectus tenetur! Molestias impedit asperiores nobis.</p>

                <h4>Etape 2</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora dolorem consequuntur explicabo a libero mollitia voluptate provident delectus sequi modi laboriosam quod magnam in dolor, cumque nam velit dicta omnis?</p>
            </section>
        </section>

        <section id="commentaries" class="data-section">
            <h3>Commentaires</h3>

            <section id="preparation-list" class="data-list">
                
            </section>
        </section>
    </main>';

echo '<p>Id :' . $A_vue['recette']['id_Recette'] . '</p>';
echo '<p>Nom :' . $A_vue['recette']['nom_Recette'] . '</p>';
echo '<p>moyenne :' . $A_vue['recette']['moyenne'] . '</p>';
echo '<p>tempsDePreparation :' . $A_vue['recette']['tempsDePreparation'] . '</p>';
echo '<p>difficulte :' . $A_vue['recette']['difficulte'] . '</p>';
echo '<p>cout :' . $A_vue['recette']['cout'] . '</p>';
echo '<p>description :' . $A_vue['recette']['description'] . '</p>';
echo '<p>typeDeCuisson :' . $A_vue['recette']['typeDeCuisson'] . '</p>';
echo '<p>ingredients :' . var_dump($A_vue['recette']['ingredients']) . '</p>';
echo '<p>ustensiles :' . var_dump($A_vue['recette']['ustensiles']) . '</p>';
echo '<p>particularites :' . var_dump($A_vue['recette']['particularites']) . '</p>';
echo '<p>appreciations :' . var_dump($A_vue['recette']['appreciations']) . '</p>';

Vue::montrer('standard/pied');
