<?php
session_start();
include('UserModel.php');
$user = new UserModel();
if (isset($_SESSION['username'])) {
    $useri = $user->getCurrentUser();
    if ($useri['usetype'] == 'admin') {
        echo "<script>alert('Welcome back');</script>";
        echo "<script>window.location.href = 'indexDash.php';</script>";
    } else if ($useri['usetype'] == 'USER') {
        // echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<script>window.location.href = 'logInForm.php';</script>";
    }
} else {
    // echo "<script>window.location.href = 'index.php';</script>";

}
?>
<html>
<style>

</style>

<head>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../style/secondSlider.css">
    <script src="../js/secondSlider.js"></script>
    <script src="../js/script.js"></script>
    <style>
        @media screen and (min-width: 768px) {
            body {
                background-color: black;
            }
        }

        @media screen and (max-width: 767px) {
            body {
                background-color: black;
            }
        }
    </style>
</head>

<body style="margin: 0;">
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
                <a href="../templates/AboutUs.html">
                    <li>Contact us</li>
                </a>
                <?php

                ?>



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
                <a href="profie.php">
                    <?php
                    $useri = $user->getCurrentUser();
                    ?>
                    <p>
                        <?php
                        if ($useri['username'] != null) {
                            echo $useri['username'] ?>
                        </p>
                    <?php
                        } else {
                            echo $useri['username'] ?>
                        </p>
                    <?php } ?>
                </a>
            </div>

            <div class="divBuxheti">
                <img src="../images/iStok.jpg" width="30px" alt="" height="30px" id="img2" style=" padding-top: 5px;">
                <a href="profie.php">
                    <?php
                    $useri = $user->getCurrentUser();
                    ?>
                    <p>
                        <?php echo $useri['bilanci'] . "$" ?>
                    </p>

                </a>
            </div>
        </div>
    </div>

    <div class="preferences-container">
        <div id="preference1" class="product-preference">
            <h3>Accessories</h3>
        </div>
        <div id="preference2" class="product-preference">
            <h3>Devices</h3>
        </div>
        <div id="preference3" class="product-preference">
            <h3>Furniture</h3>
        </div>
        <div id="preference4" class="product-preference">
            <h3>Music instruments</h3>
        </div>
        <div id="preference5" class="product-preference">
            <h3>Toys</h3>
        </div>
        <div id="preference6" class="product-preference">
            <h3>Animal foods</h3>
        </div>
        <div id="preference7" class="product-preference">
            <h3>Plants</h3>
        </div>
    </div>

    <a href="">
        <img src="" name="slide" alt="" style="height: 350px" width="100%">
    </a>

    <div class="special-offers">
        <img src="../images/special-offer-background.jfif" class="special-offers-background">
        <img id="productImage" src="../images/gaming-chair.png" class="special-offers-image">
        <div class="special-offers-information-holder">
            <h1 id="productTitle" class="special-offers-title">GAMING CHAIR</h1>
            <div class="special-offers-description-holder">
            </div>
            <h3 id="productDescription" class="special-offers-description">A gaming chair is a type of chair designed
                for the comfort of gamers. They differ from most office chairs in having high
                backrest designed to support the upper back and shoulders</h3>
        </div>
        <img src="../images/arrow-next.png" id="nextSpecialOffer" class="next-special-offer-button">
    </div>

    <footer class="main-footer">
        <div class="partners">
            <div id="h3meet">
                <h3>Meet our partners</h3>
            </div>
            <div class="imgHolder">
                <img src="../images/msi.jpg" alt="" width="200px" id="id1">
                <img src="../images/lenovo.png" alt="" width="200px" id="id2">
                <img src="../images/stl.png" alt="" width="200px" id="id2">
                <img src="../images/smsg.png" alt="" width="200px" id="id2">

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
                <a href="">
                    <p>Behu partner</p>
                </a>
            </div>
            <div class="divH2">
                <h3>Rreth Nesh</h3>
                <a href="">
                    <p>Rreth (Emrit te kompanise)</p>
                </a>
                <a href="">
                    <p>Produktet</p>
                </a>
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