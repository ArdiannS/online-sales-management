<?php
   session_start();
        $productName = $_POST['product-name'];
           $productPrice = $_POST['product-price'];
           $productDescription = $_POST['product-description'];
           $image = $_FILES["product-image"];
    include 'DatabaseConnection.php';
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
            $database = new DatabaseConnection();
            $username = $_SESSION['username'];
            $database->insertProductData($productName, $productPrice, $productDescription, $fileName, $username);
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
if(strlen($statusMsg) != 0)
echo "<script>alert($statusMsg);</script>";
echo "<script>window.location.href = 'http://localhost/prjekti__web/online-sales-management/php/publishProduct.php';</script>";
                   
?>