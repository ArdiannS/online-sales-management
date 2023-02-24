<?php
   include_once('DatabaseConnection.php');
   class RatingModel extends DatabaseConnection{
       private $rating;
       private $userID;
       private $productID;
       public $conn;
       public function __construct(){
         $rating = null;
         $userID = null;
         $productID = null;
         $this->conn = $this->connectToDatabase();
       }
       public function getRating(){
         return $this->rating;
       }
       public function getUserID(){
         return $this->userID;
        }
       public function getProductID(){
        return $this->productID;
       }
       public function setRating($p){
         $this->rating = $p;
       }
       public function setProductID($id){
        $this->productID = $id;
       }
       public function setUserID($id){
        $this->userID = $id;
       }
       public function insertUserRating(){
          try{
           $productID = $this->productID;
           $userID = $this->userID;
           $rating = $this->rating;
           $query = "INSERT INTO ratings(rating, userID, productID) VALUES ('$rating', '$userID', '$productID')";
           $stm = $this->conn->prepare($query);
           $stm->execute();
          }catch(Exception $e){
             return $e->getMessage();
          }
       }
       public function updateUserRating(){
        try{
         $productID = $this->productID;
         $userID = $this->userID;
         $rating = $this->rating;
         $query = "SELECT rating FROM ratings WHERE userID = $userID AND productID = $productID";
         $data = mysqli_query($this->conn, $query);
         $data = $data->fetch_array();
         $previousRating = $data['rating'];
         $query = "UPDATE ratings SET rating = $rating WHERE userID = $userID AND productID = $productID";
         $stm = $this->conn->prepare($query);
         $stm->execute();
         return $previousRating;
        }catch(Exception $e){
           return $e->getMessage();
        }
     }
       public function hasBeenRatedByUser($userID){
            $productID = $this->productID;
            if($productID == null) return;
            $query = "SELECT * FROM ratings WHERE userID = $userID AND productID = $productID";
            $data = mysqli_query($this->conn, $query);
            if(mysqli_num_rows($data) == 0) return false;
            return true;
       }
   }

?>