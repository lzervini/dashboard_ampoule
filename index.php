<?php require_once('database.php'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard des ampoules à changer</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/ico" href="images/logo.ico" />

</head>
<body>
    <h1> Gestionnaire des ampoules à changer </h1>
    <div class="container table-responsive">
    <table class="table table-hover text-center col-lg-12">
    <thead class="theadcolor">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Date du changement</th>
            <th scope="col">Étages</th>
            <th scope="col">Position</th>
            <th scope="col">Puissance de l'ampoule</th>
            <th scope="col">Marque de l'ampoule</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
</thead>

    <?php

    $sql= 'SELECT id, date_changement , etage, position, puissance_ampoule, marque_ampoule FROM ampoule';
    $sth= $dbh->prepare($sql);
    $sth->execute();
    $result= $sth->fetchAll(PDO::FETCH_ASSOC);

    $intlDateFormatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);


    foreach($result as $row){
        echo '<tr>';
        echo '<th>'.$row['id'].'</th>';
        echo '<td>'.$intlDateFormatter->format(strtotime($row['date_changement'])). '</td>';
        echo '<td>'.$row['etage'].'</td>';
        echo '<td>'.$row['position'].'</td>';
        echo '<td>'.$row['puissance_ampoule'].'</td>';
        echo '<td>'.$row['marque_ampoule'].'</td>';
        echo '<td><a href="modify.php?edit=1&id='.$row['id'].'"><img src="images/edit.png" alt="trash"></a></td>';
        echo '<td><a href="delete.php?id='.$row['id'].'"><img src="images/trash.png" alt="trash"></a></td>';

    }


?>
    </table>
</div>

    <?php
    if (count($result)===0){
            echo'<p>Il n\'y a aucune donnée à afficher</p>';
        }

    ?>
    <div class="container ">
    <a href="modify.php"><button type="submit" class="add btn btn-outline-primary rounded-pill offset-lg-10 col-lg-2 "><img src="images/add.png" alt="signe plus">Ajouter</img></button></a>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>