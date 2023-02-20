<?php
class DatabaseConnection
{
    public $servername = "localhost:9999";
    public $dbusername = 'root';
    public $dbpassword = '';
    public $database = 'online-sales-managment';
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->servername, $this->dbusername, $this->dbpassword, $this->database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function connectToDatabase()
    {
        $this->conn = mysqli_connect($this->servername, $this->dbusername, $this->dbpassword, $this->database);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        return $this->conn;
    }

    public function executeQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function closeConnection()
    {
        mysqli_close($this->conn);
    }
}



//     public function fetch(){
//         $data = null;
//         $query = "SELECT * FROM users";
//         if ($sql = $this->conn->query($query)) {
//             while ($row = mysqli_fetch_assoc($sql)) {
//                 $data[] = $row;
//             }
//         }
//         return $data;
//     }

public function getProducts(){
        $data = null;
        $query = "SELECT * FROM products";
        $data = mysqli_query($this->conn, $query);
        return $data;
       }

    public function getProductsByID($ID){
        $query = "SELECT * FROM products WHERE ID = '$ID'";
        return $query_run = mysqli_query($this->conn,$query);
    }
    public function insertProductData($productName, $productPrice, $productDescription, $productImage, $publisherUsername){
         $query = "INSERT INTO products(userID, name, description, image, price) VALUES ('$publisherUsername', '$productName', '$productDescription', '$productImage', '$productPrice')";
         $sql = null;
         if($sql = $this->conn->query($query))echo "<script>alert($productImage)</script>";
         else echo "<script>alert('NOT right')</script>";
    }



// function getUsersorAdmin($username,$password){

//         $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "' ";
//         $result = mysqli_query($this->conn, $sql);
//         $row = mysqli_fetch_array($result);

//     if (mysqli_num_rows($result) > 0) {
//         if ($row["usetype"] == 'user') {
//             $_SESSION["usetype"] = $username;
//             $_SESSION["isAdmin"] = 'user';
//             echo "<script>alert('User');</script>";
//             echo "<script>window.location.href = 'index.php';</script>";
//         } else if ($row["usetype"] == 'admin') {
//             $_SESSION["username"] = $username;
//             $_SESSION["isAdmin"] = "admin";
//             echo "<script>alert('Admin');</script>";
//             echo "<script>window.location.href = 'dashboard.php';</script>";
//         }
//     } else{
//         echo "<script>alert('Username or Password is wrong ');</script>";
//         echo "<script>window.location.href = 'logInForm.php';</script>";
//     }
//     }
// }

//     public function delete($id){

//         $query = "DELETE FROM users where id = '$id'";
//         if ($sql = $this->conn->query($query)) {
//             return true;
//         }else{
//             return false;
//         }
//     }

//     public function edit($id){

//         $data = null;

//         $query = "SELECT * FROM users WHERE id = '$id'";
//         if ($sql = $this->conn->query($query)) {
//             while($row = $sql->fetch_assoc()){
//                 $data = $row;
//             }
//         }
//         return $data;
//     }
// }

//     // public function update($data){

//     //     $query = "UPDATE users SET name='$data[name]', email='$data[email]', mobile='$data[mobile]', address='$data[address]' WHERE id='$data[id] '";

//     //     if ($sql = $this->conn->query($query)) {
//     //         return true;
//     //     }else{
//     //         return false;
//     //     }
//     // }





?>