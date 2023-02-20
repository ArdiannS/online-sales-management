<?php
   if(isset($_POST['indexToLook'])){
    $index = $_POST['indexToLook'];
      if($index <= 0){
        echo "<script>window.location.href = 'http://localhost/prjekti__web/online-sales-management/php/products.php?i=0'</script>";
        return;
      }
      include 'DatabaseConnection.php';
        $db = new DatabaseConnection();
        $result = $db->getProducts();
        $numberOfProducts = 0;
        foreach($result as $produkti)
            $numberOfProducts++;
      if(($index-1)*18 < $numberOfProducts){
         $index--;
         echo "<script>window.location.href = 'http://localhost/prjekti__web/online-sales-management/php/products.php?i=$index'</script>";
      }else{
         $index = ceil($numberOfProducts/18)-1;
         echo "<script>window.location.href = 'http://localhost/prjekti__web/online-sales-management/php/products.php?i=$index'</script>";
      }
   }else echo "<script>window.location.href = 'http://localhost/prjekti__web/online-sales-management/php/products.php?i=0'</script>";
?>