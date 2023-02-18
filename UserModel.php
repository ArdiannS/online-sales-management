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
    function getUserbyUsernameorPasswor($username, $password)
    {
        $query = "SELECT * FROM users WHERE username='$username' and password = '$password'";
        $result = mysqli_query($this->conn,$query);

        if (mysqli_num_rows($result) > 0) {
            return true;
        }

        return false;
    }
}






?>