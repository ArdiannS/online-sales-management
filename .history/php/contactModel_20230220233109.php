<?php 
include 'DatabaseConnection.php';

class contactModel extends DatabaseConnection{
    private $name;
    private $surname;
    private $email;
    private $reason;
private $conn;

    public function __construct($name = ' ',$surname = ' ',$email = ' ', $reason = ' '){
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->reason = $reason;

        $this->conn = $this->connectToDatabase();

    }

}
?>