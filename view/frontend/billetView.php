<?php $title = "Jean Forteroche | Billet simple pour l'Alaska"?>

<?php ob_start(); ?>

<?php require('nav.php'); ?>

<div class="container-full">
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('public/img/alaskaNight.webp')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h3>
              <?php echo $billet->title(); ?>
              <br><br>
              <div class="date">le <?= $billet->dateModification(); ?></div>
            </h3>
          </div>
        </div>
      </div>
    </div>
  </header>

</div>


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
<div class="container">


  <?= $billet->content() ?>

  <h4 align="left">Laissez un commentaire</h4>
  <br>
  <div class="comment">

    <form method="post" action="index.php?action=billet&billet=<?= $_GET['billet'] ?>" method="post">
      <div class="addComment">
        <div class="addComment_name">
          <input required type="text" name="author" id="author" placeholder="Auteur" />
          <p class="error"><?php if(isset($error_author)){ echo $error_author; }?></p>
        </div>
        <div class="addComment_com">
          <textarea type="text" name="comment" class='commentaire' placeholder="Commentaire"></textarea>
          <p class="error"><?php if(isset($error_comment)){ echo $error_comment; } ?></p>
        </div>
        <input class="btn_submit_edit_com" type="submit" value="Poster" />
      </div>

    </form>
    <br>
    <div class="table-responsive">
      <table class="table table-hover table-dark">
        <thead>
          <tr class="header_tab">
            <td scope="col" class="auteur">Auteur</td>
            <td scope="col" class="comment">Commentaire</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach($comments as $comment) { ?>

          <tr>
            <td><strong><?= htmlspecialchars($comment->author()) ?></strong><br>
              <div class="date"><?= $comment->dateComment() ?></div>
            </td>
            <td><?= htmlspecialchars($comment->comment()) ?></td>
            <td>
              <a class="btn btn-primary_signaler"
                href="index.php?action=billet&billet=<?= $_GET['billet'] ?>&signaler=<?= $comment->id() ?>">Signaler</a>
            </td>
          </tr>
        </tbody>
    </div>
    <?php } ?>
  </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>