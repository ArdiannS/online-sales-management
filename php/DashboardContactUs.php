<!DOCTYPE html>
<html>

<head>
    <title>Split Page Example</title>
    <link rel="stylesheet" href="../style/dashboard.css">
    <style>
    </style>
</head>

<body>
    <div class="header">
        <div class="leftLogo">
            <img src="../images/logooo.jpg" width="130px" height="100px" alt="" id="img1">
        </div>
        <div style="margin-left: 3px" class="StartBlock">
            <ul class="inline-list">

                <a href="products.php">
                    <li>Users</li>
                </a>
                <a href="index.php">
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
                <h1>Content</h1>
                <table class="user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Reason</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    include('ContactModel.php');
                    $contact = new ContactModel();
                    $result = $contact->getAllContacts();
                    if ($result == null) {
                        return;
                    }
                    foreach ($result as $user) {


                        ?>

                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $user['ID'] ?>
                                </td>
                                <td>
                                    <?php echo $user['name'] ?>
                                </td>
                                <td>
                                    <?php echo $user['surname'] ?>
                                </td>
                                <td>
                                    <?php echo $user['email'] ?>
                                </td>
                                <td>
                                    <?php echo $user['reason'] ?>
                                </td>
                                <td>
                                    <a href="deleteContact.php?id=<?php echo $user['ID'] ?>" <button class="delete-button"
                                        name="delete">Delete</button>
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