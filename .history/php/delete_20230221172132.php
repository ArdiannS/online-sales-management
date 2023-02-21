<?php
include('UserModel.php');
include 'contactModel.php';
$contact = new ContactModel();
$idContact = $contct->getID();
$delete = $contact->deleteByEmail($idContact);
if ($delete){
    echo "<script>alert('dhenat jane DELETE me sukses');
        document.location='dashboard.php'</script>";
    }
$user = new UserModel();
$id = $_GET['id'];
$deleted = $user->deleteUserById($id);
        if ($deleted) {
        echo "<script>alert('dhenat jane DELETE me sukses');
            document.location='dashboard.php'</script>";
        }
?>