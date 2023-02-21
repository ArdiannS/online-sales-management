<?php
session_start();
include('UserModel.php');

if (isset($_POST['registerBtn'])) {
    $user = new UserModel();
    $user->setUsername($_POST['username']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setAge($_POST['age']);
    $user->setUsertype('USER');
    $user->setBilanci(500);
    $exists = $user->existsByUsername($user->getUsername());
    if ($exists) {
        echo "<script>alert('Perdoreusi ekziston');</script>";
        echo "<script>window.location.href = 'logInForm.php';</script>";
        return;
    } else {
        $user->insert();
        echo "<script>window.location.href = 'index.php';</script>";
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['cart'] = [];
        return;        
    }
}


if (isset($_POST['loginBtn'])) {
    $user = new UserModel();
    $user->setUsername($_POST['username']);
    $user->setPassword($_POST['password']);
    $userFound = $user->getUserbyUsernameAndPassword($user->getUsername(), $user->getPassword());
    if (validateEmptyData($user->getUsername(), $user->getPassword())) {
        echo "<script>alert('Ju lutem plotesoni te gjitha fushat');</script>";
        echo "<script>window.location.href = 'logInForm.php';</script>";
        exit();
    } else if ($userFound != null) {
        $_SESSION['username'] = $user->getUsername();
        if ($userFound["usetype"] == 'admin') {
            echo "<script>window.location.href = 'indexDash.php';</script>";
            return;
        }
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Account doesnt exist.');</script>";
        echo "<script>window.location.href = 'logInForm.php';</script>";
    }
}




function validateEmptyData($username, $password)
{
    if (empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}
function validimi($username,$password){
    $db = new DatabaseConnection();
    $result = $db->fetch();
    foreach ($result as $user) {
        if($user['username'] == $username && $user['password'] == $password){
            $_SESSION['usetype']=$user['usetype'];
            $_SESSION['username']=$user['username'];
            return true;
        }
    }   
}



?>