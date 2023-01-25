<?php

Vue::montrer('standard/header');

Vue::montrer('profil/profilResume', array('profil' => $A_vue['profil']));

echo '<section id="commentaries-section" class="data-section">
        <h3>Commentaires</h3>
        <button class="basic-btn glass-effect">Ecrire un commentaire</button>';

if ($A_vue['recette']['appreciations'] != null) {
    echo '<section id="commentary-list">';

    foreach ($A_vue['recette']['appreciations'] as $appreciation) {
        Vue::montrer('recette/commentPreview', array('appreciation' => $appreciation));
    }

    echo '</section>
    </section>';
}

Vue::montrer('standard/pied');

// TODO Faire le style https://cdn.discordapp.com/attachments/927995192391401532/1067219975229681814/image.png
