<?php
Vue::montrer('standard/header');

echo '<h1 id="title-result">' . $A_vue['titre'] . '</h1>
<main>';

foreach ($A_vue['profils'] as $A_profil) {
    Vue::montrer('profil/profilResume', array('profil' =>  $A_profil));
}

echo '</main>';

Vue::montrer('standard/pied');
