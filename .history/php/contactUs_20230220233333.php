<?php 
    include('AboutUs.php');
    include('contactModel.php');
    $ = new ContactModel();
    if(isset($_POST['submit'])){
        $name=$_POST['username'];
        $user->setEmail($_POST['email']);

        $existing = $user->existsByUserNameAndEmail($user->getUsername(),$user->getEmail());
        if($existing){

            
        }else{
            echo "<script>alert('Perdoreusi nuk  dasdaekziston');</script>";
            echo "<script>window.location.href = 'AboutUs.php';</script>";
        }

    }



?>