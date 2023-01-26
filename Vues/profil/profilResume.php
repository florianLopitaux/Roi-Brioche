<?php

echo
'
<main>
    <a class="user" href="' . '/profil/voir/' . $A_vue['profil']['mail'] . '">
        <img src="data:image/jpeg;base64,' . base64_encode($A_vue['profil']['photographie']) . '" alt="image representing the food described by the recipe"/>

        <div id="profil-data-container">
            <h2>' . $A_vue['profil']['mail'] . '</h2>

            <span><strong>Pseudo :</strong> ' . $A_vue['profil']['pseudo'] . '</span>
            <span><strong>Date de création :</strong> ' . $A_vue['profil']['dateDeCreation'] . '</span>
            <span><strong>Date de dernière connexion :</strong> ' . $A_vue['profil']['dateDeDerniereConnexion'] . '</span>
        </div>

        <a href="/profil/supprimer/' . $A_vue['profil']['mail'] . '"></a>
    </a>';

// TODO Faire le style https://cdn.discordapp.com/attachments/927995192391401532/1067212738776027136/image.png
// TODO Faire en sorte que le profil soit clickaque que pour les admins
