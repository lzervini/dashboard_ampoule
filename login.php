<?php
    require_once('database.php');

    $user = '';
    $password = '';

    if(isset($_POST['Connexion']) && !empty($_POST['username']) && !empty($_POST['password'])){   
        $sql='SELECT user.username, user.password FROM user WHERE user.username=:login';
        $sth = $dbh->prepare($sql);
        $sth->bindValue(':login', $_POST['username'], PDO::PARAM_STR);
        $sth->execute();
        $data = $sth->fetch();
        var_dump($data);
    $user = $data['username'];
    $password = $data['password'];

    session_start();
    
        if($_POST['username'] == $user && $_POST['password'] == $password){
            $_SESSION['username'] = $user;
            header('Location: accueil.php');

        }else{
            echo'<p>Mauvais indentifiant ou mot de passe!</p>';
        }
    }

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



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>