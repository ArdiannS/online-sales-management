<?php
include_once 'DatabaseConnection.php';
class CommentModel extends DatabaseConnection
{

    private $id;

    private $userID;

    private $productID;
    private $commentContent;

    public $conn;

    public function __construct($id = ' ' ,$userID = ' ', $productID = ' ', $commentContent = ' ')
    {
        $this->userID = $userID;
        $this->productID = $productID;
        $this->commentContent = $commentContent;

        $this->conn = $this->connectToDatabase();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getProductID()
    {
        return $this->productID;
    }
    public function getUserID()
    {
        return $this->userID;
    }
    public function getcommentContent()
    {
        return $this->commentContent;
    }
    public function setcommentContent($commentContent)
    {
        $this->commentContent = $commentContent;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }
    public function setProductID($productID)
    {
        $this->productID = $productID;
    }
    function insert()
    {
        try {
            $query = "INSERT INTO comments(userID, productID, commentContent) VALUES (?,?,?)";
            $stm = $this->conn->prepare($query);
            $stm->execute([$this->userID, $this->productID, $this->commentContent]);
            echo "<script>alert('comment added successfully');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }

    }
    function getCommentByProductId($product)
    {
        $query = "SELECT * FROM comments inner join users on comments.userID = users.id  where productID = $product";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    function deleteByCommentID()
    {
        $query = "DELETE FROM comments where ID = $this->id";
        if ($sql = $this->conn->query($query)) {
            return true;
        }

        return false;
    }
    public function update()
    {
      try {
        $query = "UPDATE comments SET commentContent = ? WHERE ID = ?";
        $stm = $this->conn->prepare($query);
        $stm->execute([
          $this->commentContent,$this->id
        ]);
        echo "<script>alert('dhenat jane Perditsuar me sukses');
            document.location='index.php';</script>";
      } catch (Exception $e) {
        echo "<script>alert('" . $e->getMessage() . "')";
        return null;
      }
    }
    public function getCommentsByID(){
        $query = "SELECT * FROM comments WHERE ID = $this->id";
        return mysqli_query($this->conn, $query);
    }

}







?>