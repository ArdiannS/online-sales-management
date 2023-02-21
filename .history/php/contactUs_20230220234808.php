<?php 
    include('AboutUs.php');
    include('ContactModel.php');
    $user = new ContactModel();
    if(isset($_POST['submit'])){
        $user->setName($_POST['name']);
        $user->setSurname($_POST['surname']);
        $user->setEmail($_POST['email']);
        $user->setReason($_POST['reason']);
        $user->insert($user->getName(),$user->getSurname(),$user->getEmail(),$user->getReason());
    }



?>