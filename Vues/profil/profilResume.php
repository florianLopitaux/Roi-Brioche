<?php
if ($_SESSION['statut'] == 'administateur') {
    $S_link = '/profil/voir/' . $A_vue['profil']['mail'];
} else {
    $S_link = '/profil';
}

echo
'<a class="user" href="' . $S_link . '">
    <img src="data:image/jpeg;base64,' . base64_encode($A_vue['profil']['photographie']) . '" alt="image representing the food described by the recipe"/>
    <h1>' . $A_vue['profil']['mail'] . '</h1>
    <p>Pseudo : ' . $A_vue['profil']['pseudo'] . '</p>
    <a href="/profil/supprimer/' . $A_vue['profil']['id_Recette'] . '"></a>
</a>';

// TODO Faire le style https://cdn.discordapp.com/attachments/927995192391401532/1067212738776027136/image.png
