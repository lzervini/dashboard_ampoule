<?php require_once('database.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div id="container">
            
            <form action=".php" method="POST">
                <h1>Connexion</h1>
                
                <label>Nom d'utilisateur</label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                <label>Mot de passe</label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value='login' >

            </form>
        </div>
    
</body>
</html>