<?php $title = 'Jean Laroche | Blog des écrivains'; ?>
<?php require('nav.php'); ?>
<div class="container-full">
  <header class="masthead" style="background-image: url('public/img/profil.png')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h2>Inscription</h2>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>
<?php ob_start(); ?>

<div class="container" align="center">
  <form method="POST" action="index.php?action=signin">
    <input required type="pseudo" name="pseudo" id="" placeholder="pseudo"
      value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"><br><br>
    <input required type="email" name="email" id="" placeholder="email"
      value="<?php if(isset($email)) { echo $email; } ?>"><br><br>
    <input required type="password" name="password" id="" placeholder="password"><br><br>
    <input required type="password" name="confirm_password" id="" placeholder="confirm password"><br><br>
    <input class="btn_submit_edit" type="submit" name="signin" value="Créer son compte"><br><br>
  </form>

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

  <p style="color: #2451b9; font-weight: bold;">Déjà un compte ?</p>

  <div class="btn_signin">
    <a class="btn btn-primary" href="index.php?action=connexion">Se connecter</a>

  </div>
  <br>
  <br>
  <a class="btn btn-primary" href="index.php">Retour au blog</a>



</div>

<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>