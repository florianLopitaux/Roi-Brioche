<?php

Vue::montrer('standard/header');

echo '<main>';

Vue::montrer('profil/profilResume', array('profil' => $A_vue['profil']));

echo '<section id="commentaries-section" class="data-section">
        <h3>Tes commentaires (' . sizeof($A_vue['profil']['appreciations']) . ')</h3>';

if ($A_vue['profil']['appreciations'] != null) {
    echo '<section id="commentary-list">';

    foreach ($A_vue['profil']['appreciations'] as $appreciation) {
        Vue::montrer('commentaire/commentPreview', array('appreciation' => $appreciation, 'recette' => false));
    }

    echo '</section>
    </section>
</main>';
}

Vue::montrer('standard/pied');

// TODO Faire le style https://cdn.discordapp.com/attachments/927995192391401532/1067219975229681814/image.png
