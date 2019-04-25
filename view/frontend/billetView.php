<!DOCTYPE html>
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="public/projet4.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="public/style.css" rel="stylesheet" />
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({selector: '#mytextarea'});</script>
    <title>Billet</title>
</head>

    
<body>

<header>
    <div class="container-fluid">

            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                <a class="navbar-brand" href="index.php?action=listBillet">HOME</a>
                </div>
                <nav class="navbar navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="title">
                        <h2 >JEAN FORTEROCHE | ÉCRIVAIN.</h2>
                        <p>Bienvenue sur mon blog !</p>
                    </div>
                </nav>
            </div>
    </div>
                
</header>

<?php  if(isset($_SESSION['flash'])) { 
    $flash = $_SESSION['flash'];
    
    ?>
    <div class="alert alert-success" role="alert">
        <?= $flash ?>
    </div>
<?php   
} 
unset($_SESSION['flash']);
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($billet->title()); ?>
        <br />
        <div class="date">le <?= $billet->dateModification(); ?></div>
    </h3>
    <p>
    <?php      // On affiche le content du billet
        echo $billet->content(); 
    ?>
    </p>
   
    
 
</div>

<div>
    <div id="scrollUp">
        <a class="top" href="#top"><img  class="scrollUp" src="img/to_top.png"/></a>
    </div>
    <div class="nav__exit">
        <a class="btn btn-primary_nav" role="button" href="index.php">Retour au blog</a>
    </div>
</div>


<div class="comment">
<h4>Commentaires</h4>
    <form method="post" action="index.php?action=billet&billet=<?php echo $_GET['billet'] ?>" method="post">
    <div class="addComment">
        <div class="addComment_name">  
            <input type="text" name="author" id="author" placeholder="Auteur" />
            <p class="error"><?php if(isset($error_author)){ echo $error_author; }?></p>
        </div>
        <div class="addComment_com"  >    
            <textarea type="text" name="comment" id="commentaire" placeholder="Commentaire"></textarea><br />
            <p class="error"><?php if(isset($error_comment)){ echo $error_comment; } ?></p>
        </div>
        <input class="btn_submit_edit_com" type="submit" value="Envoyer" />
    </div>
    </form>
<table class="table table-hover table-dark">
<thead>
<tr class="header_tab">
        <td scope="col" class="titre">Auteur</td>
        <td scope="col" class="auteur">Commentaire</td> 
</tr>
</thead>
  <tbody>

<?php foreach($comments as $comment) { ?>

    <tr class="btn_modif">
       
        <td><strong><?php echo htmlspecialchars($comment->author());/*['author']);*/?></strong><br>
        <?php echo $comment->datecomment();/*['date_comment']*/?></td>
        <td><?php echo nl2br(htmlspecialchars($comment->comment()));/*['comment']));*/?></td>
        <td>
        <a class="btn btn-primary_nav_edit_small" type="submit" name="signaler">Signaler</a>
        </td>     
    </tr>
   
       
<?php } // Fin de la boucle des comments?>
    </tbody>
</div>

  



<script src="to-top.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>