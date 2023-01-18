<?php
echo '<img id="logo" class="decorate-img" src="/assets/img/logo.png" alt="Logo of the website : Roi Brioche"/>
<img id="cookies" class="decorate-img" src="/assets/img/cookies.png" alt="Decoration image representing three cookies"/>
<img id="donut" class="decorate-img" src="/assets/img/donut.png" alt="Decoration image representing a donut"/>

<main>
    <h1>Se connecter</h1>

        <form method="POST">
            <a id="back-arrow" href="/"><img src="/assets/img/arrow-back-outline.svg" alt="Arrow to return to the home of the website"/></a>

            <input class="green-input" type="text" name="pseudo" placeholder="Pseudonyme"/>
            <input class="blue-input" type="password" name="password" placeholder="Mot de passe"/>

            <button id="validate" type="submit">Valider</button>
        </form>
        
        <span id="text-to-register">Vous n\'avez pas encore de compte ? <a href="/inscription">Inscrivez-vous</a></span>
    </main>
</main>

<p id="copyright-text">Copyright © Tous droits réservés Roi Brioche - 2023</p>';