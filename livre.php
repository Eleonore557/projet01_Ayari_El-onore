<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Validation de formulaire</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Un livre</h1>
        <a href="./index.php">Lien vers la Bibliothèque</a>

        <?php
            $filename = './mes_livres.csv';

            if (file_exists($filename)) {
                echo "Le fichier $filename existe.";
            } else {
                echo "Le fichier $filename n'existe pas.";
            }
        ?>
    </body>
</html>
