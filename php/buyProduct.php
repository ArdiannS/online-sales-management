<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/secondProduct.css">
</head>

<body style="margin: 0;">
    <?php
        session_start();
        include_once('UserModel.php');
        $user = new UserModel();
        if (isset($_SESSION['username'])) {
            $currentUser = $user->getCurrentUser();
        }

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
            <button type="submit" class="searchButton"><img src="../images/search (2).png"
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
                    <a href="../templates/profie.html">
                    <?php
                if (isset($_SESSION['username'])) {
                    ?>
                    <p>
                        <a href="profie.php">
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

    <?php
    include_once('ProductModel.php');
    $pd = new ProductModel();
    if (isset($_GET['product'])) {
        $product_slug = $_GET['product'];
        $product_data = $pd->getProductsByID($product_slug);
        
        $product = mysqli_fetch_array($product_data);
        $productPublisher = $user->getUserById($product['userID']);
        $productPublisher = mysqli_fetch_array($productPublisher);
        if ($product) {
            ?>
            <div class="main-container-product" style="">
                <div class="main-cointaner-product-image">
                    <div class="img-holder-products">
                        <img class="product-image" style="height:70%;padding-right : 100px"
                            src="<?php echo "../uploads/".$product['image']?>">
                    </div>
                    <div class="main-cointaner-product-description">
                        <h1>Produkti:<?php echo $product['name'] ?></h1>
                        <p>Besueshmëria: 100%</p>
                        <p>
                            <?php echo "Postuar nga: " . $productPublisher['username'] ?>
                        </p>
                        <p>Çmimi i transportit: <b>Free </b></p>





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
        
            <div class="price-product" style="border :3px solid gray; height : 100%; min-width:40%;margin-left : 100px">
                <h1><?php echo "Cmimi: " . $product['price'] . "$"?></h1>
                <h3>There are <?php echo $product['amount']?> of this product in stock</h3><br><br>
                <form action="buy.php?product=<?php echo $product_slug?>" method="post">
                  <input type="number" name="amount" min="1" class="count-products" value="1" placeholder="Sasia"><br> <br>
                  <button type="submit" name="add-to-cart"class="add-to-cart">Add to Cart</button>
                  <button type="submit" name="add-to-wishlist"class="add-to-wishlist">Add to Wishlist</button><br><br>
                  <button type="submit" name="buy-now"class="buy-now">Buy now</button>
                </form>
            </div>
        </div>
    </div>  


            </div>

            <?php
        } else {
            echo "Product not found";
        }

    } else {
        echo "Something went wrong";
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