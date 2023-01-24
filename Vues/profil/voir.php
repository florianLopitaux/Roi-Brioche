<?php

Vue::montrer('standard/header');

var_dump($A_vue['profil']);

echo '<form action="/profil/" class="search-bar" method=GET>
            <img src="/assets/img/search-sharp.svg" alt="loop image in the search bar for design"/>
            <input type="text" name="search" placeholder="Que cherchez-vous ?"/>
        </form>';

Vue::montrer('standard/pied');

// TODO Faire le style https://cdn.discordapp.com/attachments/927995192391401532/1067219975229681814/image.png
