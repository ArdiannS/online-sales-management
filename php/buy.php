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
   $productPublisher = $user->getUserById($product['userID']);
   $productPublisher = mysqli_fetch_array($productPublisher);
   $user = new UserModel();
   $currentUser = $user->getCurrentUser();
   $total = $amount * $productData['price'];
   if($amount > $productData['amount']){
      echo "<script>window.location.href = 'buyProduct.php?product=$productID'</script>";
      return;
   }
   if(array_key_exists("add-to-cart", $_POST))addToCart($productID, $amount, $total, $productData);
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
     $user->increaseBalanceById($productPublisher['id'], $amount*$productToBuy['price']);
     $product->decreaseAmountOfProductById($productToBuyID, $amount);
     echo "<script>window.location.href = 'buyProduct.php?product=$productToBuyID'</script>";
   }
   function addToCart($productID, $amount, $total, $productToBuy){
       if(session_status() != 2) session_start();
       $currentAmount = 0;
       $currentTotal = 0;
       if(array_key_exists($productID, $_SESSION['cart'])){
           $currentAmount = $_SESSION['cart'][$productID]['amount'];
           $currentTotal = $_SESSION['cart'][$productID]['total'];
       }
       $totalCost = $currentTotal + $total;
       $totalAmount = $amount + $currentAmount;
       if($totalAmount > $productToBuy['amount']){
          echo "<script>window.location.href = 'buyProduct.php?product=$productID'</script>";
          return;
       }
       $_SESSION['cart'][$productID] = ["productID"=>$productID, "amount"=>$totalAmount, "total"=>$totalCost];
       $v = $_SESSION['cart'][$productID]["productID"];
       echo "<script>window.location.href = 'buyProduct.php?product=$productID'</script>";
   }
?>