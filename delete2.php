
<?php 

$bdd = new PDO('mysql:host=localhost;dbname=p4;charset=utf8', 'root', 'Dj253kolo932018');



if(isset($_GET['comment']) AND !empty($_GET['comment'])) {

    $commentId = htmlspecialchars($_GET['comment']);
    
    $deleteComment = $bdd->prepare('DELETE FROM comment WHERE id = ?');
    $deleteComment->execute(array(
        $commentId
    ));
    

    header('Location: editComment.php?billet='.$_GET['billet']);

    
    
}






?>
