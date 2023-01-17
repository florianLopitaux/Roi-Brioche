<?php
echo '<link rel="stylesheet" href="css/login_style.css"/>
<img id="logo" class="decorate-img" src="assets/img/logo.png" alt="Logo of the website : Roi Brioche"/>
<img id="cookies" class="decorate-img" src="assets/img/cookies.png" alt="Decoration image representing three cookies"/>
<img id="donut" class="decorate-img" src="assets/img/donut.png" alt="Decoration image representing a donut"/>

<main>
    <h1>Créer un compte</h1>

    <form action="/" method="POST">
        <a id="back-arrow" href="/"><img src="assets/img/arrow-back-outline.svg" alt="Arrow to return to the home of the website"/></a>
        
        <input class="green-input" type="text" name="pseudo" placeholder="Pseudonyme"/>
        <input class="green-input" type="text" name="email" placeholder="Email"/>

        <input class="blue-input" type="password" name="password" placeholder="Mot de passe"/>
        <input class="blue-input" type="password" name="verif_password" placeholder="Vérification du mot de passe"/>

        <button id="validate" type="submit">Valider</button>
    </form>
</main>

<p id="copyright-text">Copyright © Tous droits réservés Roi Brioche - 2023</p>';
//TODO Ajout d'un input pour l'image;
//TODO Demander si l'architecture inscription/voir.php est bonne;