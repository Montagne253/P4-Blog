<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="public/projet4.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Profil</title>
</head>
<body>
<header>
   

<div class="container-fluid">

        <div class="pos-f-t">
            <div class="collapse" id="navbarToggleExternalContent">
            <a class="navbar-brand" href="index.php">HOME</a>
            </div>
            <nav class="navbar navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="title">
                    <h2>JEAN FORTEROCHE | ÉCRIVAIN.</h2>
                    <p>Administration</p>
                </div>
            </nav>
        </div>
</div>
                
</header>

  <div id="profil" align="center">
      <h2>Profil de <?php echo $profil->pseudo(); ?></h2>

      <br> <br>

      <p>Pseudo : <?php echo $profil->pseudo(); ?></p>

      <br>

      <p>Email : <?php echo $profil->email(); ?></p>

      <br>



</div>
<h6>ATELIER</h6>
<table class="table table-dark">
  <tbody>
    <tr>
      <th class="creer" scope="row">CRÉER</th>
      <td><a role="button" href="index.php?action=create" class="btn btn-primary_edit">Nouveau billet</a></td>
      <td><a role="button" href="index.php?action=signin" class="btn btn-primary">Nouveau compte</a></td>
    </tr>
    <tr>
      <th class="editer" scope="row">ÉDITER</th>
      <td><a class="btn btn-primary_edit" role="button" href="index.php?action=editBillet">Mes billets</a></td>
      <td><a class="btn btn-primary" role="button" href="index.php?action=editProfil">Mon profil</a></td>
      
    </tr>
    <tr>
      <th class="creer" scope="row">MODÉRER</th>
      <td><a role="button" href="index.php?action=editComment" class="btn btn-primary_edit">Commentaires</a></td>
    </tr>
  </tbody>
</table>


<div class="btn_connexion" align='center'>
        <a class="btn btn-primary_nav_edit" role="button" href="index.php?action=listBillet">Retour au blog</a>
        <a class="btn btn-primary_nav_edit_redac_disco" role="button" href="index.php?action=deconnexion">Déconnexion</a>


</div>

    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
    
</body>
</html>


