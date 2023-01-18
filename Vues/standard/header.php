<?php
session_start();
echo '<header>
    <img id="rolling-pin" src="../assets/img/rolling-pin.svg" alt="Rolling pin 3D image to decoration"/>

        <form id="search-bar" method="POST">
            <img src="../assets/img/search-sharp.svg" alt="loop image in the search bar for design"/>
            <input type="text" name="search" placeholder="Que cherchez-vous ?"/>
        </form>';

if(isset($_SESSION['user'])) echo '<a id="login-btn" class="basic-btn" href="/utilisateur/voir/' . $_SESSION['user'] . '">Profil</a></header>';
else echo '<a id="login-btn" class="basic-btn" href="/connexion">Connexion</a></header>';
