<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/mysingUPstyle.css" />
    <title>Formulari i Regjistrimit</title>
</head>
<?php
include 'UserModel.php';
$user = new UserModel();
$id = $_GET['id'];

$user->setId($id);
$editingData = $user->editUserById($id);
$userData = $editingData;

?>

<body>
    <form action="userEditProfile.php?id=<?php echo $id?>" method="POST">
        <div id="formulari">
            <h1>Edit Your Info
                <?php

                ?>
                <?php echo $userData['username'] . 's' ?> User
            </h1>
            <label for="Username">Username:</label>
            <input type="text" name="username" id="username" placeholder="Username"
                value="<?php echo $userData['username'] ?>">
            <input type="password" name="current_password" id="password" placeholder="Current password..."value="">
            <input type="password" name="new_password" id="password" placeholder="New password..." value="">
            <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $userData['email'] ?>">
            <input type="number" name="age" id="age" placeholder="Age" value="<?php echo $userData['age'] ?>">
            <button name='update'>Edito</button>
        </div>
        </div>
    </form>
    <style>
        <head><style>

        #formulari {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f2f2f2;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        input[type=text],
        input[type=password],
        input[type=email],
        input[type=number] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            border-radius: 4px;
            background-color: #fff;
        }

        button[name=update] {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button[name=update]:hover {
            background-color: #45a049;
        }
    </style>
    </head>

    </style>
</body>