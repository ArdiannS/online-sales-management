<?php
include('UserModel.php');
$user = new UserModel();
$id = $_GET['id'];
$deleted = $user->deleteUserById($id);

if ($deleted) {
    echo "<script>alert('dhenat jane DELETE me sukses');
     document.location='dashboard.php'</script>";
}

?>