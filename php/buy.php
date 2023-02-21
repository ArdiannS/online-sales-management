<?php
   include_once("ProductModel.php");
   include_once("UserModel.php");
   $database = new ProductModel();
   $productID = $_GET['product'];
  
   $amount = $_POST['amount'];
   
   $dataInSQLIformat = $database->getProductsByID($productID);
   
   if($dataInSQLIformat == null){
     echo "<script>window.location.href = 'buyProduct.php?product=$productID';</script>";
     return;
   }
   $productData = mysqli_fetch_array($dataInSQLIformat);
   $user = new UserModel();
   $currentUser = $user->getCurrentUser();
   $total = $amount * $productData['price'];
   if($amount > $productData['amount']){
      echo "<script>window.location.href = 'buyProduct.php?product=$productID'</script>";
      return;
   }
   if(array_key_exists("add-to-cart", $_POST))addToCart($productID, $amount, $total);
   if($total > $currentUser['bilanci']){
      echo "<script>window.location.href = 'buyProduct.php?product=$productID'</script>";
      return;
   }
  
  
   if(array_key_exists("add-to-wishlist", $_POST))addToWishlist();
   else if(array_key_exists("buy-now", $_POST))buyNow($user, $database, $currentUser, $productData, $amount);

   function addToWishList(){

   }
   function buyNow($user, $product, $currentUser, $productToBuy, $amount){
     $productToBuyID = $productToBuy['ID'];
     $user->decreaseBalanceById($currentUser['id'], $amount*$productToBuy['price']);
     $product->decreaseAmountOfProductById($productToBuyID, $amount);
     echo "<script>window.location.href = 'buyProduct.php?product=$productToBuyID'</script>";
   }
   function addToCart($productID, $amount, $total){
       if(session_status() != 2) session_start();
       $_SESSION['cart'][$productID] = ["productID"=>$productID, "amount"=>$amount, "total"=>$total];
       $v = $_SESSION['cart'][$productID]["productID"];
       echo "<script>alert($v)</script>";
       echo "<script>window.location.href = 'buyProduct.php?product=$productID'</script>";
   }
?>