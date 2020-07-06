<?php
    require_once('database.php');



    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/ico" href="images/logo.ico">
</head>
<body>
    <div id="container-fluid mt-3">
        <div class="container shadow bg-white rounded-lg offset-lg-4 col-lg-3 p-0 ">
        <div class="title">
            <h1>Connexion</h1>
        </div>

            <form action="login.php" method="post" class=" p-3">                
                <label>Nom d'utilisateur</label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" class="form-control" required>

                <label>Mot de passe</label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" class="form-control" required>

                <input type="submit" value="Connexion" name="submit" class="px-3 pz-1 m-2 btn btn-outline-primary rounded-pill">

            </form>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
