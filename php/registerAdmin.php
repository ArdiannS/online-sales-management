<?php
session_start();
include('UserModel.php');
    if(isset($_POST['RegisterBtn'])){
        $user = new UserModel();
        $user->setUsername($_POST['username']);
        $user->setEmail($_POST['email']);
        $hash = md5($_POST['password']);
        $user->setPassword($hash);
        $user->setAge($_POST['age']);
        $user->setUsertype($_POST['usetype']);
        $user->setBilanci(500);
        $exists = $user->existsByUsername($user->getUsername());
        if ($exists) {
            echo "<script>alert('Perdoreusi ekziston');</script>";
            echo "<script>window.location.href = 'addUser.php';</script>";
        } else {
            $user->insert();
            echo "<script>alert('User succesfully');</script>";
            echo "<script>window.location.href = 'dashboard.php';</script>";

        }
    }

?>