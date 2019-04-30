<?php $title = 'ADMIN' ?>
<?php $header = require('header.php'); ?>
<?php ob_start(); ?>

<div id="connexion" align="center">
    <h2>Connexion</h2>

    <br> <br>

    <form method="POST" action="index.php?action=connexion">
       <input required type="pseudo" name="pseudoConnect" placeholder="pseudo">
       <input required type="password" name="passwordconnect" id="" placeholder="password">
       <input class="btn_submit_edit" type="submit" name="submitConnect" value="Connexion">
    </form>

    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input required type="pseudo" name="pseudoConnect" placeholder="pseudo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input required type="password" name="passwordconnect" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <br>
    <div class="btn_connexion">
        <a class="btn btn-primary" role="button" href="index.php">Retour au blog</a>
        <a class="btn btn-primary" role="button" href="index.php?action=signin">S'inscrire</a>
    </div>
   

    <?php 
    if(isset($error))
    {
        echo '<font color="red">' . $error . "</font>";
    }
    ?>
  
</div>

<?php $footer = require('footer.php'); ?>
<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>
