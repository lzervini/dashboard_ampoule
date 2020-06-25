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

        $sth->bindParam(':date_changement', $dateChange, PDO::PARAM_STR);
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
</head>
<body>
    <h1>Modifier</h1>
    <form action='' method='POST'>
        <div>
            Date du changement d'ampoule: <input type="date" name='date_changement' id='date_changement' placeholder="Date" value="<?=$dateChange; ?>">
        </div>
        <div>
            Numéro de l'étage :<input type="text" name='etage' id='etage' placeholder="Étage" value="<?=$etage; ?>">
        </div>
        <div>
            Position de l'ampoule : <input type="text" name='position' id='position' placeholder="Position" value="<?=$position; ?>">
        </div>
        <div>
            Puissance de l'ampoule : <input type="text" name='puissance_ampoule' id='puissance_ampoule' placeholder="Puissance" value="<?=$puissance; ?>">
        </div>
        <div>
            Marque de l'ampoule : <input type="text" name='marque_ampoule' id='marque_ampoule' placeholder="Marque" value="<?=$marque; ?>">
        </div>
        <div>
        <?php
                if (isset($_GET['id']) && isset($_GET['edit'])){
                    $button= "Modifier";
                }else{
                    $button= "Ajouter";
                }
            ?>
                <button type="submit"><?=$button ?></button> 
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
</body>
</html>