<?php
   $checkboxes = array("Accessories", "Devices", "Furniture", "Music_Instruments", "Toys", "Animal_Foods", "Plants");
   $i = 0;
   $URLoffset = "";
   while($i < sizeof($checkboxes)){
      if(isset($_POST[$checkboxes[$i]]))$URLoffset .= "&".$checkboxes[$i]."=1"; 
      $i++;
   }
    $index = isset($_POST['indexToLook'])?$_POST['indexToLook']:0;
      if($index <= 0){
        echo "<script>window.location.href = 'http://localhost/prjekti__web/online-sales-management/php/products.php?i=0$URLoffset'</script>";
        return;
      }
      include 'ProductModel.php';
        $db = new ProductModel();
        $result = $db->getProducts();
        $numberOfProducts = 0;
        if($result != null)
        foreach($result as $produkti)
            $numberOfProducts++;
     if($numberOfProducts != 0){
      if(($index-1)*18 < $numberOfProducts)$index--;
      else $index = ceil($numberOfProducts/18)-1;
     }else $index = 0;
     echo "<script>window.location.href = 'http://localhost/prjekti__web/online-sales-management/php/products.php?i=$index$URLoffset'</script>";
?>