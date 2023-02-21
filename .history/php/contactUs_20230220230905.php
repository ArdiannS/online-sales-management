<?php 
    include('AboutUs.php');
    include('UserModel.php');
    $user = new UserModel();
    if(isset($_POST['submit'])){
        $user->setUsername($_POST['username']);
        $user->setEmail($_POST['email']);
        $existing=  $user->existsByUsername($user->getUsername());
        if($existing){
            
        }else{
            echo "<script>alert('Perdoreusi nuk  dasdaekziston');</script>";
            echo "<script>window.location.href = 'AboutUs.php';</script>";
        }

    }



?>