<?php $title = 'ADMIN' ?>

<?php ob_start(); ?>

<?php $header = require('nav.php'); ?>
<div class="container-full">
<header class="masthead" style="background-image: url('public/img/jean.webp')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row" >
        <div class="col-lg-8 col-md-12 mx-auto">
          <div class="site-heading" >
            <form method="POST" action="index.php?action=connexion">
                <div class="form-group_m">
                    <input required type="pseudo" name="pseudoConnect" placeholder="Pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div><br>
                <div class="form-group_m">
                    <input required type="password" name="passwordconnect" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                </div><br><br>
                <button type="submit" name="submitConnect" class="btn btn-primary">Se connecter</button>
                <br><br>
<?php 
    if(isset($error))
    {
        echo '<font color="red">' . $error . "</font>";
    }
?>
            </form>
          </div>
        </div>
      </div>
    </div>
</header>
</div>

<?php $footer = require('footer.php'); ?>
<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
