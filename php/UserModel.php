<?php
include_once('DatabaseConnection.php');
class UserModel extends DatabaseConnection
{
    private $id;
    private $username;
    private $email;
    private $password;
    private $age;
    private $bilanci;
    private $usetype;
    private $lastEditedBy;

    public $conn;

    public function __construct($id = ' ', $username = ' ', $email = ' ', $password = ' ', $age = ' ', $usetype = ' ',$bilanci = ' ', $lastEditedBy = ' ')
    {
        $this->id = $id;
        $this->lastEditedBy = $lastEditedBy;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->age = $age;
        $this->usetype = $usetype;
        $this->bilanci = $bilanci;

        $this->conn = $this->connectToDatabase();
    }
    public function getBilanci(){
        return $this->bilanci;
    }
    public function getLastEditedBy(){return $this->lastEditedBy;}
    public function setLastEditedBy($t){$this->lastEditedBy = $t;}
    public function setBilanci($b){
        $this->bilanci = $b;
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
            $query = "INSERT INTO users(username, password, email, age,usetype, bilanci) VALUES (?,?,?,?,?,?)";
            $stm = $this->conn->prepare($query);
            $stm->execute([$this->username, $this->password, $this->email, $this->age, $this->usetype, $this->bilanci]);
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
    if (session_status() != 2) {
        session_start();
    }
    $userName = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$userName'";
    $result = mysqli_query($this->conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $user = $result->fetch_array();
        $_SESSION['username'] = $user['username'];
        return $user;
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
    public function getUserById($id){
        $query = "SELECT * FROM users WHERE id = '$id'";
        $data = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($data) != 0) {
            return $data;
        }
        return null;
    }
    public function decreaseBalanceById($id, $amount){
       try{
         $query = "UPDATE users SET bilanci = bilanci - $amount WHERE id='$id'";
         $stm = $this->conn->prepare($query);
         $stm->execute();
       }catch(Exception $e){
          return $e->getMessage();
       }
    }
    public function increaseBalanceById($id, $amount){
        try{
            $query = "UPDATE users SET bilanci = bilanci + $amount WHERE id='$id'";
            $stm = $this->conn->prepare($query);
            $stm->execute();
          }catch(Exception $e){
             return $e->getMessage();
          }
    }
    public function update()
    {
        try {
            
            $sqlStm = "UPDATE users SET username=?,password=?, email=?, age=?,usetype=?, lastEditedBy=? where id=?";
            $stm = $this->conn->prepare($sqlStm);
            $stm->execute([
                $this->username, $this->password, $this->email, $this->age, $this->usetype, $this->lastEditedBy, $this->id
            ]);
            return $this->username;
        } catch (Exception $e) {
            return null;
        }
    }
    public function deleteUserById($id)
    {
        $query = "DELETE FROM users where id = $id";
        if ($sql = $this->conn->query($query)) {
            return true;
        }
        return false;
    }
    function existsByUserNameAndEmail($username, $email)
    {
        $query = "SELECT * FROM users WHERE username = . '$username' . and email = '$email' ";
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            return true;
        }
        return false;

    }

}







?>