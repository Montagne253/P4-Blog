<?php $title = 'ADMIN' ?>
<?php $header = require('nav.php'); ?>
<div class="container-full">
<header class="masthead" style="background-image: url('public/img/jean.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <form method="POST" action="index.php?action=connexion">
                <div class="form-group">
                    <input required type="pseudo" name="pseudoConnect" placeholder="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    
                </div>
                <div class="form-group">
                    <input required type="password" name="passwordconnect" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                </div><br><br>
                <button type="submit" name="submitConnect" class="btn btn-primary">Se connecter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</header>
</div>
<?php ob_start(); ?>


<?php $footer = require('footer.php'); ?>
<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
