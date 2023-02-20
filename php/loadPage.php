<?php
   $checkboxes = ['accessories', 'devices', 'furniture', 'music-instruments', 'toys', 'animal-foods','plants'];
   $checkboxesAreOn = [$_POST['accessories'] == "on",$_POST['devices'] == "on", $_POST['furniture'] == "on",
   $_POST['music-instruments'] == "on", $_POST['toys'] == "on", $_POST['animal-foods'] == "on", $_POST['plants'] == "on"];
   $i = 0;
   $URLoffset = "";
   while($i < sizeof($checkboxes)){
      if($checkboxesAreOn[$i]){
         $URLoffset .= "&".$checkboxes[$i]."=1";
      }
      $i++;
   }
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
      if(($index-1)*18 < $numberOfProducts)$index--;
      else $index = ceil($numberOfProducts/18)-1;
      
   }else echo "<script>window.location.href = 'http://localhost/prjekti__web/online-sales-management/php/products.php?i=0'</script>";
?>