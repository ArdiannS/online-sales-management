<!DOCTYPE html>
<html>
  <?php
    if(session_status() != 2)
    session_start();
  ?>
<head>
    <title>Split Page Example</title>
    <link rel="stylesheet" href="../style/dashboard.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Add styles for main container */
        .main-container {
            display: flex;
            height: 100vh;
        }

        /* Add styles for sidebar container */
        .sidebar {
            width: 20%;
            background-color: black;
            color: white;
            padding: 20px;
        }

        /* Add styles for content container */
        .content {
            width: 80%;
            padding: 20px;
        }

        .inline-list li {
            list-style: none;
            display: inline;
            padding-left: 40px;
            font-size: 20px;
            text-decoration: none;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: black;
        }

        .leftLogo {
            margin-right: 10px;
        }

        .StartBlock {
            margin-right: auto;
            gap: 5%;
        }

        .rightBlock {
            background-color: red;
            width: 15%;
            display: flex;
            gap: 4%;

        }

        /* .divBuxheti {
            width: 45%;
            background-color: #fafbfc;
            align-items: center;
            border-radius: 9px;
            display: flex;
            justify-content: center;
            justify-content: space-around;
        } */
        .divBuxheti {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background-color: #ccc;
            width: 50%;
        }

        .divBuxheti img {
            width: 20px;
            height: 20px;
            padding-right: 10px;

        }

        .divBuxheti:hover {
            background-color: #999;
            cursor: pointer;
        }

        .divBuxheti a {
            display: none;
        }

        .divBuxheti p {
            text-align: center;
        }


        * {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: white;
        }

        .sidebar li {
            margin-left: 45px
        }

        .user-table th {
            background-color: #ddd;
            font-weight: bold;
            padding: 8px;
            text-align: left;
        }

        .user-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .user-table td {
            padding: 8px;
        }

        .edit-button {
            background-color: #4CAF50;
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

        .delete-button {
            background-color: #f44336;
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

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
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
    <!-- Wrap everything in a main container -->
    <div class="main-container">
        <!-- Add the sidebar container -->
        <div class="sidebar">
            <!-- Sidebar content here -->
            <div class="dashboard-buttons-layout">
                <div class="dashboard-div-button-container">
                     <div class="dashboard-div-button" id="add-users">
                       <h3>Add users</h3>
                     </div>
                </div>
                  <div class="dashboard-div-button-container">       
                     <div class="dashboard-div-button" id="list-users">
                       <h3>List users</h3>
                     </div>
                  </div>
                <div class="dashboard-div-button-container">
                     <div class="dashboard-div-button" id="add-products">
                       <h3>Add products</h3>
                     </div>
                  </div>
                <div class="dashboard-div-button-container">
                     <div class="dashboard-div-button" id="list-products">
                       <h3>List products</h3>
                     </div>
                  </div>
                  <div class="dashboard-div-button-container">
                     <div class="dashboard-div-button" id="contact-us">
                       <h3>Contact us</h3>
                     </div>
                  </div>
            </div>
        
        <script>
           document.getElementById('list-products').addEventListener('click',function(){
                window.location.href = 'listProducts.php';
           });
           document.getElementById('add-products').addEventListener('click',function(){
                window.location.href = 'publishProduct.php';
           });
           document.getElementById('list-users').addEventListener('click',function(){
                window.location.href = 'dashboard.php';
           });
           document.getElementById('add-users').addEventListener('click',function(){
                window.location.href = 'addUser.php';
           });
           document.getElementById('contact-us').addEventListener('click',function(){
                window.location.href = 'DashboardContactUs.php';
           });
          </script>
         </div>
        <!-- Add the content container -->
        <div class="content" style="background-color: gray;">
            <!-- Content here -->
            <h1 style="text-align:center;">All products</h1>
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
                    include 'ProductModel.php';
                    include 'UserModel.php';
                    $user = new UserModel();
                    $products = new ProductModel();
                    $productData = $products->getProducts();
                    if($productData == null){
                        return;
                    }
                    foreach ($productData as $produkti) {
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
                                <a href="editPost.php?id=<?php echo $produkti['ID']; ?>"> <button
                                    class="edit-button">Edit</button></a>
                                <a href="deleteYourProduct.php?id=<?php echo $produkti['ID']; ?>"> <button class="delete-button"
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