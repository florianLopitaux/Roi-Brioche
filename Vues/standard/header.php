<?php
echo '<header>
    <img id="rolling-pin" src="/assets/img/rolling-pin.svg" alt="Rolling pin 3D image to decoration"/>

        <form action="/recette/recherche" id="search-bar" method=GET>
            <img src="/assets/img/search-sharp.svg" alt="loop image in the search bar for design"/>
            <input type="text" name="search" placeholder="Que cherchez-vous ?"/>
        </form>';

if(isset($_SESSION['user'])) echo '<a id="login-btn" class="basic-btn" href="/profil">Profil</a></header>';
else echo '<a id="login-btn" class="basic-btn" href="/connexion">Connexion</a></header>';
