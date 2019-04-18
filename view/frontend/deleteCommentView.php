<!DOCTYPE html>
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="public/projet4.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="public/style.css" rel="stylesheet" />
    <title>Commentaires</title>
</head>
    
<body>
<header >
    <div class="container-fluid">

            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                <a class="navbar-brand" href="connexion.php">Admin</a>
                </div>
                <div class="collapse" id="navbarToggleExternalContent">
                <a class="navbar-brand" href="index.php">HOME</a>
                </div>
                <nav class="navbar navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="title">
                        <h1 >JEAN FORTEROCHE | ÉCRIVAIN.</h1>
                        <p>Bienvenue sur mon blog !</p>
                    </div>
                </nav>
            </div>
    </div>
                
</header>
<br>

<br>
<div class="news">
    <h3>
        <?php echo htmlspecialchars($billet->title()); ?>
        <br />
        <div class="date">le <?= $billet->dateModification(); ?></div>
    </h3>
    <p>
    <?php      // On affiche le content du billet
         echo nl2br(htmlspecialchars($billet->content())); 
    ?>
    </p>
   
    <a class="btn btn-primary_nav_edit" href="index.phpaction=billet&billet=<?php echo $billet->id(); ?>">Lire la suite</a>
 
</div>


    
</div>
<div class="comment">
<h4>Commentaires</h4>
<div class="container-fluid">


<table class="table table-hover table-dark">
<thead>
<tr class="header_tab">
        <td scope="col" class="auteur">Auteur</td>
        <td scope="col" class="date">Commentaire</td>
        <td scope="col" class="date">Signalement</td>
        <td scope="col" class="supp">Suppression</td>
</tr>
</thead>
  <tbody>
    

<?php foreach ($comments as $comment) { ?>
    <tr class="btn_modif">
    
    <td><strong><?php echo htmlspecialchars($comment->author()); ?></strong> le <?php echo $comment->dateComment(); ?></td>
    <td><?php echo htmlspecialchars($comment->comment()) ?></td>
    <td><?php echo htmlspecialchars($comment->signaler()) ?></td>
    <td>
        
        <form action="index.php?action=deleteComment&billet=<?= $_GET['billet'] ?>" method="post">
            <input type="hidden" value="<?= $comment->id(); ?>" name="idComment">
            <input class="btn btn-primary_delete" name="delete" type="submit" value="Supprimer">
        </form>
        
    </td>
    </tr>
  
    <?php } // Fin de la boucle des commentaires?>
</div>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>  
</body>
</html>