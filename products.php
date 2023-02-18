<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="products.css">
    <script src="products.js"></script>
    <link rel="stylesheet" href="style.css">
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
    <div class="header">
        <div class="leftLogo">
            <img src="./logooo.jpg" width="130px" height="100px" alt="" id="img1">
        </div>
        <div style="margin-left: 3px"class="StartBlock">
            <ul>

                <a href="products.php">
                    <li>Products</li>
                </a>
                <a href="index.php">
                    <li>Home</li>
                </a>
                <a href="OurStory.html">
                    <li>About us</li>
                </a>
                <a href="AboutUs.html">
                <li>Contact us</li>
                </a>


            </ul>
        </div>


        <div class="search">
            <input type="text" class="searchTerm" placeholder="Kerko te gjitha produktet...">
            <button type="submit" class="searchButton" style="height: 56px;" ><img src="search (2).png" style="width: 125%; padding-right: 20px;"  alt="">
            </button>
        </div>
 


        <div class="rightBlock" style="justify-content: flex-end; gap: 4%;">
            <div class="divBuxheti">
                <img src="./download.png" width="30px" alt="" height="30px" id="img2"
                    style=" padding-top: 5px;">
                    <a href="logInForm.php">
                    <p>Llogaria ime</p>
                </a>
            </div>

            <div class="divBuxheti">
                <img src="./iStok.jpg" width="30px" alt="" height="30px" id="img2"
                    style=" padding-top: 5px;">
                    <a href="profie.html">
                <p>0.0 </p>
            </a>
            </div>
        </div>
    </div>




    <div class="preferences-container">
        <div id="preference1" class="product-preference"><h3>Accessories</h3></div>
        <div id="preference2" class="product-preference"><h3>Devices</h3></div>
        <div id="preference3" class="product-preference"><h3>Furniture</h3></div>
        <div id="preference4" class="product-preference"><h3>Music instruments</h3></div>
        <div id="preference5" class="product-preference"><h3>Toys</h3></div>
        <div id="preference6" class="product-preference"><h3>Animal foods</h3></div>
        <div id="preference7" class="product-preference"><h3>Plants</h3></div>
    </div> 


    

   
    <button class="next-products-page">Next</button>
    <div class="search-page-index"><h4>Kerko</h4></div>
    <input class="products-index-selector"type="text" placeholder="Ne faqen..">


    <div class="main-container"> 
    <div class="products-container">
    <?php
        include 'productModel.php';
        $produkti = new ProductModel();
        $result = $produkti->getProducts();
        foreach($result as $produkti){
    ?><div class="product-box" >
        <a href="seondProduct.php?product=<?= $produkti['ID'] ?>"> 
            <img class="product-image"src="<?php echo  $produkti['image'];?>">
            <div class="product-box-content">
                <h2><?php echo "Emri:" . $produkti['emri'] ?></h2>
                <div class="product-box-description">
                    <h4><?php echo "Pershkrimi: <br>" .  $produkti['pershkrimi'] ?></h4>
                        <div>
                        <h4><?php echo "Cmimi :" . $produkti['cmimi'] . "$"?></h4>
                        </div>
                </div>
        </div>
        </a>
    </div>
    
    <?php 
        } 
    ?>
    </div>
    </div>
    
 

        
        
       
</body>
</html>