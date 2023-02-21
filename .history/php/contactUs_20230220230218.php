<?php 
    include('AboutUs.php');
    include('UserModel.php');
    $user = new UserModel();
    if(isset($_POST['submit'])){
        $user->setUsername($_POST['username']);
        $user->setEmail($_POST['email']);
        $id = $user->getId();
        $existing=  $user->existsByUsername($user->getUsername());
        if($existing){
            
        }else{
            echo "<script>alert('Perdoreusi nuk ekziston');</script>";
            echo "<script>window.location.href = 'logInForm.php';</script>";
        }

    }



?>