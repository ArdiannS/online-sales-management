<?php

include('UserModel.php');
include('CommentModel.php');
$comment = new CommentModel();
$user = new UserModel();

$cmID = $_GET['id'];
$comment->setId($cmID);
$result = $comment->getCommentsByID();
$commentResult = mysqli_fetch_array($result);
if(isset($_POST['update'])){
        $comment->setcommentContent($_POST['commentUpdated']);
        $comment->update();
}
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        textarea {
            display: block;
            width: 50%;
            height: 150px;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type="submit"] {
            display: block;
            float: left;
            margin: 0 auto;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>


    <form action="" method="POST">
        <label for="comment">Product Review:</label>
        <textarea id="comment" name="commentUpdated"><?php echo $commentResult[3]?></textarea>
        <input type="submit" name="update" value="Edit"></button>
    </form>
</body>

</html>