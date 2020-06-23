<?php require_once('database.php'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard des ampoules à changer</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1> Ampoules à changer </h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Date du changement</th>
            <th>Étages</th>
            <th>Position</th>
            <th>Puissance de l'ampoule</th>
            <th>Marque de l'ampoule</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <div>
            <p><a href="modify.php">Ajouter</a></p>
    </div>
    </table>
</body>
</html>