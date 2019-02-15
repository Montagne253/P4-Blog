<?php 
session_start();


$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');

    if(isset($_GET['billet']) AND !empty($_GET['billet'])) {
        // Récupération du billet

    $edit = htmlspecialchars($_GET['billet']);
    
    $edit_billet = $bdd->prepare('SELECT id, auteur, titre, contenu FROM billet WHERE id = ?');
    $edit_billet->execute(array($edit));

    if($edit_billet->rowCount() == 1) {

        $edit_billet = $edit_billet->fetch();
        $edit_id = $edit_billet['id'];
        $edit_titre = $edit_billet['titre'];
        $edit_auteur = $edit_billet['auteur'];
        $edit_contenu = $edit_billet['contenu'];




    if(isset($_POST['newauteur'], $_POST['newtitre'], $_POST['newcontenu']))
    {
        
        
        $newAuteur = htmlspecialchars($_POST['newauteur']);
        $newTitre = htmlspecialchars($_POST['newtitre']);
        $newContenu = htmlspecialchars($_POST['newcontenu']);
       

        $insertnew = $bdd->prepare("UPDATE billet SET auteur = :auteur, titre = :titre, contenu = :contenu, date_modification = NOW() WHERE id = :id");
        $insertnew->execute(array(
            'auteur' => $newAuteur,
            'titre' => $newTitre,
            'contenu' => $newContenu,
            'id' => $_GET['billet']
        ));

        


       header('Location: editbillet.php?id='.$_GET['billet']);
    } 
    

    }


   
   


    


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="projet4.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Modifier votre billet</title>
</head>
<body>
    <div align="center">
        <h2>Modifier votre billet</h2>
        <br>
        <br>
        <br>
        <?php 
        if(isset($error))
        {
            echo '<font color="red">' . $error . "</font>";
        }
        ?>
        <br>
        <br>

        <form method="POST" action="edit.php?billet=<?= $edit_billet['id'] ?>">
            <input type="text" name="newauteur" placeholder="" value="<?= $edit_billet['auteur'] ?>"><br><br><br>
            <textarea class="story" type="text" name="newtitre" rows="3" cols="110" placeholder=""><?= $edit_billet['titre'] ?></textarea><br><br><br>
            <textarea class="story" type="text" name="newcontenu" rows="50" cols="140" placeholder=""><?= $edit_billet['contenu'] ?></textarea><br>
            
            <br><br><br>
            <input  class="btn_submit_edit" type="submit" name="edit" value="Modifier">
            
        </form>
</div>
        <br>
        <br>
    <div class="btn_edit">
    <a class="btn btn-primary_nav_edit" href="editbillet.php">Mes billets</a>
    <a class="btn btn-primary_nav_edit" href="profil.php?id=<?$_SESSION['id']?>">Admin</a>
    <a class="btn btn-primary_nav_edit" href="deconnexion.php">Se deconnecter</a>
    </div>

    

        <?php 
        if(isset($error))
        {
            echo '<font color="white">' . $error . "</font>";
        }
        ?>
    
    


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> 
</body>
</html>
<?php 
}
else 
{
    header("Location: connexion.php");
}
?>