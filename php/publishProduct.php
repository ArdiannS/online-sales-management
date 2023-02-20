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
            <button type="submit" class="searchButton" style="height: 56px;" ><img src="../images/search (2).png" style="width: 125%; padding-right: 20px;"  alt="">
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
          <h4 style="margin-left:42.5%;">Product image</h4>
          <div class='publish-product-field'>
             <input id="file-input" type="file" name="product-image" accept="image/*">
             <!-- <button id="image-button" class="choose-image">Choose an image</button> -->
          </div>   
          <button class="submit-product-button" name='submit-button' type="submit" >SUBMIT</button>
          <h3 id='about-submission'></h3>
       </form>
    </div>
</body>
</html>