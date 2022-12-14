<?php
    $category =array('Biographie', 'Policier','Science-fiction', 'Jeunesse', 'Aventures');

    if(isset($_POST["add"]) && $_POST['category']!=="empty")
    { 
        $key = $_POST['category'];
        $value = $category[$_POST['category']];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Validation de formulaire</title>
        <link rel="stylesheet" href="style/style1.css">
    </head>
    <body>
        <h1>Ma Bibliothèque</h1>
        <a href="./livre.php">Liste des livres</a>
        <form method="post" action="index.php">
            <fieldset>
                <legend>Ajouter un livre</legend>

                <label for="title">Titre (obligatoire) </label>
                <input type="text" name="title" id ="title">
                
                <fieldset>
                    <legend>Auteur</legend>
                    <label for="firstname">Prénom (obligatoire)</label>
                    <input type="text" name="firstname" id="firstname">
                
                
                    <label for="lastname">Nom (obligatoire)</label>
                    <input type="text" name="lastname" id ="lastname">
                </fieldset>
                <select name="category">
                    <option value="empty">--Sélectionner une catégorie--</option>
                    <?php
                    foreach($category as $key => $category):
                    echo '<option value="'.$key.'">'.$category.'</option>'; 
                    endforeach;
                    ?>
                </select>

                <button name="add">Ajouter</button>
            </fieldset>
        </form>
      
        <?php

            if(isset($_POST["add"]) && empty($_POST["firstname"]) && empty($_POST["lastname"]) && empty($_POST["title"]) && $_POST['category']=="empty"){
                echo"Je suis vide";
            }
   
            if (isset($_POST["add"]) && !empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["title"]) && $_POST['category']!=="empty"):
                $firstname = htmlspecialchars($_POST["firstname"]);
                $lastname = htmlspecialchars($_POST["lastname"]);
                $title = htmlspecialchars($_POST["title"]);
    
                $monfichier = fopen('mes_livres.csv', 'a');
                fputcsv($monfichier, array($firstname, $lastname, $title, $value)); 

                fclose($monfichier);
        ?>
            <p>J'ai bien ajouté le livre <?= $title?> de <?= $firstname, " ", $lastname?> dans la catégorie <?= $value?>.</p>
        <?php endif; ?>
    </body>
</html>
