<?php
include('UserModel.php');
include 'contactModel.php';
$contact = new ContactModel();
$email = $_GET['email'];
$email = $contact->deleteByEmail($email);
$user = new UserModel();
$deleted = $user->deleteUserById($id);
        if ($deleted) {
        echo "<script>alert('dhenat jane DELETE me sukses');
            document.location='dashboard.php'</script>";
        }
?>