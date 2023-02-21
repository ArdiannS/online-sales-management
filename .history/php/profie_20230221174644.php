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
                        <p>
                            <?php echo $result['username'] ?>
                        </p>
                        <?php
                    }
                    ?>


                </a>
            </div>

            <div class="divBuxheti">
                <img src="../images/download.png" width="30px" alt="" height="30px" id="img2"
                    style=" padding-top: 5px;">
                <div class="dropdown">
                    <button class="dropbtn">
                        <?php echo $result['username'] ?>
                    </button>
                    <div class="dropdown-content">
                        <a href="profile.php">Profile</a>
                        <a href="#">Settings</a>
                        <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="profile-main-container">
        <div class="user-profile-card">
            <div class="profile-card-username-holder">
                <?php

                ?>
                <h1>Username :
                    <?php echo $result['username'] ?>
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
                <div class="edit-button-container">
                </div>

                <div class="logoutButton">
                    <div class="" style="display: flex; justify-content: center; margin-right: 36px;">
                        <a href="logOut.php"> <button type="submit" id="loginBtn" name="loginBtn">Log Out</button></a>
                        <button class="edit-button">Edit Info</button>

                    </div>
                </div>

                <style>
                    button {
                        border: none;
                        padding: 10px;
                        background-color: rgb(red, green, blue);
                        border-radius: 12px;
                        color: black;
                        font-weight: bold;
                        cursor: pointer;
                        width: 150px;
                        height: 40px;
                        .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropbtn {
  background-color: transparent;
  border: none;
  cursor: pointer;
  font-size: 16px;
  margin: 0;
  padding: 0;
  font-weight: bold;
}

.dropbtn:hover {
  color: #fff;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

                    }
                </style>

            </div>
        </div>
    </div>
    </div>

</body>

</html>