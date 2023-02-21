<?php
include 'DatabaseConnection.php';

class contactModel extends DatabaseConnection
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
        public function getName() {
            return $this->name;
        }
    
        public function getSurname() {
            return $this->surname;
        }
    
        public function getEmail() {
            return $this->email;
        }
    
        public function getReason() {
            return $this->reason;
        }
    
        public function setName($name) {
            $this->name = $name;
        }
    
        public function setSurname($surname) {
            $this->surname = $surname;
        }
    
        public function setEmail($email) {
            $this->email = $email;
        }
    
        public function setReason($reason) {
            $this->reason = $reason;
        }

        function insert(){
            $query = "INSER INTO contact(name,surname,email,reason) VALUES ($this->name,$this->surname,$this->email,$this->reason);"
        }


    }



?>