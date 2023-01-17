<?php
echo '<div class="recipe">
    <img src="data:image/jpeg;base64,' . base64_encode($A_vue['recetteHasard']['photographie']) . '" alt="image representing the food described by the recipe"/>
    <h3>' . $A_vue['recetteHasard']['nom_Recette'] . '</h3>
    <p>Difficulté : ' . $A_vue['recetteHasard']['difficulte'] . '</p>
</div>';
