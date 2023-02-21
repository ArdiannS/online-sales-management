<?php
include('UserModel.php');
include 'ContactModel.php';
$contact = new ContactModel();
$user = new UserModel();
$id = $_GET['id'];
$deleted = $user->deleteUserById($id);

if ($deleted) {
    echo "<script>alert('dhenat jane DELETE me sukses');
     document.location='dashboard.php'</script>";
}

?>