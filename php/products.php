<!DOCTYPE html>
<html lang="en">
 <?php 
 include 'UserModel.php';
 session_start();
 $user = new UserModel();
 if (isset($_SESSION['username'])) {
    $useri=$user->getCurrentUser();
    if ($useri['usetype'] != 'admin') {
        // echo "<script>window.location.href = 'logInForm.php';</script>";
    }
}
 ?>   

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/products.css">
    <script src="../js/products.js"></script>
    <link rel="stylesheet" href="../style/style.css">
    <style>
        /* @media screen and (min-width: 768px) {
          body {
            background-color: black;
          }
        }
          @media screen and (max-width: 767px) {
          body {
            background-color: black;
          }
        } */
    </style>
</head>

    
<body style="margin: 0;">
    <?php
     if(session_status() != 2)session_start();
     include_once('UserModel.php');
     $user = new UserModel();
     if (isset($_SESSION['username'])) {
        $currentUser = $user->getCurrentUser();
     }
    ?>
    <div class="header">
        <div class="leftLogo">
            <img src="../images/logooo.jpg" width="130px" height="100px" alt="" id="img1">
        </div>
        <div style="margin-left: 3px" class="StartBlock">
            <ul>

                <a href="products.php">
                    <li>Products</li>
                </a>
                <a href="index.php">
                    <li>Home</li>
                </a>
                <a href="../templates/OurStory.html">
                    <li>About us</li>
                </a>
                <a href="AboutUs.php">
                    <li>Contact us</li>
                </a>


            </ul>
        </div>


        <div class="search">
            <input type="text" class="searchTerm" placeholder="Kerko te gjitha produktet...">
            <button type="submit" class="searchButton" style="height: 56px;"><img src="search (2).png"
                    style="width: 125%; padding-right: 20px;" alt="">
            </button>
        </div>



        <div class="rightBlock" style="justify-content: flex-end; gap: 4%;">
            <div class="divBuxheti">
                <img src="../images/download.png" width="30px" alt="" height="30px" id="img2"
                    style=" padding-top: 5px;">
                    <?php
                if (isset($_SESSION['username'])) {
                    $useri = $user->getCurrentUser();
                    ?>
                    <p>
                        <a href="profie.php">
                            <?php echo $useri['username'] ?>
                        </a>

                    </p>
                <?php } else { ?>

                    <a href="logInForm.php">
                        <p>Log in</p>
                    </a>
                <?php }
                ?>
                </a>
            </div>

            <div class="divBuxheti">
                <img src="../images/iStok.jpg" width="30px" alt="" height="30px" id="img2"
                    style=" padding-top: 5px;">
                    <a href="../templates/cart.html">
                    <?php
                      if (isset($_SESSION['username'])) {
                    ?>
                    <p>
                        <a href="cart.php">
                            <?php echo $currentUser['bilanci'] . "$"?>
                        </a>

                    </p>
                <?php } else { ?>

                    <a href="">
                        <p>Bilanci</p>
                    </a>
                <?php }
                ?>
            </a>
            </div>
        </div>
    </div>


    <button class='publish-product'><a href="publishProduct.php">PUBLISH PRODUCT</a></button>
    <form action="loadPage.php" method="post">
      <div class="preferences-container">
        <div id="preference1" class="product-preference"><input type="checkbox" name="Accessories" id="accessories"><h3>Accessories</h3></div>
        <div id="preference2" class="product-preference"><input type="checkbox" name="Devices" id="devices"><h3>Devices</h3></div>
        <div id="preference3" class="product-preference"><input type="checkbox" name="Furniture" id="furniture"><h3>Furniture</h3></div>
        <div id="preference4" class="product-preference"><input type="checkbox" name="Music Instruments" id="music-instruments"><h3>Music Instruments</h3></div>
        <div id="preference5" class="product-preference"><input type="checkbox" name="Toys" id="toys"><h3>Toys</h3></div>
        <div id="preference6" class="product-preference"><input type="checkbox" name="Animal Foods" id="animal-foods"><h3>Animal Foods</h3></div>
        <div id="preference7" class="product-preference"><input type="checkbox" name="Plants" id="plants"><h3>Plants</h3></div>
      </div> 
       <button type="submit"class="next-products-page">Kerko</button>
       <input name="indexToLook"id="index-to-look"class="products-index-selector"type="number"  placeholder="Ne faqen..">
    </form>
    <script>
        let isValid = false;
        const string = window.location.href, target = "?i=";
        isValid = string.indexOf(target) != -1;
        if(!isValid)window.location.href = window.location.href + "?i=0";
    </script>

    <div class="main-container">
    <div id="products-container"class="products-container">
      <?php
        $index = 0;
        if(isset($_GET['i']))$index = $index + $_GET['i']*18;
        
        include 'ProductModel.php';
        $products = new ProductModel();
        $preferences = [];
        foreach($_GET as $key=>$value){
           if($key != 'i')array_push($preferences, $key);
        }
        
        $result = $products->getProductsByPreference($preferences);
        if($result != null){
        $array = [];
        $limit = $index + 18;
        foreach($result as $produkti)
            array_push($array, $produkti);
        while($index < $limit && $index < sizeof($array)){
            $productID = $array[$index]['ID'];
            $productImage = $array[$index]['image'];
            $productName = $array[$index]['name'];
            $description = $array[$index]['description'];
            $price = $array[$index]['price'];
            echo "<div class='product-box'>
                <a href='buyProduct.php?product=$productID'>
                <img class='product-image' style='height: 100%'src='../uploads/$productImage'>
                <div class='product-box-content'>
                 <h2>$productName</h2>
                    <div class='product-box-description'>
                        <h4>$description</h4>
                    <div>
                  <h4>$price</h4>
                  </div>
                </div>
               </div>
             </a>
           </div>";
           $index++;
        }
      }
    ?>
    </div>
    </div>
</body>

</html>