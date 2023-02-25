<?php
   include_once('RatingModel.php');
   include_once('ProductModel.php');
   include_once('UserModel.php');
   $userModel = new UserModel();
   $productModel = new ProductModel();
   $rating = new RatingModel();
   $currentUser = $userModel->getCurrentUser();
   $productModel->setId($_GET['product']);
   $productID = $_GET['product'];
   $rating->setProductID($_GET['product']);
   $rating->setUserID($currentUser['id']);
   $userRating = $_POST['rating'];
   if($userRating == null || $userRating < 0 || $userRating > 5){
     echo "<script>alert('Invalid rating.'); window.location.href = 'buyProduct.php?product=$productID'</script>";
     return;
   }
   
   $rating->setRating($userRating);
   if($rating->hasBeenRatedByUser($currentUser['id'])){
     $previousRating = $rating->updateUserRating();
     $productModel->updateRating($userRating, $previousRating);
     echo "<script>alert('Your feedback has been received.'); window.location.href = 'buyProduct.php?product=$productID'</script>";
     return;
   }
     $rating->insertUserRating();
     $productModel->addRating($userRating);
     echo "<script>alert('Your feedback has been received.'); window.location.href = 'buyProduct.php?product=$productID'</script>";
?>