<?php 
include 'DatabaseConnection.php';

    function SignUpEmpty($username,$password,$confirmPW,$email,$age){
        if(empty($username) || empty($password) ||empty($confirmPW) ||empty($email) ||empty($age)){
            return false;
        }
        return true;
    }
    // function getAllUsers(){
    //     $sql = "SELECT * FROM users";
    //     $result = mysqli_query($conn, $sql);
    //     if (mysqli_num_rows($result) > 0) {
    //         $persons = array();
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             $users[] = $row;
    //         }
    //         return $users;
    //     } else {
    //         return false;
    //     }
    // }
    function createUser($conn,$username,$email,$password,$age){
        $db = new DatabaseConnection();
        $query = "INSERT INTO users (username, password, email, age)
        VALUES ('$username', '$password', '$email', $age)";
        mysqli_query($db->conn,$query);
    }



?>