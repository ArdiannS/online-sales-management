<!DOCTYPE html>
<html>
<?php
include 'ProductModel.php';
include 'UserModel.php';
session_start();
?>

<head>
    <title>Split Page Example</title>
    <link rel="stylesheet" href="../style/dashboard.css">

</head>

<body>
    <div class="header">
        <div class="leftLogo">
            <img src="../images/logooo.jpg" width="130px" height="100px" alt="" id="img1">
        </div>
        <div style="margin-left: 3px" class="StartBlock">
            <ul class="inline-list">

                <a href="index.php">
                    <li>Home</li>
                </a>
                <a href="products.php">
                    <li>Products</li>
                </a>
                <a href="AboutUs.php">
                    <li>Contact us</li>
                </a>
                <?php

                ?>
            </ul>
        </div>
    </div>

       <div class="main-container">
        <div class="sidebar">
            <div class="dashboard-buttons-layout">
                 <div class="dashboard-div-button-container">
                     <div class="dashboard-div-button" id="list-products">
                       <h3>Product List</h3>
                     </div> 
                </div>

           </div> 
        
        <script>
           document.getElementById('list-products').addEventListener('click',function(){
                window.location.href = 'editYourPost.php';
           });

        </script>
        </div>
        <div class="content" style="background-color: gray;">
            <h1 style="text-align:center;">Your Products</h1>
            <table class="user-table">
                <thead>
                    <tr>
                        <th>ID Product</th>
                        <th>User ID</th>
                        <th>Emri</th>
                        <th>Pershkrimi</th>
                        <th>Cmimi</th>
                        <th>Lloji</th>
                        <th>Sasia</th>
                        <th>Koha e fundit e edituar</th>
                        <th>Action</th>
                    </tr>
                    <?php

                    $user = new UserModel();
                    $products = new ProductModel();
                    $current = $user->getCurrentUser();

                    $id = $current[0];


                    $results = $products->getYourOwnProducts($id);

                    foreach ($results as $produkti) {
                        ?>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo $produkti['ID'] ?>
                            </td>
                            <td>
                                <?php echo $produkti['userID'] ?>
                            </td>
                            <td>
                                <?php echo $produkti['name'] ?>
                            </td>
                            <td>
                                <?php echo $produkti['description'] ?>
                            </td>
                            <td>
                                <?php echo $produkti['price'] ?>
                            </td>
                            <td>
                                <?php echo $produkti['type'] ?>
                            </td>
                            <td>
                                <?php echo $produkti['amount'] ?>
                            </td>
                            <td>
                                <?php echo $produkti['last_edit_time'] ?>
                            </td>
                            <td>
                                <a href="editPost.php?id=<?php echo $produkti['ID']; ?>" <button
                                    class="edit-button">Edit</button></a>
                                <a href="deleteYourProduct.php?id=<?php echo $produkti['ID']; ?>" <button class="delete-button"
                                    name="delete">Delete</button>
                            </td>
                            <?php
                    }
                    ?>
                        </thead>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>