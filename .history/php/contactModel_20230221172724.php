<?php
include_once 'DatabaseConnection.php';

class ContactModel extends DatabaseConnection
{
    private $id;
    private $name;
    private $surname;
    private $email;
    private $reason;
    public $conn;

    public function __construct($id = ' ',$name = ' ', $surname = ' ', $email = ' ', $reason = ' ')
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->reason = $reason;

        $this->conn = $this->connectToDatabase();

    }
    public function getID(){
        return $this->id;
    }
    public function setID($id){
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getReason()
    {
        return $this->reason;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    public function insert()
    {
        $query = "INSERT INTO contact(name,surname,email,reason) VALUES ('$this->name','$this->surname','$this->email','$this->reason')";
        if($sql = $this->conn->query($query)){
            echo "<script>alert('records added successfully');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        }else{
            echo "<script>alert('Something went wrong');</script>";
        }

    }
    public function getAllContacts(){
        $data = null;
        $query = "SELECT * FROM contact";
        if($sql = $this->conn->query($query)){
            while($row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
        }
        return $data;
    }
    public function deleteById($id){
        $query = "DELETE FROM contact WHERE ID = $id";
        if($sql = $this->conn->query($query)){
            return true;
        }
        return false;
    }


}



?>