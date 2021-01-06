<?php require_once('database.php');

    if(isset($_GET['id'])){
        $sql = 'delete from ampoule where id =:id';
        $sth = $dbh->prepare($sql);
        $sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $sth -> execute();

    }
    header('Location: accueil.php');

?>
