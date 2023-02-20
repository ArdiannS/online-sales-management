<?php 
session_start();
    include 'DatabaseConnection.php';
    if(isset($_POST['loginBtn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
            if(validateEmptyData($username,$password)){
                echo "<script>alert('records added successfully');</script>";

                // header("Location:logInForm.php");
            }else if(validimi($username,$password)){
                header("Location:index.php");
            }else{
                echo "<script>alert('records added successfully');</script>";
        // echo "<script>window.location.href = '/api/admin/dashboard.php';</script>";
            }
        }
    
    function validateEmptyData($username,$password){
        if(empty($username)||empty($password)){
            return true;
        }else {
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