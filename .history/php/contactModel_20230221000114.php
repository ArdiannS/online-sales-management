<?php
include 'DatabaseConnection.php';

class ContactModel extends DatabaseConnection
{
    private $name;
    private $surname;
    private $email;
    private $reason;
    private $conn;

    public function __construct($name = ' ', $surname = ' ', $email = ' ', $reason = ' ')
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->reason = $reason;

        $this->conn = $this->connectToDatabase();

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

    // public function insert()
    // {
    //     $query = "INSERT INTO contact(name,surname,email,reason) VALUES (?,?,?,?)";
    //     $stm = $this->conn->prepare($query);
    //     if ($stm->execute([$this->name, $this->surname, $this->email, $this->reason])) {
    //         echo "<script>alert('Added succesfully');</script>";
    //         echo "<script>window.location.href = 'AboutUs.php';</script>";
    //     } else {
    //         echo "<script>alert('failed');</script>";
    //         echo "<script>window.location.href = 'AboutUs.php';</script>";
    //     }


    // }
    function insert()
    {
        try {
            $query = "INSERT INTO users(name, surname, email, reason) VALUES (?,?,?,?)";
            $stm = $this->conn->prepare($query);
            $stm->execute([$this->username, $this->password, $this->email, $this->age, $this->usetype]);
            echo "<script>alert('records added successfully');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
            $_SESSION['username'] = $this->username;

        } catch (Exception $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }

    }


}



?>