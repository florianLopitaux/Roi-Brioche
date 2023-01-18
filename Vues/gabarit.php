<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Roi Brioche</title>

    <!-- STYLE FILES -->
    <link rel="stylesheet" href="css/global_style.css"/>

    <?php
    $A_url_param = explode('/', $A_vue['url']);
    $I_index_page = 0;

    if (sizeof($A_url_param) >= 2) {
        $I_index_page = 1;
    } elseif ($A_url_param[0] == 'index' || $A_url_param[0] == 'recette') {
        echo '<link rel="stylesheet" href="css/recipe_preview_style.css"/>';
    }

    echo '<link rel="stylesheet" href="css/' . $A_url_param[$I_index_page] . '_style.css"/>';
    ?>

</head>
    <body>
        <?php echo $A_vue['body'] ?>
    </body>
</html>
