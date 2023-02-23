<?php
include('UserModel.php');
// include 'contactModel.php';
// $contact = new ContactModel();
// $idContact = $_GET['id'];
// $delete = $contact->deleteById($idContact);
// if ($delete) {
//     echo "<script>alert('Delete dhenat jane DELETE me sukses');
//         document.location='dashboard.php'</script>";
// }
$user = new UserModel();
$id = $_GET['id'];
$deleted = $user->deleteUserById($id);
if ($deleted) {
    echo "<script>alert('dhenat jane DELETE me sukses');
            document.location='dashboard.php'</script>";
}

?>