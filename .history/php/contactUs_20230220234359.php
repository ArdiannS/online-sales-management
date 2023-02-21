<?php 
    include('AboutUs.php');
    include('ContactModel.php');
    $user = new ContactModel();
    if(isset($_POST['submit'])){
        $user->setName($_POST['name']);
        $user->setSurname($_POST['surname']);
        $user->setEmail($_POST['email']);
        $user->setReason($_POST['reason']);

        $user->insert();

        // if($existing){

            
        // }else{
        //     echo "<script>alert('Perdoreusi nuk  dasdaekziston');</script>";
        //     echo "<script>window.location.href = 'AboutUs.php';</script>";
        // }

    }



?>