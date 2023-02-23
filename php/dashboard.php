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
    <!-- Wrap everything in a main container -->
    <div class="main-container">
        <!-- Add the sidebar container -->
        <div class="sidebar">
            <!-- Sidebar content here -->
            <h1 style=text-align:center>Dashboard</h1>
            <div class="dashboard-buttons-layout">
                <h3>User</h3>
                <a href="addUser.php"><li>Add User</li></a>
                <a href=""><li>User list</li></a>
            </ul>
            
            <ul>
                <h3>Product</h3>
                <li>Product List</li>
                <li>Add Product</li>
            </ul>



        </div>
        <!-- Add the content container -->
        <div class="content" style="background-color: gray;">
            <!-- Content here -->
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
                               <a href="edit.php?id=<?php echo $user['id']; ?>"<button class="edit-button">Edit</button></a>
                               <a href="delete.php?id=<?php echo $user['id']; ?>"<button class="delete-button" name="delete">Delete</button>
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