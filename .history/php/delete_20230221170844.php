<?php
include('UserModel.php');
include 'contactModel.php';
$contact = new ContactModel();
$email = $contact->deleteByEmail($email);
$contact->deleteByEmail($email)
$user = new UserModel();
$id = $_GET['id'];
$deleted = $user->deleteUserById($id);
        if ($deleted) {
        echo "<script>alert('dhenat jane DELETE me sukses');
            document.location='dashboard.php'</script>";
        }
?>