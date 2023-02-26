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
    <form action="userEditPost.php?id=<?php echo $_GET['id']?>"method="POST" enctype='multipart/form-data'>
    <h2 style="text-align: center;">Edit your post Info</h2>
    <label for="title">Emri:</label>
        <input type="text" id="title" name="emri" placeholder="Post Title"><br><br>
        <label class="file-label" for="file-input">Choose Image</label>
        <input type="file" id="file-input" class="file-input" name="foto" accept="image/*">

    <label for="Price">Cmimi:</label>
        <input type="number" id="author" name="cmimi" placeholder="Cmimi"><br><br>
        <select name="type" >
        <option value="Accessories">Accessories</option>
        <option value="Devices">Devices</option>
        <option value="Furniture">Furniture</option>
        <option value="Music Instruments">Music Instruments</option>
        <option value="Toys">Toys</option>
        <option value="Animal Foods">Animal Foods</option>
        <option value="Plants">Plants</option>
    </select><br><br>
    <label for="Amount">Sasia:</label>
        <input type="number" id="author" name="sasia" placeholder="Sasia"><br><br>
    <label for="description">Pershkrimi:</label><br>
        <textarea id="content" name="description" rows="10" cols="50">Post Content</textarea><br><br>

    <input type="submit" name="edit" value="Edit">
</form>
</body>