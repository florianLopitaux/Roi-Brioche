<?php
session_start();
echo '<header>
    <img src="assets/img/rolling-pin.svg" alt="Rolling pin 3D image to decoration"/>

    <form id="search-bar" method="POST">
            <img src="../assets/img/search-sharp.svg" alt="loop image in the search bar for design"/>
            <input type="text" name="search" placeholder="Que cherchez-vous ?"/>
    </form>';

// TODO Trouver comment faire pour faire un truc genre index.php?url=utilisateur/email
if(isset($_SESSION['user'])) echo '<a id="login-btn" class="basic-btn" href="/utilisateur/' . $_SESSION['user'] . '">Profil</a></header>';
else echo '<a id="login-btn" class="basic-btn" href="/connexion">Connexion</a></header>';
