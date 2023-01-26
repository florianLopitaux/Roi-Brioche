<?php
echo
    '<header>
        <a id="back-home" href="/">
            <img id="rolling-pin" src="/assets/img/rolling-pin.svg" alt="Rolling pin 3D image to decoration"/>
        </a>

        <form action="/recette/" class="search-bar" method=GET>
            <img src="/assets/img/search-sharp.svg" alt="loop image in the search bar for design"/>
            <input type="text" name="search" placeholder="Que cherchez-vous ?"/>
        </form>';

if(isset($_SESSION['user'])) {
    echo
        '<div id="header-btn-container">
            <a id="login-btn" class="basic-btn" href="/deconnexion">Déconnexion</a>
            <a id="login-btn" class="basic-btn" href="/profil">Profil</a>
        </div>';

} else {
    echo '<a id="login-btn" class="basic-btn" href="/connexion">Connexion</a>';
}

echo '</header>';
