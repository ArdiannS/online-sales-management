<?php 
include ('DatabaseConnection.php');
$db = new DatabaseConnection();
  if (isset($_POST['registerBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db->conn,$query);
    
    
    if (empty($username) || empty($password) || empty($email) || empty($age)) {
        echo "Ju lutem plotësoni të gjitha fushat";
        exit();
    }
    if(mysqli_num_rows($result) == 1){
        echo "<script>alert('Perdoreusi ekziston');</script>";
        echo "<script>window.location.href = 'logInForm.php';</script>";
    } else{
        $insert = $db->insert();
    }
    
}

if(isset($_POST['loginBtn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
        if(validateEmptyData($username,$password)){
             header("Location:logInForm.php");
             exit();
        }else{
            $db->getUsersorAdmin($username,$password);
        }
}
function validateEmptyData($username,$password){
    if(empty($username)||empty($password)){
        return true;
    }else {
        return false;
    }
}
// function validimi($username,$password){
//     $db = new DatabaseConnection();
//     $result = $db->fetch();
//     foreach ($result as $user) {
//         if($user['username'] == $username && $user['password'] == $password){
//             $_SESSION['usetype']=$user['usetype'];
//             $_SESSION['username']=$user['username'];
//             return true;
//         }
//     }   
// }



?>