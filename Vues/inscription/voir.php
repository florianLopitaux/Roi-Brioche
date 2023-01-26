<?php
echo
'<img id="logo" class="decorate-img" src="assets/img/logo.png" alt="Logo of the website : Roi Brioche"/>
<img id="cookies" class="decorate-img" src="assets/img/cookies.png" alt="Decoration image representing three cookies"/>
<img id="donut" class="decorate-img" src="assets/img/donut.png" alt="Decoration image representing a donut"/>

<main>
    <h1>Créer un compte</h1>

    <form action="/inscription/inscription" method="POST" enctype="multipart/form-data">
        <a id="back-arrow" href="/"><img src="assets/img/arrow-back-outline.svg" alt="Arrow to return to the home of the website"/></a>
        
        <input class="green-input" type="text" name="pseudo" placeholder="Pseudonyme"/>
        <input class="green-input" type="text" name="email" placeholder="Email"/>

        <input class="blue-input" type="password" name="password" placeholder="Mot de passe"/>
        <input class="blue-input" type="password" name="verif_password" placeholder="Vérification du mot de passe"/>
        
        <div id="upload-container">
            <label for="pp_image">Choisir la photo de profile (400x400)</label>
            <input id="upload_pp" type="file" name="photographie" accept=".jpg, .jpeg, .png"/>
        </div>

        <button id="validate" type="submit">Valider</button>
    </form>
</main>

<p id="copyright-text">Copyright © Tous droits réservés Roi Brioche - 2023</p>';
