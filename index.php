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

    <?php

    $sql= 'SELECT id, date_changement , etage, position, puissance_ampoule, marque_ampoule FROM ampoule';
    $sth= $dbh->prepare($sql);
    $sth->execute();
    $result= $sth->fetchAll(PDO::FETCH_ASSOC);

    $intlDateFormatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);


    foreach($result as $row){
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$intlDateFormatter->format(strtotime($row['date_changement'])). '</td>';
        echo '<td>'.$row['etage'].'</td>';
        echo '<td>'.$row['position'].'</td>';
        echo '<td>'.$row['puissance_ampoule'].'</td>';
        echo '<td>'.$row['marque_ampoule'].'</td>';
        echo '<td><a href="modify.php?edit=1&id='.$row['id'].'">Modifier</a></td>';
        echo '<td><a href="delete.php?id='.$row['id'].'">Supprimer</a></td>';

    }


?>
    </table>

    <?php
    if (count($result)===0){
            echo'<p>Il n\'y a aucune donnée à afficher</p>';
        }

       if(count($result)){
           echo'<p>Modification effectuée</p>';
       }
    ?>



</body>
</html>