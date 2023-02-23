<?php 
include 'ProductModel.php';
$prodcut = new ProductModel();
$idDelete = $_GET['id'];
$deleteProduct = $prodcut->deleteProductByID($idDelete);
if ($deleteProduct) {
    echo "<script>alert('Produkti juaj eshte delete me sukses.!');
    document.location='editYourPost.php'</script>";
}
?>