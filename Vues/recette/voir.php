<?php
Vue::montrer('standard/header');

echo '<h1 id="title-result">' . $A_vue['titre'] . '</h1>';
echo '<main>';

foreach ($A_vue['allRecettesResume'] as $O_recetteResume) {
    Vue::montrer('recette/recetteResume', array('recette' =>  $O_recetteResume));
}

echo '</main>';
Vue::montrer('standard/pied');
