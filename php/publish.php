<?php
        if($_POST['product-name'] == null || $_POST['product-price'] == null || $_POST['product-description'] == null||$_FILES['product-image'] == null || $_POST['product-amount'] == null){
            echo "<script>alert('some fields are null');window.location.href = 'publishProduct.php';</script>";
            return;
        }
        $productName = $_POST['product-name'];
        $productPrice = $_POST['product-price'];
        $productDescription = $_POST['product-description'];
        $image = $_FILES["product-image"];
        $productType = $_POST['product-type'];
        $productType = $productType == 'Music Instruments'?"Music_Instruments":$productType;
        $productType = $productType == 'Animal Foods'?"Animal_Foods":$productType;
        $productAmount = $_POST['product-amount'];
        if(strlen($productName) == 0 || $productPrice < 0 || strlen($productDescription) == 0 || $productAmount < 0){
            echo "<script>alert('fields are not null, but have invalid input');window.location.href = 'publishProduct.php';</script>";
            return;
        }
    include 'ProductModel.php';
    include 'UserModel.php';
$statusMsg = '';
$fileName = basename($image["name"]);
// File upload path
$targetDir = "../uploads/";
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

// echo "<script>console.log('$targetFilePath');</script>";
if(!empty($fileName)){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($image["tmp_name"], $targetFilePath)){
            // Insert image file name into database
          
            $productModel = new ProductModel();
            $productModel->setEmri($productName);
            $productModel->setPershkrimi($productDescription);
            $productModel->setImage($fileName);
            $productModel->setCmimi($productPrice);
            $userModel = new UserModel();
            $currentUser = $userModel->getCurrentUser();
            $currentUserId = $currentUser['id'];
            $productModel->setId($currentUserId);
            $productModel->setType($productType);
            $productModel->setAmount($productAmount);
            $productModel->insert();
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    echo "<script>alert('filename is empty');window.location.href = 'publishProduct.php';</script>";
    return;
}

// Display status message
if(strlen($statusMsg) != 0)
echo "<script>alert($statusMsg);</script>";
echo "<script>window.location.href = 'http://localhost/prjekti__web/online-sales-management/php/publishProduct.php';</script>";
                   
?>