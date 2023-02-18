<?php
include('UserModel.php');

if (isset($_POST['registerBtn'])) {
    $user = new UserModel();
    $user->setUsername($_POST['username']);
    $user->setEmail($_POST['email']);
    $user->setPassword($_POST['password']);
    $user->setAge($_POST['age']);
    $user->setUsertype('USER');
    $exists = $user->existsByUsername($user->getUsername());
    if ($exists) {
        echo "<script>alert('Perdoreusi ekziston');</script>";
        echo "<script>window.location.href = 'logInForm.php';</script>";
    } else {
        $user->insert();
    }
}

if (isset($_POST['loginBtn'])) {
    $user = new UserModel();
    $user->setUsername($_POST['username']);
    $user->setPassword($_POST['password']);
    $result = $user->getUserbyUsernameorPasswor($user->getUsername(),$user->getPassword());

    if (validateEmptyData($user->getUsername(), $user->getPassword())) {
        echo "<script>alert('Ju lutem plotesoni te gjitha fushat');</script>";
        echo "<script>window.location.href = 'logInForm.php';</script>";
        exit();
    } else if ($result) {
        echo "<script>alert('Logged in');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Account doesnt exists');</script>";
        echo "<script>window.location.href = 'logInForm.php';</script>";
    }
}



//     $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
//     $result = mysqli_query($db->conn,$query);


//     if (empty($username) || empty($password) || empty($email) || empty($age)) {
//         echo "Ju lutem plotësoni të gjitha fushat";
//         exit();
//     }
//     if(mysqli_num_rows($result) == 1){

//     } else{
//         $insert = $db->insert();
//     }



// if(isset($_POST['loginBtn'])){
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $resultati = $db->getUsersorAdmin($username,$password);
//         if(validateEmptyData($username,$password)){
//              header("Location:logInForm.php");
//              exit();
//         }
// }
function validateEmptyData($username, $password)
{
    if (empty($username) || empty($password)) {
        return true;
    } else {
        return false;
    }
}
function validimi($username, $password)
{
    $db = new User();
    $result = $db->fetch();
    foreach ($result as $user) {
        if ($user['username'] == $username && $user['password'] == $password) {
            $_SESSION['usetype'] = $user['usetype'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
    }
}
?>