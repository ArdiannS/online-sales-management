<?php 
include('DatabaseConnection.php');
class ProductModel extends DatabaseConnection {
    private $id;
    private $emri;
    private $pershkrimi;
    private $cmimi;
    private $image;

    public $conn;

      
        public function __construct($id = ' ', $emri = ' ', $pershkrimi= ' ', $cmimi= ' ', $image= ' ') {
          $this->id = $id;
          $this->emri = $emri;
          $this->pershkrimi = $pershkrimi;
          $this->cmimi = $cmimi;
          $this->image = $image;

          $this->conn = $this->connectToDatabase();
        }
      
        public function getId() {
          return $this->id;
        }
      
        public function setId($id) {
          $this->id = $id;
        }
      
        public function getEmri() {
          return $this->emri;
        }
      
        public function setEmri($emri) {
          $this->emri = $emri;
        }
      
        public function getPershkrimi() {
          return $this->pershkrimi;
        }
      
        public function setPershkrimi($pershkrimi) {
          $this->pershkrimi = $pershkrimi;
        }
      
        public function getCmimi() {
          return $this->cmimi;
        }
      
        public function setCmimi($cmimi) {
          $this->cmimi = $cmimi;
        }
      
        public function getImage() {
          return $this->image;
        }
      
        public function setImage($image) {
          $this->image = $image;
        }

        function insert()
        {
            try {
                $query = "INSERT INTO products(emri, pershkrimi, cmimi, image) VALUES (?,?,?,?,?)";
                $stm = $this->conn->prepare($query);
                $stm->execute([$this->emri, $this->pershkrimi, $this->cmimi, $this->image]);
    
                echo "<script>alert('Product added successfully');</script>";
                echo "<script>window.location.href = 'product.php';</script>";
            } catch (Exception $e) {
                $e->getMessage();
            }
    
        }
        public function getProducts(){
            $data = null;
            $query = "SELECT * FROM products";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
           }
           public function getProductsByID($ID){
            $query = "SELECT * FROM products WHERE ID = '$ID'";
            return $query_run = mysqli_query($this->conn,$query);
        } 



      }
      
      




?>