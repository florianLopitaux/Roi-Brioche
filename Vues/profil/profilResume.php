<?php
echo '<a class="user" href="/profil/voir/' . $A_vue['profil']['id_Recette'] . '">
    <img src="data:image/jpeg;base64,' . base64_encode($A_vue['profil']['photographie']) . '" alt="image representing the food described by the recipe"/>
    <h1>' . $A_vue['profil']['mail'] . '</h1>
    <p>Pseudo : ' . $A_vue['profil']['pseudo'] . '</p>
</a>';
