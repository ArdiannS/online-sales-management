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
                <a href="index.php">
                    <li>Home</li>
                </a>
                <a href="OurStory.html">
                    <li>About us</li>
                </a>
                <a href="AboutUs.php">
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
                <img src="../images/iStok.jpg" width="30px" alt="" height="30px" id="img2" style=" padding-top: 5px;">
                <a href="profie.html">
                    <p>
                        <?php echo $result['bilanci'] . "$" ?>
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
                <h1>Username:
                    <?php echo $result['username'] ?>
                </h1>
            </div>
            <div class="profile-card-info-container">
                <h1> Numri total i parave ne karte:
                    <?php echo $result['bilanci'] . "$" ?>
                </h1>
                <h1>Emaili:
                    <?php echo $result['email'] ?>
                </h1>
                <h1>Mosha:
                    <?php echo $result['age'] ?>
                </h1>
                <div class="edit-button-container">
                </div>

                <div class="logoutButton">
                    <div class="" style="display: flex; justify-content: center; margin-right: 36px;">
                        <a href="logOut.php"> <button type="submit" id="loginBtn" name="loginBtn">Log Out</button></a>
                        <a href="editProfile.php?id=<?php echo $result['id']; ?>" <button class="edit-button"
                            name="edit">Edit</button>

                    </div>
                </div>

                <style>
                    .profile-main-container {
                        text-align: center;

                    }

                    .user-profile-card {
                        padding-top: 100px;
                        background-color: gainsboro;
                    }

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
                    }

                    .logoutButton button {
                        margin: 10px;
                    }

                    .edit-button {
                        border: none;
                        color: white;
                        padding: 8px 16px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 14px;
                        margin: 4px 2px;
                        cursor: pointer;
                    }

                    .edit-button:hover,
                    .delete-button:hover {
                        background-color: #3e8e41;
                        color: white;
                    }
                </style>

            </div>
        </div>
    </div>
    </div>

</body>

</html>