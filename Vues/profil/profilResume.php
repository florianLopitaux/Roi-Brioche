<?php

echo
'

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
