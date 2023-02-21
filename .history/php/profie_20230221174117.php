<!DOCTYPE html>
<html lang="en">
<?php
session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/profile.css">
    <link rel="stylesheet" href="../style/style.css">
    <script src="products.js"></script>
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
    <div class="header" style="width: 100%;">
        <div class="leftLogo">
            <img src="../images/logooo.jpg" width="130px" height="100px" alt="" id="img1">
        </div>
        <div style="margin-left: 3px" class="StartBlock">
            <ul>

                <a href="products.php">
                    <li>Products</li>
                </a>
                <a href="index.html">
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
            <button type="submit" class="searchButton" style="height: 56px;"><img src="../images/search (2).png"
                    style="width: 125%; padding-right: 20px;" alt="">
            </button>
        </div>


        <?php
        include 'UserModel.php';
        $user = new UserModel();
        $result = $user->getCurrentUser();
        ?>

        <div class="rightBlock" style="justify-content: flex-end; gap: 4%;">
            <div class="divBuxheti">
                <img src="../images/download.png" width="30px" alt="" height="30px" id="img2"
                    style=" padding-top: 5px;">
                <a href="logInForm.html">
                    <?php
                    if (isset($_SESSION['username'])) {
                        

                        ?>
                        <p><?php echo $result['username'] ?></p>
                        <?php
                    }
                    ?>


                </a>
            </div>

            <div class="divBuxheti">
                <img src="../images/iStok.jpg" width="30px" alt="" height="30px" id="img2" style=" padding-top: 5px;">
                <a href="profie.html">
                    <p>
                        <?php echo $result['bilanci'] . "$"?>
                    </p>
                </a>
            </div>
        </div>
    </div>
    <div class="profile-main-container">
        <div class="user-profile-card">
            <div class="profile-card-username-holder">
                <?php

                ?>
                <h1>Username :
                    <?php echo  $result['username'] ?>
                </h1>
            </div>
            <div class="profile-card-info-container">
                <h1> Numri total i parave ne karte :
                    <?php echo $result['bilanci'] . "$" ?>
                </h1>
                <h1>Emaili :
                    <?php echo $result['email'] ?>
                </h1>
                <h1>Mosha :
                    <?php echo $result['age'] ?>
                </h1>

                <div class="logoutButton">
                    <div class="" style="display: flex; justify-content: center; margin-right: 36px;">
                        <a href="logOut.php"> <button type="submit" id="loginBtn" name="loginBtn">Log Out</button></a>
                    </div>
                    <style>
                       <style>
    body {
      margin: 0;
      background-color: black;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 30px;
      background-color: white;
      color: black;
      font-weight: bold;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 999;
    }

    .leftLogo img {
      width: 130px;
      height: 100px;
    }

    .StartBlock ul {
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
      list-style: none;
    }

    .StartBlock a {
      text-decoration: none;
      color: black;
    }

    .StartBlock li {
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.2s ease-in-out;
    }

    .StartBlock li:hover {
      transform: scale(1.1);
    }

    .search {
      display: flex;
      align-items: center;
    }

    .searchTerm {
      padding: 10px;
      border: none;
      font-size: 18px;
      width: 500px;
      height: 56px;
    }

    .searchButton {
      padding: 10px;
      background-color: transparent;
      border: none;
      cursor: pointer;
    }

    .searchButton img {
      width: 125%;
      padding-right: 20px;
    }

    .rightBlock {
      display: flex;
      align-items: center;
      gap: 30px;
    }

    .divBuxheti {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 18px;
    }

    .divBuxheti img {
      width: 30px;
      height: 30px;
      padding-top: 5px;
    }

    .divBuxheti a {
      text-decoration: none;
      color: black;
    }

    .user-profile-card {
      max-width: 800px;
      margin: 100px auto;
      background-color: white;
      padding: 50px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-card-username-holder h1 {
      font-size: 32px;
      font-weight: bold;
      margin: 0;
    }

    .profile-card-info-container {
      margin-top: 50px;
      font-size: 24px;
    }

    .profile-card-info-container h1 {
      font-weight: bold;
      margin: 20px 0;
    }

    .editButton {
      background-color: transparent



                    </style>

                </div>
            </div>
        </div>
    </div>

</body>

</html>