<?php 
session_start();
    include('ContactModel.php');
    $contact = new ContactModel();
    if(isset($_POST['submit'])){
        $contact->setName($_POST['name']);
        $contact->setSurname($_POST['surname']);
        $contact->setEmail($_POST['email']);
        $contact->setReason($_POST['reason']);

        $contact->insert();
    }



?>