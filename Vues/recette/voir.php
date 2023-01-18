<?php
Vue::montrer('standard/header');

echo '<link rel="stylesheet" href="css/index_style.css"/>';

foreach ($A_vue['allRecettesResume'] as $O_recetteResume) {
    Vue::montrer('standard/recetteResume', array('recette' =>  $O_recetteResume));
}

Vue::montrer('standard/pied');