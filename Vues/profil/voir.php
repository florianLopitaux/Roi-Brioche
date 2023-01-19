<?php

Vue::montrer('standard/header');

echo '<h1 id="title-result">' . $A_vue['titre'] . '</h1>';
var_dump($A_vue['profil']);

Vue::montrer('standard/pied');
