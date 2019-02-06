<?php 

$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');



if(isset($_GET['id']) AND !empty($_GET['id'])) {

    $comment_id = htmlspecialchars($_GET['id']);
    
    $deleteComment = $bdd->prepare('DELETE FROM comment WHERE id = ?');
    $deleteComment->execute(array($comment_id));

    header('Location: billet.php?billet=' . $_GET['billet']);
    
}

?>