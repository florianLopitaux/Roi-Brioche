<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Roi Brioche</title>
    <link rel="icon" href="/assets/img/favicon.ico">

    <!-- STYLE FILES -->
    <link rel="stylesheet" href="/css/global_style.css">

    <?php
    $A_url_param = explode('/', $A_vue['url']);

    if ($A_url_param[0] == 'index') {
        echo '<link rel="stylesheet" href="/css/index_style.css">';
        echo '<link rel="stylesheet" href="/css/recipe_preview_style.css">';
    }
    if ($A_url_param[0] == 'connexion') {
        echo '<link rel="stylesheet" href="/css/connexion_style.css">';
    }
    if ($A_url_param[0] == 'inscription') {
        echo '<link rel="stylesheet" href="/css/inscription_style.css">';
    }
    if ($A_url_param[0] == 'recette') {
        echo '<link rel="stylesheet" href="/css/recette_style.css">';
        echo '<link rel="stylesheet" href="/css/recipe_preview_style.css">';
        echo '<link rel="stylesheet" href="/css/comment_preview_style.css">';
    }
    if ($A_url_param[0] == 'profil') {
        echo '<link rel="stylesheet" href="/css/profil_style.css">';
        echo '<link rel="stylesheet" href="/css/comment_preview_style.css">';
    }
    if ($A_url_param[1] == 'detail') {
        echo '<link rel="stylesheet" href="/css/recipe_style.css">';
    }
    if ($A_url_param[1] == 'ajout') {
        echo '<link rel="stylesheet" href="/css/add_comment_style.css">';
    }
    ?>


</head>
<body>
    <?php
        echo $A_vue['body'] ?>
    </body>
</html>
