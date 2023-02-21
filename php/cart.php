<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/secondProduct.css">
    <link rel="stylesheet" href="../style/cartPage.css">
</head>

<body style="margin: 0;">
    <?php
        session_start();
        include_once('UserModel.php');
        include_once('ProductModel.php');
        $productDatabase = new ProductModel();
        $user = new UserModel();
        $products = [];
        if (isset($_SESSION['username'])) 
            $currentUser = $user->getCurrentUser();
        if(isset($_SESSION['cart'])) $products = $_SESSION['cart'];
   ?>
    <div class="header">
        <div class="leftLogo">
            <img src="../images/logooo.jpg" width="130px" height="97px" alt="" id="img1">
        </div>
        <div style="margin-left: 3px" class="StartBlock">
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
            <button type="submit" class="searchButton"><img src="search (2).png"
                    style="width: 125%; padding-right: 20px;" alt="">
            </button>
        </div>



        <div class="rightBlock" style="justify-content: flex-end; gap: 4%;">
            <div class="divBuxheti">
                <img src="../images/download.png" width="30px" alt="" height="30px" id="img2"
                    style=" padding-top: 5px;">
                    <p><?php echo $currentUser['username']?></p>
                </a>
            </div>
            <div class="divBuxheti">
                <img src="../images/iStok.jpg" width="30px" alt="" height="30px" id="img2"
                    style=" padding-top: 5px;">
                    <a href="profie.html">
                <p><?php echo ($currentUser['bilanci'] == null?0:$currentUser['bilanci']).""?> </p>
            </a>
            </div>
        </div>
    </div>
    <?php
       foreach($products as $key=>$value){
        $currentProductData = $productDatabase->getProductsByID($key);
        if($currentProductData == null) continue;
        $currentProductData = mysqli_fetch_array($currentProductData);
        if($currentProductData == null){
            continue;
        }
    ?>
    <div class="cart-main-container">
       <div class="product-in-cart">
           <div class="product-card-image-container">
              <img class="product-card-image" src="../uploads/<?php echo $currentProductData['image']?>">
           </div>
           <div class="product-card-additional-information">
              <h2><?php echo $currentProductData['name']?></h2>
              <h2><?php echo $currentProductData['type']?></h2>
              <h2><?php echo $currentProductData['price']?></h2>
              <h2><?php echo $value['total']?></h2>
              <h2><?php echo $value['amount']?></h2>
           </div>
       </div>
    </div>
    <?php
     }
    ?>
    <footer class="main-footer">
        <div class="partners">
            <div id="h3meet">
                <h3>Meet our partners</h3>
            </div>
            <div class="imgHolder">
                <img src="../images/msi.jpg" alt="" width="200px" id="id1"
                 >
                <img src="../images/lenovo.png" alt="" width="200px" id="id2">
                <img src="../images/stl.png" alt="" width="200px" id="id2"
                    >
                <img src="../images/smsg.png" alt="" width="200px" id="id2"
                    >

            </div>

        </div>

        <div class="divF">
            <div class="Help">
                <img src="../images/logooo2.jpg" alt="" width="200px" id="img1">
            </div>
            <div class="divHelp">
                <h3>Ndihma dhe Kontakti</h3>
                <a href="">
                    <p>Probleme me llogarine ?</p>
                </a>
                <a href="">
                    <p>Keni harruar Fjalkalimin</p>
                </a>

        </div>
        <div class="divH1">
             <h3>Programi partneritetit</h3>
                <a href=""> <p>Behu partner</p></a>
        </div>
        <div class="divH2">
           <h3>Rreth Nesh</h3>
                <a href=""> <p>Rreth (Emrit te kompanise)</p></a>
            <a href=""> <p>Produktet</p></a>
        </div>
        <div class="Pay">
            <h2>Menyrat tona te pageses</h2>
            <a href=""><img src="../images/raif.png" alt="" width="40px"></a>
            <img src="../images/nlb.jpeg" alt="" width="50px">
            <img src="../images/visa.jpg" alt="" width="35px">
            <img src="../images/visaE.png" alt="" width="35px">
            <img src="../images/mst.png" alt="" width="35px">
            <img src="../images/mst2.png" alt="" width="35px">
        </div>
    </div>

        </div>
    </footer>



</body>

</html>