<?php
function get_style_dependencies() : array {
    $A_style_files = [];

    $A_url_param = explode('/', $A_vue['url']);
    $I_index_page = sizeof($A_url_param) < 2 ? 0 : 1;

    if ($A_url_param[$I_index_page] === 'connexion' || $A_url_param[$I_index_page] === 'inscription') {
        $A_style_files[] = '/css_compiled/pages/login_style.css';
    } else {
        $A_style_files[] = '/css_compiled/pages/' . $A_url_param[$I_index_page] . '_style.css';
    }

    if (in_array($A_url_param[$I_index_page], ['index', 'recette', 'recherche'])) {
        $A_style_files[] = '/css_compiled/standard_elements/recipe_preview_style.css';
    }
    
    return $A_style_files;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Roi Brioche</title>

    <!-- STYLE FILES -->
    <link rel="stylesheet" href="/css_compiled/global_style.css">
    <link rel="stylesheet" href="/css_compiled/standard_elements/header_style.css">
    <link rel="stylesheet" href="/css_compiled/standard_elements/footer_style.css">

    <?php foreach(get_style_dependencies() as $S_file_style): ?>
        <link rel="stylesheet" href="<?= $S_file_style ?>">
    <?php endforeach ?>
</head>

<body>
    <?php echo $A_vue['body'] ?>
</body>
</html>
