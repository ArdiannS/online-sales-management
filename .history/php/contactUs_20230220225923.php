<?php 
    include('AboutUs.php');
    include('UserModel.php');
    if(isset($_POST['submit'])){
        $user->setUsername($_POST['username']);
        $user->setEmail($_POST['email']);
        

        $existing=  $user->

    }



?>