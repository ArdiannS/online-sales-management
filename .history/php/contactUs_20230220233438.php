<?php 
    include('AboutUs.php');
    include('contactModel.php');
    $user = new ContactModel();
    if(isset($_POST['submit'])){
        $user->setName($_POST['name']);
        $user->setSurname($_POST['surname']);
        $user->setEmail($_POST['email']);
        $user->setReason($_POST['reason']);

        // $existing = $user->existsByUserNameAndEmail($user->getUsername(),$user->getEmail());
        if($existing){

            
        }else{
            echo "<script>alert('Perdoreusi nuk  dasdaekziston');</script>";
            echo "<script>window.location.href = 'AboutUs.php';</script>";
        }

    }



?>