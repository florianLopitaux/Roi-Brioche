<?php
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
