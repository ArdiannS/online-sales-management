<?php
include('CommentModel.php');
$comment = new CommentModel();
$cmID = $_GET['id'];
$comment->setId($cmID);
$deleted = $comment->deleteByCommentID();
if($deleted){
    echo "<script>alert('Komenti eshte bere delete me sukses');
    document.location='products.php'</script>";
}



?>