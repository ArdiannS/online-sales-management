<?php
    include "ProductModel.php";
    $product = new ProductModel();
    $id = $_GET['id'];
    $product->setId($id);
    $productData = $product->getProductsById($id);
    if($productData != null) $productData = mysqli_fetch_array($productData);
        $name = $_POST['emri'];
        $price = $_POST['cmimi'];
        $image = $_FILES['foto'];
        $amount = $_POST['sasia'];
        $description = $_POST['description'];
        $productType = $_POST['type'];
        $productType = $productType == 'Music Instruments'?"Music_Instruments":$productType;
        $productType = $productType == 'Animal Foods'?"Animal_Foods":$productType;
        $names = ['emri', 'cmimi','sasia','description'];
        $variables = ['emri'=>$name, 'cmimi'=>$price,'sasia'=>$amount,'description'=>$description];
        $productDefault = [$productData['name'], $productData['price'], $productData['amount'], $productData['description']];
        $limit = sizeof($names);
        $index = 0;
        while($index < $limit){
            if($_POST[$names[$index]] == null)
            $variables[$names[$index]] = $productDefault[$index];
            $index++;
        }   
        $product->setEmri($variables['emri']);
        $image = $_FILES['foto'];
        $product->setCmimi($variables['cmimi']);
        $product->setType($productType);
        $product->setAmount($variables['sasia']);
        $product->setPershkrimi($variables['description']);

        $fileName = basename($image["name"]);
        $targetDir = "../uploads/";
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        if (!empty($fileName)) {
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
               if (move_uploaded_file($image["tmp_name"], $targetFilePath)) {
                    $product->setImage($fileName);
                    $product->update();
                    echo "<script>window.location.href = 'editPost.php?id=$id'</script>";
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        } else {
            $image = $productData['image'];
            $product->setImage($image);
            echo "<script>window.location.href = 'editPost.php?id=$id'</script>";
            $product->update();
            return;
        }
    ?>