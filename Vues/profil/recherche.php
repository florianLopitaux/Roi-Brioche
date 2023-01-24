<?php
Vue::montrer('standard/header');

echo '<h1 id="title-result">' . $A_vue['titre'] . '</h1>';

foreach ($A_vue['profils'] as $A_profil) {
    Vue::montrer('profil/profilResume', array('profil' =>  $A_profil));
}

Vue::montrer('standard/pied');

// TODO Faire le style https://cdn.discordapp.com/attachments/927995192391401532/1067212909719081130/image.png