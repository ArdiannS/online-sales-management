<?php
include 'contactModel.php';
$contact = new ContactModel();
$idContact = $_GET['id'];
$delete = $contact->deleteById($idContact);
if ($delete) {
    echo "<script>alert('Contacti eshte bere Delete me sukses');
        document.location='dashboard.php'</script>";
}
?>