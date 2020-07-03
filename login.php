<?php
    require_once('database.php');

    $user = '';
    $password = '';
    if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])){   
        $sql='SELECT user.username, user.password FROM user WHERE user.username=:login';
        $sth = $dbh->prepare($sql);
        $sth->bindValue(':login', $_POST['username'], PDO::PARAM_STR);
        $sth->execute();
        $data = $sth->fetch();
    $user = $data['username'];
    $password = $data['password'];
    
    
    if($_POST['username'] == $user && $_POST['password'] == $password){
            session_start();
            $_SESSION['username'] = $user;
            header('Location: accueil.php');
        }else{
            header('Location: index.php?error=true');
        }
    }
 ?>