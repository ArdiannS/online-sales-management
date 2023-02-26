<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/products.css">
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
    <div class="header" style="overflow=hidden">
        <div class="leftLogo">
            <img src="../images/logooo.jpg" width="130px" height="100px" alt="" id="img1">
        </div>
        <div style="margin-left: 3px"class="StartBlock">
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
            <button type="submit" class="searchButton" style="height: 56px;" ><img src="../images/search (2).png" style="width: 125%; padding-right: 20px;"  alt="">
            </button>
        </div>
 


        <div class="rightBlock" style="justify-content: flex-end; gap: 4%;">
            <div class="divBuxheti">
                <img src="../images/download.png" width="30px" alt="" height="30px" id="img2"
                    style=" padding-top: 5px;">
                    <?php
                    session_start();
                    include 'UserModel.php';
                    $user = new UserModel();
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
                            <?php echo $useri['bilanci'] . "$"?>
                        </a>

                    </p>
                <?php } else { ?>

                    <a href="">
                        <p>Bilanci</p>
                    </a>
                <?php }
                ?>
            </div>
        </div>
    </div>
    <div class='publish-product-main-container'>
     
       <form class='publish-product-form'action="publish.php" method="post" enctype='multipart/form-data'>
          
               <div class="publish-product-form-header-container"><h1>PUBLISH A PRODUCT</h1></div>
          
          <div class='publish-product-field'>
             <input class="publish-product-input"type="text" name="product-name" placeholder='Product name...'>
          </div>
          <div class='publish-product-field'>
              <input class="publish-product-input"type="number" name="product-price" placeholder='Product price...'>
          </div>
          <div class='publish-product-field' style="height: 30%">
              <textarea style="max-height: 100%; min-height:20%; min-width: 20%;"name="product-description" cols="30" rows="10" maxlength="499"placeholder="Product description..."></textarea>
        </div>
          <div class='publish-product-field' style="display:inline; height:30%;">
            <div style="height: 30%">
             <label for="file-input">Choose Image</label><input id="file-input" hidden="hidden" type="file" placeholder="Choose image" name="product-image" accept="image/*">
            </div>
            <div style="height: 30%">
             <select name="product-type" >
                    <option value="Accessories">Accessories</option>
                    <option value="Devices">Devices</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Music Instruments">Music Instruments</option>
                    <option value="Toys">Toys</option>
                    <option value="Animal Foods">Animal Foods</option>
                    <option value="Plants">Plants</option>
              </select></div>
              <div style="height: 30%"><input type="number" name="product-amount"class="publish-product-input" placeholder="Sasia e produktit..."></div>
          </div>   
          <button class="submit-product-button" name='submit-button' type="submit" >SUBMIT</button>
          <h3 id='about-submission'></h3>
       </form>
    </div>
</body>
</html>