<?php
include('UserModel.php');
include 'ContactModel.php';
$contact = new ContactModel();
$user = new UserModel();
$id = $_GET['id'];
$email = $_GET['email'];
$deleted = $user->deleteUserById($id);
$delete = $contact->deleteByEmail($email);
if ($deleted) {
    echo "<script>alert('dhenat jane DELETE me sukses');
     document.location='dashboard.php'</script>";
}
if ($delete) {
    echo "<script>alert('dhenat jane DELETE me sukses');
     document.location='dashboard.php'</script>";
}

?>