<?php
include_once('DatabaseConnection.php');
class ProductModel extends DatabaseConnection
{
  private $id;
  private $emri;
  private $pershkrimi;
  private $cmimi;
  private $image;
  private $type;
  private $amount;
  public $conn;


  public function __construct($id = ' ', $emri = ' ', $pershkrimi = ' ', $cmimi = ' ', $image = ' ', $type = ' ', $amount = ' ')
  {
    parent::__construct();
    $this->id = $id;
    $this->emri = $emri;
    $this->pershkrimi = $pershkrimi;
    $this->cmimi = $cmimi;
    $this->image = $image;
    $this->type = $type;
    $this->amount = $amount;
    $this->conn = $this->connectToDatabase();
  }

  public function getId()
  {
    return $this->id;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getEmri()
  {
    return $this->emri;
  }
  public function getAmount()
  {
    return $this->amount;
  }
  public function setAmount($amount)
  {
    $this->amount = $amount;
  }
  public function setEmri($emri)
  {
    $this->emri = $emri;
  }

  public function getPershkrimi()
  {
    return $this->pershkrimi;
  }

  public function setPershkrimi($pershkrimi)
  {
    $this->pershkrimi = $pershkrimi;
  }

  public function getCmimi()
  {
    return $this->cmimi;
  }

  public function setCmimi($cmimi)
  {
    $this->cmimi = $cmimi;
  }

  public function getImage()
  {
    return $this->image;
  }

  public function setImage($image)
  {
    $this->image = $image;
  }

  function insert()
  {
    try {
      $query = "INSERT INTO products(userID, name, description, image, price, type, amount) VALUES (?,?,?,?,?,?,?)";
      $stm = $this->conn->prepare($query);
      $stm->execute([$this->id, $this->emri, $this->pershkrimi, $this->image, $this->cmimi, $this->type, $this->amount]);
      echo "<script>window.location.href = 'publishProduct.php';</script>";
    } catch (Exception $e) {
      $e->getMessage();
    }

  }
  public function decreaseAmountOfProductById($id, $amount)
  {
    try {
      $query = "UPDATE products SET amount = amount - $amount WHERE ID = '$id'";
      $stm = $this->conn->prepare($query);
      $stm->execute();
    }catch (Exception $e) {
      return $e->getMessage();
    }
  }
  public function getProducts()
  {
    $data = null;
    $query = "SELECT * FROM products";
    if ($sql = $this->conn->query($query)) {
      while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
      }
    }
    return $data;
  }
  public function getProductsByID($ID)
  {
    $query = "SELECT * FROM products WHERE ID = '$ID'";
    return mysqli_query($this->conn, $query);
  }
  public function getYourOwnProducts($id)
  {
    $query = "SELECT * FROM products p where p.userID = $id";
    return mysqli_query($this->conn, $query);
  }

  public function getProductsByPreference($preferences)
  {
    $data = null;
    $query = "SELECT * FROM products WHERE ";
    $i = 0;
    while ($i < sizeof($preferences)) {
      $current = $preferences[$i];
      if ($i++ == 0)
        $query .= "type = '$current'";
      else
        $query .= " OR type = '$current'";
    }
    if ($i == 0)
      $query = "SELECT * FROM products";
    if ($sql = $this->conn->query($query)) {
      while ($row = mysqli_fetch_assoc($sql)) {
        $data[] = $row;
      }
    }
    return $data;
  }
  public function update()
  {
    try {
      $query = "UPDATE products SET name = ?, description = ?, image = ?, price = ?, type = ?, amount = ? WHERE id = ?";
      $stm = $this->conn->prepare($query);
      $stm->execute([
        $this->emri, $this->pershkrimi, $this->image, $this->cmimi, $this->type, $this->amount, $this->id
      ]);
      
    } catch (Exception $e) {
      echo "<script>alert('" . $e->getMessage() . "')";
      return null;
    }
  }
  public function deleteProductByID($id)
  {
    $query = "DELETE FROM products where id = '$id'";
    if ($this->conn->query($query)) {
      return true;
    }
    return false;
  }



}







?>