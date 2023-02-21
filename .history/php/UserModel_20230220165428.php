<?php
include('../php/DatabaseConnection.php');
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
            echo "<script>window.location.href = 'index.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
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

    function getAllUsers()
    {
        $data = null;
        $query = "Select * From users";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
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

    function getCurrentUser()
    {
        $userName = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username='$userName'";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_array();
        }
        return null;
    }
    public function editUserById($id)
    {
        $data = null;
        $query = "SELECT * FROM users WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }
    public function update()
    {
        try {
            $sqlStm = "UPDATE users SET username=?,password=?, email=?, age=?,usetype=? where id=?";
            $stm = $this->conn->prepare($sqlStm);
            $stm->execute([$this->username, $this->password,$this->email, $this->age, $this->usetype,$this->id
            ]);
            echo "<script>alert('dhenat jane Perditsuar me sukses');document.location='displayDhenat.php';</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function deleteUserById($id){
        $query = "DELETE FROM users where id = $id";
        if($sql = $this->conn->query($query)){
            return true;
        }
        return false;
    }
}







?>