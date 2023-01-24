<?php
echo '<section id="commentary">
    <img src="data:image/jpeg;base64,' . base64_encode($A_vue['appreciation']['photographie']) . '" alt="photo de profile de l\'utilisateur">

    <h4 id="profile-name">' . $A_vue['recette']['appreciations'][0]['pseudo'] . '</h4>

    <div id="stars-container">';

for ($i = 0; $i < intval($A_vue['appreciation']['note']); $i++) {
    echo '<i class="star on">★</i>';
}
for ($i = 0; $i < 5 - intval($A_vue['appreciation']['note']); $i++) {
    echo '<i class="star off">★</i>';
}

echo '</div>

    <span id="date">' . $A_vue['appreciation']['dateDeCreation'] . '</span>

    <p id="comment-text">' . $A_vue['appreciation']['commentaire'] . '</p>
</section>';
