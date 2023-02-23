<!DOCTYPE html>
<html>

<head>
    <title>Edit User Information</title>
    <style>
        form {
            width: 60%;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        label {
            display: inline-block;
            width: 100px;
            /* text-align: right; */
            margin-right: 30px;
        }

        input[type="text"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 20px;
        }

        input[type="number"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        .file-label {
            display: block;
            margin-bottom: 5px;
        }

        .file-input {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
            cursor: pointer;
        }

        .file-input:hover {
            border-color: #999;
        }

        .file-input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        .file-input:active {
            background-color: #eee;
        }

        .file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .file-input::before {
            content: 'Choose Image';
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .file-input:hover::before {
            background-color: #45a049;
        }

        .file-input:focus::before {
            border-color: #4CAF50;
        }
    </style>
</head>

<body>
    <form method="POST" enctype='multipart/form-data'>
        <h2 style="text-align: center;">Edit your post Info</h2>
        <label for="title">Emri:</label>
        <input type="text" id="title" name="emri" placeholder="Post Title"><br><br>
        <!-- <label for="file-input">Choose Image</label>
        <input hidden="" type="file" placeholder="Choose image" name="foto" accept="image/*"> -->
        <label class="file-label" for="file-input">Choose Image</label>
        <input type="file" id="file-input" class="file-input" name="foto" accept="image/*">

        <label for="Price">Cmimi:</label>
        <input type="text" id="author" name="cmimi" placeholder="Cmimi"><br><br>
        <label for="Type">Lloji:</label>
        <input type="text" id="author" name="type" placeholder="Lloji"><br><br>
        <label for="Amount">Sasia:</label>
        <input type="number" id="author" name="sasia" placeholder="Sasia"><br><br>
        <label for="description">Pershkrimi:</label><br>
        <textarea id="content" name="description" rows="10" cols="50">Post Content</textarea><br><br>

        <input type="submit" name="edit" value="Edit">
    </form>
    <?php
    include "ProductModel.php";
    $product = new ProductModel();
    $id = $_GET['id'];
    $product->setId($id);
    if (isset($_POST['edit'])) {
        $product->setEmri($_POST['emri']);
        $image = $_FILES["foto"];
        $product->setCmimi($_POST['cmimi']);
        $product->setType($_POST['type']);
        $product->setAmount($_POST['sasia']);
        $product->setPershkrimi($_POST['description']);

        $fileName = basename($image["name"]);
        $targetDir = "../uploads/";
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (!empty($fileName)) {
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
            if (in_array($fileType, $allowTypes)) {
                echo "Working";
                if (move_uploaded_file($image["tmp_name"], $targetFilePath)) {
                    echo "Working2";
                    $product->setImage($fileName);
                    $product->update();
                } else {
                    $statusMsg = "Sorry, there was an error uploading your file.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
            }
        } else {
            echo "<script>alert('filename is empty');
            window.location.href = 'editYourPost.php';</script>";
            return;
        }
    }
    ?>
</body>