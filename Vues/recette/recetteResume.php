<?php
echo
    '<a class="recipe" href="/recette/voir/' . $A_vue['recette']['id_Recette'] . '">
        <img src="data:image/jpeg;base64,' . base64_encode($A_vue['recette']['photographie']) . '" alt="image representing the food described by the recipe"/>
        <h3>' . $A_vue['recette']['nom_Recette'] . '</h3>
        <p>Difficulté : ' . $A_vue['recette']['difficulte'] . '</p>
    </a>';
