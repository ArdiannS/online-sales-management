<!DOCTYPE html>
<html>

<head>
    <title>Split Page Example</title>
   <link rel="stylesheet" href="../style/dashboard.css">
</head>

<body>
    <?php
    include('UserModel.php');
    $user = new UserModel();
        
    ?>
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
        <div class="content" style="background-color: gray;">
            <h1>Content</h1>
            <table class="user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Age</th>
                        <th>User Type</th>
                        <th>Bilanci</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php

                $result = $user->getAllUsers();
                if ($result == null) {
                    return;
                }

                foreach ($result as $user) {


                    ?>

                    <tbody>
                        <tr>
                            <td>
                                <?php echo $user['id'] ?>
                            </td>
                            <td>
                                <?php echo $user['username'] ?>
                            </td>
                            <td>
                                <?php echo $user['email'] ?>
                            </td>
                            <td>
                                <?php echo $user['password'] ?>
                            </td>
                            <td>
                                <?php echo $user['age'] ?>
                            </td>
                            <td>
                                <?php echo $user['usetype'] ?>
                            </td>
                            <td>$
                                <?php echo $user['bilanci'] ?>
                            </td>
                            <td>
                               <a href="edit.php?id=<?php echo $user['id']; ?>"><button class="edit-button">Edit</button></a>
                               <a href="delete.php?id=<?php echo $user['id']; ?>"><button class="delete-button" name="delete">Delete</button>
                            </td>
                        </tr>
                    <?php }

            ?>
                </tbody>
            </table>

        </div>
    </div>
</body>

</html>