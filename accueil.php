<?php require_once('database.php'); 

session_start();
if(empty($_SESSION['username'])){
        header('Location: index.php');
    }   
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard </title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/ico" href="images/logo.ico" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>


</head>
<body>
    <div class="container-fluid navbar">
        <div class="container d-flex lign-items-center">
            <div>
                <?php 
                echo '<p class="echo">Bonjour ' .$_SESSION['username']. ' ! </p>'
                ?>
            </div>
            <div>
                <a href="deco.php"> <img src="images/exit.svg"></img></a>
</div>
</div>
</div>
<main>

    <h1> Gestionnaire des ampoules à changer </h1>

    <div class="container-fluid mt-3 ">
        <div class="container">

    <div class=" responsive-table-line shadow bg-white rounded-lg">
    <table class="table table-hover text-center">
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
</div>

    <?php

    $sql= 'SELECT id, date_changement , etage, position, puissance_ampoule, marque_ampoule FROM ampoule';
    $sth= $dbh->prepare($sql);
    $sth->execute();
    $result= $sth->fetchAll(PDO::FETCH_ASSOC);

    $intlDateFormatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::SHORT, IntlDateFormatter::NONE);


    foreach($result as $row){
        echo '<tr>';
        echo '<td data-title="ID">'.$row['id'].'</td>';
        echo '<td data-title="Date">'.$intlDateFormatter->format(strtotime($row['date_changement'])). '</td>';
        echo '<td data-title="Etage">'.$row['etage'].'</td>';
        echo '<td data-title="Position">'.$row['position'].'</td>';
        echo '<td data-title="Puissance">'.$row['puissance_ampoule'].'</td>';
        echo '<td data-title="Marque">'.$row['marque_ampoule'].'</td>';
        echo '<td title="Modifier"><a href="modify.php?edit=1&id='.$row['id'].'"><i class="far fa-edit fa-2x" style="color:black;"></i></a></td>';
        echo '<td title="Supprimer"><a href="delete.php?id='.$row['id'].'" class="btn_delete" ><i class="far fa-trash-alt fa-2x" style="color:#fe5f55;"></i></a></td>';
    }
?>



    
    <?php
    if (count($result)===0){
        echo'<p>Il n\'y a aucune donnée à afficher</p>';
    }
    
    ?>
</table>
</div>
    <div class="container addbutton">
    <a href="modify.php" id="btnplus"  data-toggle="tooltip" data-placement="left" title="Ajouter"><i class="far fa-plus-square fa-3x" style="color:black;"></i></a>
    </div>
</div>

<!-- modal -->
<div id="modal" class="hidden">
    <div id="modal_dialog" class="rounded border">
        <img src="images/warning.svg" alt="icon warning"></img>
        <h1>Êtes-vous sur ?</h1>
        <p class="modal_text"> Voulez vous vraiment supprimer cette ligne ? <br>
       Il vous sera impossible de la récupérer. </p>
        <div id="modal_area_btn">
        <button id="modal_btn_no" class="btn btn-light" >Annuler</button>
        <button id="modal_btn_yes" class="btn btn-danger">Supprimer</button>
      </div>
    </div>
</div>
</main>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="delete.js"> </script>
</body>
</html>