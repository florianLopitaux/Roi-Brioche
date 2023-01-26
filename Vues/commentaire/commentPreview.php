<?php
echo '<div id="commentary" onclick=location.href="/recette/voir/' . $A_vue['appreciation']['id_Recette'] . '">';

if ($_SESSION['statut'] == 'administrateur' || $_SESSION['user'] == $A_vue['appreciation']['mail']) {
    echo '<a id="delete-btn" href="/commentaire/supprimer/' . $A_vue['appreciation']['mail'] . '">❌</a>';
}

echo '
    <img src="data:image/jpeg;base64,' . base64_encode($A_vue['appreciation']['photographie']) . '" alt="photo de profile de l\'utilisateur">
    <h4 id="profile-name">' . $A_vue['appreciation']['pseudo'] . '</h4>

    <div id="stars-container">';

for ($i = 0; $i < intval($A_vue['appreciation']['note']); $i++) {
    echo '<i class="star on">★</i>';
}
for ($i = 0; $i < 5 - intval($A_vue['appreciation']['note']); $i++) {
    echo '<i class="star off">★</i>';
}

echo
    '</div>

    <span id="date">' . $A_vue['appreciation']['dateDeCreation'] . '</span>
    <p id="comment-text">' . $A_vue['appreciation']['commentaire'] . '</p>
</div>';
