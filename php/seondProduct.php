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
                    <p>Llogaria ime</p>
                </a>
            </div>

            <div class="divBuxheti">
                <img src="../images/iStok.jpg" width="30px" alt="" height="30px" id="img2"
                    style=" padding-top: 5px;">
                    <a href="profie.html">
                <p>0.0 </p>
            </a>
            </div>
        </div>
    </div>

    <?php
    include 'productModel.php';
    $pd = new productModel();
    if (isset($_GET['product'])) {
        $product_slug = $_GET['product'];
        $product_data = $pd->getProductsByID($product_slug);
        $product = mysqli_fetch_array($product_data);
        if ($product) {
            ?>
            <div class="main-container-product" style="">
                <div class="main-cointaner-product-image">
                    <div class="img-holder-products">
                        <img class="product-image" style="height:70%;padding-right : 100px"
                            src="<?php echo $product['image']; ?>">
                    </div>
                    <div class="main-cointaner-product-description">
                        <h1>
                            <?php echo "Produkti:" . $product['emri'] ?>
                        </h1>
                        <p>Besueshmëria:100 %</p>
                        <p>
                            <?php echo "Dizajnuar per :" . $product['emri'] ?>
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
                <h1><?php echo "Cmimi:" . $product['cmimi'] . "$"?></h1>
                <h3>Dispoeshmeria : Aktive </h3>
                <h3>Me shume se 3 produkte</h3><br><br>
                <button><input type="number" min="1" class="count-products" value="1" placeholder="Sasia"> Sasia</button><br> <br>
                <button class="add-to-cart">Add to Cart</button>
                <button class="add-to-wishlist">Add to Wishlist</button><br> <br>
                <button class="buy-now">Buy now</button>
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
                <img src="./logooo2.jpg" alt="" width="200px" id="img1">

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