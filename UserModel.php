<?php
include('DatabaseConnection.php');
class UserModel extends DatabaseConnection
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $age;
    private $usetype;
    public $conn;

    public function __construct($id = ' ', $username = ' ', $email = ' ', $password = ' ', $age = ' ', $usetype = ' ')
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->age = $age;
        $this->usetype = $usetype;

        $this->conn = $this->connectToDatabase();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getUsertype()
    {
        return $this->usetype;
    }

    public function setUsertype($usetype)
    {
        $this->usetype = $usetype;
    }
    function insert()
    {
        try {
            $query = "INSERT INTO users(username, password, email, age,usetype) VALUES (?,?,?,?,?)";
            $stm = $this->conn->prepare($query);
            $stm->execute([$this->username, $this->password, $this->email, $this->age, $this->usetype]);

            echo "<script>alert('records added successfully');</script>";
            echo "<script>window.location.href = '/';</script>";
        } catch (Exception $e) {
            $e->getMessage();
        }

    }
    function existsByUsername($username)
    {
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($this->conn, $query);

        if (mysqli_num_rows($result) > 0) {
            return true;
        }

        return false;
    }
    // public function getProducts(){
    //     $data = null;
    //     $query = "SELECT * FROM products";
    //     if ($sql = $this->conn->query($query)) {
    //         while ($row = mysqli_fetch_assoc($sql)) {
    //             $data[] = $row;
    //         }
    //     }
    //     return $data;
    //    }
    function getAllUsers(){
        $data = null;
        $query = "Select * From users";
        if($sql = $this->conn->query($query)){
            while($row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;

    }

    function getUserbyUsernameAndPassword($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "' ";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_array();
        }

        return null;
    }

    function getCurrentUser(){
        $userName = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username='$userName'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_array();
        }
        return null;
    }

    // public function getUsersOrAdmin($username, $password)
    // {

    //     $sql = "SELECT * FROM users WHERE username='" . $username . "' AND password='" . $password . "' ";
    //     $result = mysqli_query($this->conn, $sql);
    //     $row = mysqli_fetch_array($result);

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
    //     } else {
    //         echo "<script>alert('Username or Password is wrong ');</script>";
    //         echo "<script>window.location.href = 'logInForm.php';</script>";
    //     }
    // }
}







?>