<?php
Vue::montrer('standard/header');

echo '<main>';

foreach ($A_vue['allRecettesResume'] as $O_recetteResume) {
    Vue::montrer('standard/recetteResume', array('recette' =>  $O_recetteResume));
}

echo '</main>';
Vue::montrer('standard/pied');
