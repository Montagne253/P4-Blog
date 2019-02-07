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

        


       header('Location: billet.php?id='.$_GET['billet']);
    } 
    

    }


   
   


    


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="projet4.css" rel="stylesheet" />
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
            <textarea type="text" name="newtitre" rows="3" cols="110" placeholder=""><?= $edit_billet['titre'] ?></textarea><br><br><br>
            <textarea class="story" type="text" name="newcontenu" rows="50" cols="140" placeholder=""><?= $edit_billet['contenu'] ?></textarea><br>
            
            <br><br><br>
            <input  class="btn_submit_edit" type="submit" name="edit" value="Modifier">
            
        </form>
</div>
        <br>
        <br>
    <a class="navigation__link__1" href="editbillet.php">Mes billets</a>

    <a class="navigation__link__1" href="index.php">Retour au blog</a>
    <a class="navigation__link__1" href="deconnexion.php">Se deconnecter</a>
   

    

        <?php 
        if(isset($error))
        {
            echo '<font color="white">' . $error . "</font>";
        }
        ?>
    
    


    
</body>
</html>
<?php 
}
else 
{
    header("Location: connexion.php");
}
?>