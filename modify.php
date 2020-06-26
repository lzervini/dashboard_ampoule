<?php
    require_once('database.php');

    $id= '';
    $dateChange= '';
    $etage= '';
    $position= '';
    $puissance= '';
    $marque='';
    $error = false;


    if(isset($_GET['id']) && isset($_GET['edit'])){
        $sql= 'SELECT id, date_changement, etage, position, puissance_ampoule, marque_ampoule FROM ampoule WHERE id=:id';
        $sth = $dbh->prepare($sql);
        $sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        if(gettype($result) === "boolean"){            
            header('Location: index.php');
            exit;
        }

        $id=htmlentities($_GET['id']);
        $dateChange=$result['date_changement'];
        $etage=$result['etage'];
        $position= $result['position'];
        $puissance= $result['puissance_ampoule'];
        $marque=$result['marque_ampoule'];
    }

    if (count($_POST) > 0){
        if(strlen($_POST['date_changement'])!== 0){
            $dateChange = ($_POST['date_changement']);
        }else{
            $error = true;
        }

        if(strlen($_POST['etage'])!== 0){
            $etage = ($_POST['etage']);
        }else{
            $error = true;
        }

        if(strlen($_POST['position'])!== 0){
            $position = ($_POST['position']);
        }else{
            $error = true;
        }

        if(strlen($_POST['puissance_ampoule'])!== 0){
            $puissance = ($_POST['puissance_ampoule']);
        }else{
            $error = true;
        }

        if(strlen($_POST['marque_ampoule'])!== 0){
            $marque = ($_POST['marque_ampoule']);
        }else{
            $error = true;
        }

        if(isset($_POST['edit']) && isset($_POST['id'])){
            $id = htmlentities($_POST['id']);
        }
        
        if( $error === false){
            if(isset($_POST['edit']) && isset($_POST['id'])){
                $sql= 'UPDATE ampoule set date_changement=:date_changement, etage=:etage, position=:position, puissance_ampoule=:puissance, marque_ampoule=:marque WHERE id=:id';
    
            }else{
                $sql= 'INSERT INTO ampoule(date_changement,etage,position,puissance_ampoule,marque_ampoule) VALUES(:date_changement,:etage,:position,:puissance,:marque)';
            }
            $sth= $dbh->prepare($sql);

        $sth->bindParam(':date_changement', strftime("%Y-%m-%d" , strtotime($dateChange)), PDO::PARAM_STR);
        $sth->bindParam(':etage', $etage, PDO::PARAM_STR);
        $sth->bindParam(':position', $position, PDO::PARAM_STR);
        $sth->bindParam(':puissance', $puissance, PDO::PARAM_STR);
        $sth->bindParam(':marque', $marque, PDO::PARAM_STR);
        if(isset($_POST['edit']) && isset($_POST['id'])){
            $sth->bindParam(':id', $id, PDO::PARAM_INT);    
        }
        $sth->execute();

        header('Location: index.php');


    }
}

?>
<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification pour le changement d'ampoule</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">


</head>
<body>

<div class="container">
    <form action='' method='POST' class="offset-lg-4 col-md-4 ">
        <div>
            Date du changement d'ampoule: <input type="date" name='date_changement' id='date_changement' placeholder="Date" value="<?=$dateChange; ?>" class="form-control">
        </div>
        <div>
            Numéro de l'étage :<input type="text" name='etage' id='etage' placeholder="Étage" value="<?=$etage; ?>" class="form-control">
        </div>
        <div>
            Position de l'ampoule : <input type="text" name='position' id='position' placeholder="Position" value="<?=$position; ?>" class="form-control">
        </div>
        <div>
            Puissance de l'ampoule : <input type="text" name='puissance_ampoule' id='puissance_ampoule' placeholder="Puissance" value="<?=$puissance; ?>" class="form-control">
        </div>
        <div>
            Marque de l'ampoule : <input type="text" name='marque_ampoule' id='marque_ampoule' placeholder="Marque" value="<?=$marque; ?>" class="form-control">
        </div>
        <br>
        <div>
        <?php
                if (isset($_GET['id']) && isset($_GET['edit'])){
                    $button= "Modifier";
                }else{
                    $button= "Ajouter";
                }
            ?>
                <button type="submit" class="btn btn-outline-primary"><?=$button ?></button> 
        </div>  
            <?php
                if (isset($_GET['id']) && isset($_GET['edit'])){
            ?>
                    <input type="hidden" name="edit" value="1" />
                    <input type="hidden" name="id" value="<?=$id ?>" />
            <?php
                }
            ?>
    </form>
 </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>