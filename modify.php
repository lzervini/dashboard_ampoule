<?php
    require_once('database.php')
?>


<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du changement d'ampoule</title>
</head>
<body>
    <h1>Modifier</h1>
    <form action='' method='POST'>
        <div>
            Date du changement d'ampoule: <input type="date" name='date_changement' id='date_changement' placeholder="Date">
        </div>
        <div>
            Numéro de l'étage :<input type="text" name='etage' id='etage' placeholder="Étage">
        </div>
        <div>
            Position de l'ampoule : <input type="text" name='position' id='position' placeholder="Position">
        </div>
        <div>
            Puissance de l'ampoule : <input type="text" name='puissance_ampoule' id='puissance_ampoule' placeholder="Puissance">
        </div>
        <div>
            Marque de l'ampoule : <input type="text" name='marque_ampoule' id='marque_ampoule' placeholder="Marque">
        </div>
        <button type="submit">Modifier</button>
</body>
</html>